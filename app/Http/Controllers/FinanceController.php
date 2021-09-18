<?php

namespace App\Http\Controllers;

use App\Models\BIAccount;
use App\Models\BIAEntry;
use App\Models\BPayment;
use App\Models\BSAccount;
use App\Models\BSAEntry;
use App\Models\BStudent;
use App\Models\BTAccount;
use App\Models\BTAEntry;
use App\Models\DLog;
use App\Models\GBatch;
use App\Models\Invoice;
use App\Models\Item;
use App\Models\UAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;

class FinanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin_accountants()
    {
        $accountants= User::orderBy('updated_at', 'desc')->where('role_id',5)->get();
        return view('admin.accountants.index')->with('accountants',$accountants);
    }

    public function admin_accountant_single($id)
    {
        $teacher=User::findOrFail($id);
        return view('admin.accountants.single')->with('teacher',$teacher);
    }

    public function admin_accountant_create()
    {
        
        return view('admin.accountants.create');
    }

    public function admin_accountant_store(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        if ($request->hasFile('image')) {
            $image = $request->image->store('users');
            $request->image = $image;
        }
        $user = User::create([
            'role_id' =>5,
            'author' => $request->author,
            'title' => $request->title,
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'school' => $request->school,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'gender' => $request->gender,
            'image' => $request->image,
            'des' => $request->des,
            'des2' => $request->des2,
            'is_active' =>1,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user = User::where('email', $request->email)->firstOrFail();
        $user->user_name='AC'.(1000+$user->id);
        $user->save();

        session()->flash('success', 'Accountant Added Successfully!!!');
        return redirect(route('admin_accountant_single',$user->id));
    }

    public function admin_accountant_delete(Request $request)
    {
        
        $student=User::findOrFail($request->id);
        Storage::delete($student->image);
        $d_log = DLog::create([
        
            'user_id' => Auth::user()->id,
            'des' =>'Accountant '.$student->title.' '. $student->f_name.' '. $student->l_name.' Deleted ',
           
           
        ]);
        $student->forceDelete();
        session()->flash('danger', 'Accountant Deleted Successfully!!!');
        return redirect(route('admin_accountants'));
    }

    public function accountant_profile($id)
    {
        $accountant= User::findOrFail($id);
        return view('accountant.profile')->with('accountant',$accountant);
    }

    public function accountant_cart($id)
    {
        $student= User::findOrFail($id);
        $accountant = Auth::user();
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
       
        return view('accountant.cart')->with('student',$student)->with('invoice',$invoice)->with('payments',$payments)->with('accountant',$accountant);
    }

    public function accountant_payment(Request $request)
    {
        $accountant = Auth::user();
        $invoice= Invoice::findOrFail($request->invoice_id);
            $invoice->status=2;
            $invoice->method=2;
            $invoice->author=$request->author;
            $invoice->currency='LKR';
            $invoice->card_holder_name='Manual';
            $invoice->card_no='Manual';
            $invoice->card_no='Manual';
            $invoice->card_expiry='Manual';
            $invoice->payment_status=2;
            $invoice->payment_id='Manual';
            $invoice->md5sig='Manual';
            $invoice->payment_method='Manual';
            $invoice->save();
           
                foreach ($invoice->items as $item) {
                        //Tcom
                        $money =$item->amount;
                        $com =$item->b_payment->g_batch->teacher_commission;
                        if ($item->b_payment->b_student->type == 0) {
                            $tCom= $money*$com/100 ;
                            $iCom=$money-$tCom; 
                        }
                        if ($item->b_payment->b_student->type == 1) {
                            $tCom= $money*$com/100 ;
                            $iCom=$money-$tCom;  
                        }
                        if ($item->b_payment->b_student->type == 2) {
                            $tCom=0; 
                            $iCom=$money-$tCom; 
                        }
                        if ($item->b_payment->b_student->type == 3) {
                            $tCom= $money;
                            $iCom=$money-$tCom;  
                        }
                        if ($item->b_payment->b_student->type == 4) {
                            $tCom= 0; 
                            $iCom=$money-$tCom; 
                        }
                    if ($item->amount==$item->b_payment->amount) {
                        $item->b_payment->status=1;
                        $item->b_payment->method=2;
                        $item->b_payment->author=$request->author;
                        $item->b_payment->save();
                        

                        $acc = BSAccount::where('b_student_id', $item->b_payment->b_student_id)->first();
                        $acc->in=$acc->in+$item->amount;
                        $acc->bal=$acc->in - $acc->out;
                        $acc->des=$item->b_payment->code." Class Fee Paid ";
                        $acc->save();
    
                        $entry=BSAEntry::create([
                            'b_s_account_id' =>$acc->id,
                            'des' =>$acc->des,
                            'type' =>0,
                            'amount' => $item->amount,
                            'author' => $accountant->title.$accountant->f_name.' '.$accountant->l_name,
                        ]);

                        $checkTeacher=BTAccount::where('user_id',$item->b_payment->g_batch->user_id)->where('g_batch_id',$item->b_payment->g_batch_id)->get();

                        if ($checkTeacher->count()==0) {
                            $tAcc=BTAccount::create([
                                'user_id' => $item->b_payment->g_batch->user_id,
                                'g_batch_id' => $item->b_payment->g_batch_id,
                                'des' =>$item->b_payment->user->f_name.' '.$item->b_payment->user->l_name,
                                'in' =>$tCom,
                                'out' =>0,
                                'bal' => $tCom,
                                'author' => $accountant->title.$accountant->f_name.' '.$accountant->l_name,
                            ]);

                            $entry=BTAEntry::create([
                                'b_t_account_id' =>$tAcc->id,
                                'des' =>$tAcc->des,
                                'type' =>0,
                                'amount' => $tCom,
                                'author' => $accountant->title.$accountant->f_name.' '.$accountant->l_name,
                            ]);
                        }

                        if ($checkTeacher->count()==1) {
                            
                            $tAcc= BTAccount::where('user_id',$item->b_payment->g_batch->user_id)->where('g_batch_id',$item->b_payment->g_batch_id)->first();
                            $tAcc->in=$tAcc->in+$tCom;
                            $tAcc->bal=$tAcc->in - $tAcc->out;
                            $tAcc->des=$item->b_payment->user->f_name.' '.$item->b_payment->user->l_name;
                            $tAcc->save();

                            $entry=BTAEntry::create([
                                'b_t_account_id' =>$tAcc->id,
                                'des' =>$tAcc->des,
                                'type' =>0,
                                'amount' => $tCom,
                                'author' => $accountant->title.$accountant->f_name.' '.$accountant->l_name,
                            ]);
                        }
                        $checkInstitute=BIAccount::where('g_batch_id',$item->b_payment->g_batch_id)->get();

                        if ($checkInstitute->count()==0) {
                            $iAcc=BIAccount::create([
                                'g_batch_id' => $item->b_payment->g_batch_id,
                                'des' =>$item->b_payment->user->f_name.' '.$item->b_payment->user->l_name,
                                'in' =>$iCom,
                                'out' =>0,
                                'bal' => $iCom,
                                'author' => $accountant->title.$accountant->f_name.' '.$accountant->l_name,
                            ]);

                            $entry=BIAEntry::create([
                                'b_i_account_id' =>$iAcc->id,
                                'des' =>$iAcc->des,
                                'type' =>0,
                                'amount' => $iCom,
                                'author' => $accountant->title.$accountant->f_name.' '.$accountant->l_name,
                            ]);
                        }

                        if ($checkInstitute->count()==1) {
                            
                            $iAcc= BIAccount::where('g_batch_id',$item->b_payment->g_batch_id)->first();
                            $iAcc->in=$iAcc->in+$iCom;
                            $iAcc->bal=$iAcc->in - $iAcc->out;
                            $iAcc->des=$item->b_payment->user->f_name.' '.$item->b_payment->user->l_name;
                            $iAcc->save();

                            $entry=BIAEntry::create([
                                'b_i_account_id' =>$iAcc->id,
                                'des' =>$iAcc->des,
                                'type' =>0,
                                'amount' => $iCom,
                                'author' => $accountant->title.$accountant->f_name.' '.$accountant->l_name,
                            ]);
                        }

                    }

                    if ($item->amount < $item->b_payment->amount) {
                        $item->b_payment->status=0;
                        $item->b_payment->method=2;
                        $item->b_payment->amount=$item->b_payment->amount - $item->amount;
                        $item->b_payment->author=$request->author;
                        $item->b_payment->save();

                        $acc = BSAccount::where('b_student_id', $item->b_payment->b_student_id)->first();
                        $acc->in=$acc->in+$item->amount;
                        $acc->bal=$acc->in - $acc->out;
                        $acc->des=$item->b_payment->code." Class Fee Paid ";
                        $acc->save();
    
                        $entry=BSAEntry::create([
                            'b_s_account_id' =>$acc->id,
                            'des' =>$acc->des,
                            'type' =>0,
                            'amount' => $item->amount,
                            'author' => $accountant->title.$accountant->f_name.' '.$accountant->l_name,
                        ]);

                        $checkTeacher=BTAccount::where('user_id',$item->b_payment->g_batch->user_id)->where('g_batch_id',$item->b_payment->g_batch_id)->get();

                        if ($checkTeacher->count()==0) {
                            $tAcc=BTAccount::create([
                                'user_id' => $item->b_payment->g_batch->user_id,
                                'g_batch_id' => $item->b_payment->g_batch_id,
                                'des' =>$item->b_payment->user->f_name.' '.$item->b_payment->user->l_name,
                                'in' =>$tCom,
                                'out' =>0,
                                'bal' => $tCom,
                                'author' => $accountant->title.$accountant->f_name.' '.$accountant->l_name,
                            ]);

                            $entry=BTAEntry::create([
                                'b_t_account_id' =>$tAcc->id,
                                'des' =>$tAcc->des,
                                'type' =>0,
                                'amount' => $tCom,
                                'author' => $accountant->title.$accountant->f_name.' '.$accountant->l_name,
                            ]);
                        }

                        if ($checkTeacher->count()==1) {
                            
                            $tAcc= BTAccount::where('user_id',$item->b_payment->g_batch->user_id)->where('g_batch_id',$item->b_payment->g_batch_id)->first();
                            $tAcc->in=$tAcc->in+$tCom;
                            $tAcc->bal=$tAcc->in - $tAcc->out;
                            $tAcc->des=$item->b_payment->user->f_name.' '.$item->b_payment->user->l_name;
                            $tAcc->save();

                            $entry=BTAEntry::create([
                                'b_t_account_id' =>$tAcc->id,
                                'des' =>$tAcc->des,
                                'type' =>0,
                                'amount' => $tCom,
                                'author' => $accountant->title.$accountant->f_name.' '.$accountant->l_name,
                            ]);
                        }

                        $checkInstitute=BIAccount::where('g_batch_id',$item->b_payment->g_batch_id)->get();

                        if ($checkInstitute->count()==0) {
                            $iAcc=BIAccount::create([
                                'g_batch_id' => $item->b_payment->g_batch_id,
                                'des' =>$item->b_payment->user->f_name.' '.$item->b_payment->user->l_name,
                                'in' =>$iCom,
                                'out' =>0,
                                'bal' => $iCom,
                                'author' => $accountant->title.$accountant->f_name.' '.$accountant->l_name,
                            ]);

                            $entry=BIAEntry::create([
                                'b_i_account_id' =>$iAcc->id,
                                'des' =>$iAcc->des,
                                'type' =>0,
                                'amount' => $iCom,
                                'author' => $accountant->title.$accountant->f_name.' '.$accountant->l_name,
                            ]);
                        }

                        if ($checkInstitute->count()==1) {
                            
                            $iAcc= BIAccount::where('g_batch_id',$item->b_payment->g_batch_id)->first();
                            $iAcc->in=$iAcc->in+$iCom;
                            $iAcc->bal=$iAcc->in - $iAcc->out;
                            $iAcc->des=$item->b_payment->user->f_name.' '.$item->b_payment->user->l_name;
                            $iAcc->save();

                            $entry=BIAEntry::create([
                                'b_i_account_id' =>$iAcc->id,
                                'des' =>$iAcc->des,
                                'type' =>0,
                                'amount' => $iCom,
                                'author' => $accountant->title.$accountant->f_name.' '.$accountant->l_name,
                            ]);
                        }


                    }
                    
                }
            
                return redirect(route('accountant_invoice',$invoice->id));
        
    }

    public function accountant_invoice($id)
    {
        $accountant = Auth::user();
        $invoice= Invoice::findOrFail($id);
        return view('accountant.invoice')->with('accountant',$accountant)->with('invoice',$invoice);
    }

    public function accountant_history($id)
    {
        $student= User::findOrFail($id);
        $accountant = Auth::user();
        $invoices= Invoice::where('user_id',$student->id)->where('status',2)->get();
        return view('accountant.history')->with('student',$student)->with('invoices',$invoices)->with('accountant',$accountant);
    }

    public function student_class($id)
    {
        $clz = BStudent::findOrFail($id);
        $student= User::findOrFail($clz->user_id);
        $accountant = Auth::user();
        return view('accountant.student.clz')->with('student',$student)->with('clz',$clz)->with('accountant',$accountant);
    }

    public function student_online($id)
    {
        $pay = BPayment::findOrFail($id);

        if ($pay->status==0) {
            $pay->status=2;
            $pay->save();
            return redirect()->back();
        }

        if ($pay->status==2) {
            $pay->status=0;
            $pay->save();
            return redirect()->back();
        }

       
        
    }

    public function student_pay_delete($id)
    {
        $pay = BPayment::findOrFail($id);
        $accountant = Auth::user();
        $acc = BSAccount::where('b_student_id', $pay->b_student_id)->first();
        $acc->in=$acc->in+$pay->amount;
        $acc->bal=$acc->in - $acc->out;
        $acc->des=$pay->code." Deleted By ".$accountant->title.$accountant->f_name;
        $acc->save();

        $entry=BSAEntry::create([
            'b_s_account_id' =>$acc->id,
            'des' =>$acc->des,
            'type' =>0,
            'amount' => $pay->amount,
            'author' => $accountant->title.$accountant->f_name,
        ]);
        
        $pay->delete();

        return redirect()->back();
        
    }

    public function student_class_update(Request $request, $id)
    {
        $clz = BStudent::findOrFail($id);
        $data = $request->all();

        $clz->update($data);
        $clz->save();
        session()->flash('success', 'Updated Pay Type Successfully!!!');
        return redirect()->back();
    }

    public function student_payment($id)
    {
        $student= User::findOrFail($id);
        $accountant = Auth::user();
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
        
        return view('accountant.student.payment')->with('student',$student)->with('accountant',$accountant)->with('invoice',$invoice);
    }

    public function student_payment_add(Request $request)
    {
        $clz = BStudent::findOrFail($request->b_student_id);
        $invoice= Invoice::findOrFail($request->invoice_id);
        $student= User::findOrFail($clz->user_id);
        $accountant = Auth::user();
        $year=$request->year;
        $month=$request->month;
        $code=$year.$month;
        $should_pay=$request->shd_pay;
        $pay_amount=$request->amount;

        if ($pay_amount > $should_pay) {
            session()->flash('danger', 'Amount should be less than Should Pay amount!');
            return redirect()->back();
        } else {
            
            $check= BPayment::where('b_student_id',$clz->id)->where('code',$code)->get();

            if ($check->count()==0) {

                $pay=BPayment::create([
                    'user_id' => $student->id,
                    'g_batch_id' => $clz->g_batch_id,
                    'b_student_id' =>$clz->id,
                    'code' =>$code,
                    'year' =>$year,
                    'month' =>$month,
                    'amount' => $should_pay,
                    'author' => $accountant->title.$accountant->f_name.' '.$accountant->l_name,
                    'status' =>0,
                    'method' =>0,
                ]);
                $acc = BSAccount::where('b_student_id', $clz->id)->first();
                $acc->out=$acc->out+$pay->amount;
                $acc->bal=$acc->in - $acc->out;
                $acc->des=$pay->code." Class Fee ";
                $acc->save();
    
                $entry=BSAEntry::create([
                    'b_s_account_id' =>$acc->id,
                    'des' =>$acc->des,
                    'type' =>1,
                    'amount' => $pay->amount,
                    'author' => $accountant->title.$accountant->f_name.' '.$accountant->l_name,
                ]);

                $item=Item::create([
                    'invoice_id' => $invoice->id,
                    'b_payment_id' =>$pay->id,
                    'title' =>$pay->code,
                    'amount' =>$pay_amount,
                    'author' => $accountant->title.$accountant->f_name.' '.$accountant->l_name,
                    'status' =>0,
                    'method' =>0,
                ]);
                session()->flash('success', 'Payment Added!');
                return redirect()->back();
                
                
                
                
                
            } 
    
            if ($check->count()==1) {
    
                $pay= BPayment::where('b_student_id',$clz->id)->where('code',$code)->first();
                 $item=Item::create([
                    'invoice_id' => $invoice->id,
                    'b_payment_id' =>$pay->id,
                    'title' =>$pay->code,
                    'amount' =>$pay_amount,
                    'author' => $accountant->title.$accountant->f_name.' '.$accountant->l_name,
                    'status' =>0,
                    'method' =>0,
                ]);
                session()->flash('success', 'Payment Added!');
                return redirect()->back();
      
            } 

        }
        
        
    }

    public function institute_accounts()
    {
        $accountant = Auth::user();


        return view('admin.accountants.create');
    }

    public function class_accounts()
    {
        $accountant = Auth::user();
        $teachers=User::where('role_id',2)->orderBy('updated_at', 'desc')->get();

        
        return view('accountant.accounts.batches.index')->with('teachers',$teachers)->with('accountant',$accountant);
    }

    public function teacher_account($id)
    {
        $accountant = Auth::user();
        $teacher=User::findOrFail($id);
        $chk=UAccount::where('user_id',$id)->get();

        if ($chk->count()==0) {
            $acc=UAccount::create([
                'user_id' =>$id,
                'des' =>"Account Open",
                'in' =>0,
                'out' =>0,
                'bal' =>0,
                'author' =>"Account Open",
            ]);

            return view('accountant.accounts.batches.teacher')->with('acc',$acc)->with('teacher',$teacher)->with('accountant',$accountant);
        }

        if ($chk->count()==1) {
            $acc=UAccount::where('user_id',$id)->first();

            return view('accountant.accounts.batches.teacher')->with('acc',$acc)->with('teacher',$teacher)->with('accountant',$accountant);
        }

        
        
    }

    public function class_account($id)
    {
        $accountant = Auth::user();
        $clz=GBatch::findOrFail($id);
        $teacher=User::findOrFail($clz->user_id);
        $date = Carbon::now();
        $month=$date->monthName;
        $year=$date->year;
        $code=$year.$month;

        $teacherAcc=BTAccount::where('user_id',$clz->user_id)->where('g_batch_id',$clz->id)->first();
        $instituteAcc=BIAccount::where('g_batch_id',$clz->id)->first();

        if ($teacherAcc && $instituteAcc) {
            $thisMonthPay=BPayment::where('code',$code)->where('status',1)->where('g_batch_id',$clz->id)->get();
            $thisMonthTeacher=BTAEntry::where('b_t_account_id',$teacherAcc->id)->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->get();
            $thisMonthInstitute=BIAEntry::where('b_i_account_id',$instituteAcc->id)->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->get();
            
            return view('accountant.accounts.batches.batch')->with('clz',$clz)->with('thisMonthPay',$thisMonthPay)->with('thisMonthTeacher',$thisMonthTeacher)->with('thisMonthInstitute',$thisMonthInstitute)->with('teacher',$teacher)->with('accountant',$accountant);
        }else{
            session()->flash('danger', 'No Account Details To Show Yet!!');
            return redirect()->back();
        }

        
        
    }

    public function paid_invoices()
    {
        $accountant = Auth::user();
        $invoices= Invoice::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('status',2)->orderBy('updated_at', 'desc')->get();
        $items= Item::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->get();
        $online_total=0;
        $manual_total=0;
        foreach ($items as $item) {
            if ($item->invoice->method==1 && $item->invoice->status==2) {
                $online_total +=$item->amount;
            }
            if ($item->invoice->method==2 && $item->invoice->status==2) {
                $manual_total +=$item->amount;
            }
        }
        return view('accountant.invoices.index')->with('accountant',$accountant)->with('invoices',$invoices)->with('online_total',$online_total)->with('manual_total',$manual_total);
    }

    public function paid_invoice_s($id)
    {
        $accountant = Auth::user();
        $invoice= Invoice::findOrFail($id);
        return view('accountant.invoices.single')->with('accountant',$accountant)->with('invoice',$invoice);
    }
}
