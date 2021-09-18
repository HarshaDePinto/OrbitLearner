<?php

namespace App\Http\Controllers;

use App\Models\BMcq;
use App\Models\BPayment;
use App\Models\BSAccount;
use App\Models\BSAEntry;
use App\Models\BStudent;
use App\Models\BTutorial;
use App\Models\BVideo;
use App\Models\GBatch;
use App\Models\GMcq;
use App\Models\Grade;
use App\Models\Invoice;
use App\Models\Item;
use App\Models\MMark;
use App\Models\MResult;
use App\Models\Subject;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function student_profile($id)
    {
        $student= User::findOrFail($id);
        return view('student.profile')->with('student',$student);
    }

    public function student_find_classes()
    {
        $student = Auth::user();
        $subjects= Subject::orderBy('updated_at', 'desc')->get();
        $grades= Grade::orderBy('updated_at', 'desc')->get();
        return view('student.classes.find')->with('student',$student)->with('subjects',$subjects)->with('grades',$grades);
    }

    public function student_search_classes(Request $request)
    {
        $data = $request->all();
        $s_cls = GBatch::where('grade_id',$data['grade_id'])->where('subject_id',$data['subject_id'])->where('is_active',1)->get();
        return redirect()->back()->with('s_cls',$s_cls)->with('grade_id',$data['grade_id'])->with('subject_id',$data['subject_id']);
    }

    public function student_enrol(Request $request)
    {
        $data = $request->all();
        $check= BStudent::where('user_id',$data['student_id'])->where('g_batch_id',$data['g_batch_id'])->get();

        if ($check->count()==0) {
            $bst=BStudent::create([
            
                'user_id' => $request->student_id,
                'g_batch_id' => $request->g_batch_id,
                'author' => $request->author,
                'status' =>0,
            ]);
            $date = Carbon::now();
            $month=$date->monthName;
            $year=$date->year;
            $code=$year.$month;

            $pay=BPayment::create([
                'user_id' => $request->student_id,
                'g_batch_id' => $request->g_batch_id,
                'b_student_id' =>$bst->id,
                'code' =>$code,
                'year' =>$year,
                'month' =>$month,
                'amount' => $request->amount,
                'author' => $request->author,
                'status' =>0,
                'method' =>0,
            ]);
            $acc=BSAccount::create([
                'b_student_id' =>$bst->id,
                'des' =>"Online Enroll",
                'in' =>0,
                'out' =>$request->amount,
                'bal' =>(-$request->amount),
                'author' => $request->author,
            ]);

            $entry=BSAEntry::create([
                'b_s_account_id' =>$acc->id,
                'des' =>$code." Fees",
                'type' =>1,
                'amount' => $request->amount,
                'author' => $request->author,
            ]);
            session()->flash('success', 'You Enrolled!');
            return redirect()->back();
        } else {
            session()->flash('success', 'You Enrolled!');
            return redirect()->back();
        }
        
        
    }

    public function student_view_cart()
    {
        $student = Auth::user();
        $delete_invoices=Invoice::where('user_id',$student->id)->where('status',0)->get();
        if ($delete_invoices->count()==1) {
            $invoice=Invoice::where('user_id',$student->id)->where('status',0)->first();
        }
        if ($delete_invoices->count()!=1) {
            $delete_invoices=Invoice::where('user_id',$student->id)->where('status',0)->delete();
            $invoice=Invoice::create([
                'user_id' => $student->id,
                'status' =>0,
            ]);
        }
       

        $payments= BPayment::where('user_id',$student->id)->where('status',0)->get();
       
        return view('student.cart')->with('student',$student)->with('invoice',$invoice)->with('payments',$payments);
    }

    public function student_item_add(Request $request)
    {
        $data = $request->all();
        
        if ($data['op']==1) {
            $invoice= Invoice::findOrFail($data['invoice_id']);
            $payment= BPayment::findOrFail($data['b_payment_id']);
            $item=Item::create([
                'invoice_id' => $invoice->id,
                'b_payment_id' =>$payment->id,
                'title' =>$payment->code,
                'amount' =>$payment->amount,
                'author' => $request->author,
                'status' =>0,
                'method' =>0,
            ]);
            session()->flash('success', 'Payment Added!');
            return redirect()->back();
        }
        if ($data['op']==2) {
            $item= Item::findOrFail($data['item_id']);
            $item->delete();
            session()->flash('danger', 'Payment Removed!');
            return redirect()->back();
        }
       
       
    }

 

    public function student_invoice_single($id)
    {
        $student = Auth::user();
        $invoice= Invoice::findOrFail($id);
        return view('student.invoices.single')->with('student',$student)->with('invoice',$invoice);
    }

    public function student_invoice_index()
    {
        $student = Auth::user();
        $invoices= Invoice::where('user_id',$student->id)->where('status',2)->get();
        return view('student.invoices.index')->with('student',$student)->with('invoices',$invoices);
    }

    

    public function student_my_classes()
    {
        $student = Auth::user();
        $classes= BStudent::where('user_id',$student->id)->get();
        return view('student.classes.index')->with('student',$student)->with('classes',$classes);
    }

    public function student_single_class(Request $request)
    {
        $student = Auth::user();
        $data = $request->all();
        $b_student= BStudent::findOrFail($data['b_student_id']);
        
            $date = Carbon::now();
            $month=$date->monthName;
            $year=$date->year;
            $code=$year.$month;
            //type 0 full pay
            //type 1 half pay
            //type 2 free
            //type 3 teacher pay
            // type 4 institute pay

            if ($b_student->type==0) {
                $classFee=$b_student->g_batch->fees;
                $status=0;
                $method=0;
            }

            if ($b_student->type==1) {
                $classFee=($b_student->g_batch->fees)/2;
                $status=0;
                $method=0;
            }

            if ($b_student->type==2) {
                $classFee=0;
                $status=1;
                $method=3;
            }

            if ($b_student->type==3) {
                $classFee=($b_student->g_batch->fees)*($b_student->g_batch->teacher_commission)/100;
                $status=0;
                $method=0;
            }

            if ($b_student->type==4) {
                $classFee=($b_student->g_batch->fees)*(100 - $b_student->g_batch->teacher_commission)/100;
                $status=0;
                $method=0;
            }
            
        $check= BPayment::where('b_student_id',$b_student->id)->where('code',$code)->get();

        if ($check->count()==0) {

            $pay=BPayment::create([
                'user_id' => $student->id,
                'g_batch_id' => $b_student->g_batch_id,
                'b_student_id' =>$b_student->id,
                'code' =>$code,
                'year' =>$year,
                'month' =>$month,
                'amount' => $classFee,
                'author' => 'Student',
                'status' =>$status,
                'method' =>$method,
            ]);
            $acc = BSAccount::where('b_student_id', $b_student->id)->first();
            $acc->out=$acc->out+$pay->amount;
            $acc->bal=$acc->in - $acc->out;
            $acc->des=$pay->code." Class Fee ";
            $acc->save();

            $entry=BSAEntry::create([
                'b_s_account_id' =>$acc->id,
                'des' =>$acc->des,
                'type' =>1,
                'amount' => $pay->amount,
                'author' => 'Student',
            ]);

            
            return redirect(route('student_single_batch',$pay->id));
            
            
        } 

        if ($check->count()==1) {

            $pay= BPayment::where('b_student_id',$b_student->id)->where('code',$code)->first();
            return redirect(route('student_single_batch',$pay->id));
  
        } 
        
        
    }

    public function student_single_batch($id)
    {
        $student = Auth::user();
        $pay= BPayment::findOrFail($id);
        $batch= BStudent::findOrFail($pay->b_student_id);
        $date = Carbon::now();
        $day=$date->day;

        if ($pay->status==0) {
            if ($day<16) {
                session()->flash('warning', 'Please pay the class fee before 15. Account will be suspend automatically after 15');
                return view('student.classes.single')->with('student',$student)->with('batch',$batch);
            }
            if ($day>15) {
                session()->flash('danger', 'You can not access the class '.$batch->g_batch->group->title.' due to payment issue. Please settle the payment online or contact our admin.');
                return redirect()->back();
            }
        }

        if ($pay->status==1) {
                return view('student.classes.single')->with('student',$student)->with('batch',$batch); 
        }

        if ($pay->status==2) {
            session()->flash('warning', 'Please pay the class fee as soon as possible.');
                return view('student.classes.single')->with('student',$student)->with('batch',$batch); 
        }
        
    }

    public function student_zoom()
    {
        $student = Auth::user();
       
        return view('student.classes.meeting')->with('student',$student);
    }

    public function select_zoom_meeting(Request $request)
    {
        $student = Auth::user();
        $meeting_id = $request->input('meeting_id');
        $meeting_pass = $request->input('meeting_pass');

    

        $data = [
            'meeting_id' => $meeting_id,
            'meeting_pass' => $meeting_pass,
        ];

        return view('student.classes.meeting')->with('data',$data)->with('student',$student);
    }

    public function zoommeeting()
    {
        return view('student.classes.zoom_meeting');
    }

    public function paper_do($id)
    {
        $student = Auth::user();
        $bmc=BMcq::findOrFail($id);
        $bst=BStudent::where('user_id',$student->id)->where('g_batch_id',$bmc->g_batch_id)->firstOrFail();
        $paper=GMcq::findOrFail($bmc->g_mcq_id);
        
        return view('student.classes.paper_do')->with('paper',$paper)->with('student',$student)->with('bmc',$bmc)->with('bst',$bst);
    }

    public function mcq_submit(Request $request)
    {
        $data = $request->all();

        $b_student=BStudent::findOrFail($request->b_student_id);
        $b_mcq=BMcq::findOrFail($request->b_mcq_id);
        $g_mcq=GMcq::findOrFail($b_mcq->g_mcq_id);
        if ($b_student->m_marks->where('b_mcq_id',$request->b_mcq_id)->count()==0) {

            $mark = MMark::create([
                'b_student_id' => $request->b_student_id,
                'b_mcq_id' => $request->b_mcq_id ,
                
            ]);
            foreach ($g_mcq->m_questions as $question) {
    
                if($question->ans==$data[$question->id]){
                    $result=1;
                    $q_answer=$question->ans;
                    $s_answer=$data[$question->id];
                    $q_mark=$question->marks;
                    $s_mark=$question->marks;
                    $q_number=$question->number;
                }else{
                    $result=0;
                    $q_answer=$question->ans;
                    $s_answer=$data[$question->id];
                    $q_mark=$question->marks;
                    $s_mark=0;
                    $q_number=$question->number;
                }
    
                $result= MResult::create([
                    'b_student_id' => $request->b_student_id,
                    'b_mcq_id' => $request->b_mcq_id,
                    'm_question_id' => $question->id,
                    'm_mark_id' => $mark->id,
                    'q_number' => $q_number,
                    'q_answer' => $q_answer,
                    's_answer' => $s_answer,
                    'q_mark' => $q_mark,
                    's_mark' => $s_mark,
                    'result' => $result,
                ]);
                
            }
            $paper_mark= MResult::where('m_mark_id',$mark->id)->sum('q_mark');
            $student_mark= MResult::where('m_mark_id',$mark->id)->sum('s_mark');
            $average = ($student_mark/$paper_mark)*100;
            $mark->paper_mark=$paper_mark;
            $mark->student_mark=$student_mark;
            $mark->average=$average;
            $mark->save();
            session()->flash('success', 'Paper Evaluated Successfully!!!');
            return redirect(route('student_paper_result',$request->b_mcq_id));
            
        } else {
            session()->flash('danger', 'You Already Submit the Answers!!');
            return redirect()->back();
        }
        
        
    }

    public function paper_result($id)
    {
        $student = Auth::user();
        $bmc=BMcq::findOrFail($id);
        $bst=BStudent::where('user_id',$student->id)->where('g_batch_id',$bmc->g_batch_id)->firstOrFail();
        $mark=MMark::where('b_student_id',$bst->id)->where('b_mcq_id',$bmc->id)->firstOrFail();
        
        
        return view('student.classes.paper_result')->with('mark',$mark)->with('student',$student)->with('bmc',$bmc)->with('bst',$bst);
    }

    public function tutorial_single($id)
    {
        $student = Auth::user();
        $tutorial=BTutorial::findOrFail($id);
        
        return view('student.classes.tutorial')->with('tutorial',$tutorial)->with('student',$student);
    }

    public function video_single($id)
    {
        $student = Auth::user();
        $video=BVideo::findOrFail($id);
        
        return view('student.classes.video')->with('video',$video)->with('student',$student);
    }
}
