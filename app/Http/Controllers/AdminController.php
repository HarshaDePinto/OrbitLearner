<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\DLog;
use App\Models\Grade;
use App\Models\Group;
use App\Models\Msg;
use App\Models\Online;
use App\Models\STeacher;
use App\Models\Subject;
use App\Models\User;
use App\Models\ZAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Rules\MatchOldPassword;
use Carbon\Carbon;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Firebase\JWT\JWT;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin_profile($id)
    {
        $admin= User::findOrFail($id);
        return view('admin.profile')->with('admin',$admin);
    }

    public function profile_update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->all();

        $request->validate([
            'email' => 'unique:users,email,'.$user->id,
        ]);

        if ($request->hasFile('image')) {
            $image = $request->image->store('users');
            Storage::delete($user->image);
            $data['image'] = $image;
        }
        $user->update($data);
        $user->save();
        session()->flash('success', 'Updated Successfully!!!');
        return redirect()->back();
    }

    public function password(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        session()->flash('success', 'Password Updated Successfully!!!');
        return redirect()->back();
    }

    public function admin_web()
    {
        $abt= About::findOrFail(1);
        return view('admin.web')->with('abt',$abt);
    }

    public function web_update(Request $request, $id)
    {
        $abt = About::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('m_img')) {
            $m_img = $request->m_img->store('web');
            Storage::delete($abt->m_img);
            $data['m_img'] = $m_img;
        }

        if ($request->hasFile('a_img1')) {
            $a_img1 = $request->a_img1->store('web');
            Storage::delete($abt->a_img1);
            $data['a_img1'] = $a_img1;
        }

        if ($request->hasFile('au_img')) {
            $au_img = $request->au_img->store('web');
            Storage::delete($abt->au_img);
            $data['au_img'] = $au_img;
        }

        if ($request->hasFile('au_sig')) {
            $au_sig = $request->au_sig->store('web');
            Storage::delete($abt->au_sig);
            $data['au_sig'] = $au_sig;
        }

        if ($request->hasFile('c_img')) {
            $c_img = $request->c_img->store('web');
            Storage::delete($abt->c_img);
            $data['c_img'] = $c_img;
        }

        if ($request->hasFile('t_img')) {
            $t_img = $request->t_img->store('web');
            Storage::delete($abt->t_img);
            $data['t_img'] = $t_img;
        }

        if ($request->hasFile('cl_img')) {
            $cl_img = $request->cl_img->store('web');
            Storage::delete($abt->cl_img);
            $data['cl_img'] = $cl_img;
        }

        if ($request->hasFile('g_img')) {
            $g_img = $request->g_img->store('web');
            Storage::delete($abt->g_img);
            $data['g_img'] = $g_img;
        }

        if ($request->hasFile('v_img')) {
            $v_img = $request->v_img->store('web');
            Storage::delete($abt->v_img);
            $data['v_img'] = $v_img;
        }

        if ($request->hasFile('ab_img')) {
            $ab_img = $request->ab_img->store('web');
            Storage::delete($abt->ab_img);
            $data['ab_img'] = $ab_img;
        }
        
        $abt->update($data);
        $abt->save();
        session()->flash('success', 'Web Updated Successfully!!!');
        return redirect()->back();
    }

    public function admin_grades()
    {
        $grades= Grade::orderBy('updated_at', 'desc')->get();
        return view('admin.grades.index')->with('grades',$grades);
    }

    public function admin_grades_create(Request $request)
    {
          
        $grade = Grade::create([
            
            'title' => $request->title,
            'author' => $request->author,
            
        ]);
        session()->flash('success', 'Grade Added Successfully!!!');
        return redirect(route('admin_grade_single',$grade->id));
    }

    public function admin_grades_update(Request $request, $id)
    {
        $grade = Grade::findOrFail($id);

        $data = $request->all();

        $grade->update($data);
        $grade->save();
        session()->flash('success', 'Grade Updated Successfully!!!');
        return redirect()->back();
    }

    public function admin_grades_delete(Request $request)
    {
        
        $grade=Grade::findOrFail($request->id);
        
        $d_log = DLog::create([
        
            'user_id' => Auth::user()->id,
            'des' =>$grade->title.' Deleted',
           
           
        ]);
        $grade->delete();
        session()->flash('danger', 'Grade Deleted Successfully!!!');
        return redirect(route('admin_grades'));
    }

    public function admin_grade_single($id)
    {
        $grd= Grade::findOrFail($id);
        $grades= Grade::orderBy('updated_at', 'desc')->get();
        return view('admin.grades.single')->with('grd',$grd)->with('grades',$grades);
    }

    public function admin_subjects()
    {
        $subjects= Subject::orderBy('updated_at', 'desc')->get();
        return view('admin.subjects.index')->with('subjects',$subjects);
    }

    public function admin_subjects_create(Request $request)
    {
          
        $subject = Subject::create([
            
            'title' => $request->title,
            'author' => $request->author,
        ]);
        session()->flash('success', 'Subject Added Successfully!!!');
        return redirect(route('admin_subject_single',$subject->id));
    }

    public function admin_subjects_update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);

        $data = $request->all();

        $subject->update($data);
        $subject->save();
        session()->flash('success', 'Subject Updated Successfully!!!');
        return redirect()->back();
    }

    public function admin_subjects_delete(Request $request)
    {
        
        $subject=Subject::findOrFail($request->id);
        
        $d_log = DLog::create([
        
            'user_id' => Auth::user()->id,
            'des' =>'Subject '.$subject->title.' Deleted',
           
           
        ]);
        $subject->delete();
        session()->flash('danger', 'Subject Deleted Successfully!!!');
        return redirect(route('admin_subjects'));
    }

    public function admin_subject_single($id)
    {
        $sub= Subject::findOrFail($id);
        $subjects= subject::orderBy('updated_at', 'desc')->get();
        return view('admin.subjects.single')->with('sub',$sub)->with('subjects',$subjects);
    }

    public function admin_teachers()
    {
        $teachers= User::orderBy('updated_at', 'desc')->where('role_id',2)->get();
        return view('admin.teachers.index')->with('teachers',$teachers);
    }

    public function admin_teachers_add()
    {
        
        return view('admin.teachers.create');
    }

    public function admin_teachers_create(Request $request)
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
            'role_id' =>2,
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
            'max_advanced' => $request->max_advanced,
            'welfare_teachers' => $request->welfare_teachers,
            'password' => Hash::make($request->password),
        ]);

        $user = User::where('email', $request->email)->firstOrFail();
        $user->user_name='TE'.(1000+$user->id);
        $user->save();

        session()->flash('success', 'Teacher Added Successfully!!!');
        return redirect(route('admin_teacher_single',$user->id));
    }

    public function admin_teachers_delete(Request $request)
    {
        
        $teacher=User::findOrFail($request->id);
        Storage::delete($teacher->image);
        $d_log = DLog::create([
        
            'user_id' => Auth::user()->id,
            'des' =>'Teacher '.$teacher->title.' '. $teacher->f_name.' '. $teacher->l_name.' Deleted ',
           
           
        ]);
        $teacher->forceDelete();
        session()->flash('danger', 'Teacher Deleted Successfully!!!');
        return redirect(route('admin_teachers'));
    }
    public function admin_teacher_single($id)
    {
        $teacher=User::findOrFail($id);
        $subjects= Subject::orderBy('updated_at', 'desc')->get();
        return view('admin.teachers.single')->with('teacher',$teacher)->with('subjects',$subjects);
    }

    public function admin_teacher_groups($id)
    {
        $teacher=User::findOrFail($id);
        $subjects= Subject::orderBy('updated_at', 'desc')->get();
        $grades= Grade::orderBy('updated_at', 'desc')->get();
        return view('admin.teachers.groups.groups')->with('teacher',$teacher)->with('subjects',$subjects)->with('grades',$grades);
    }

    public function admin_teacher_clz($id)
    {
        $teacher=User::findOrFail($id);
        return view('admin.teachers.batches.batches')->with('teacher',$teacher);
    }
    public function admin_teacher_group(Request $request)
    {
        if ($request->hasFile('img1')) {
            $img1 = $request->img1->store('web');
            $request->img1 = $img1;
        }
        if ($request->hasFile('img2')) {
            $img2 = $request->img2->store('web');
            $request->img2 = $img2;
        }

        $group = Group::create([
        
            'title' => $request->title,
            'user_id' => $request->user_id,
            'grade_id' => $request->grade_id,
            'subject_id' => $request->subject_id,
            'img1' => $request->img1,
            'img2' => $request->img2,
            'des1' => $request->des1,
            'des2' => $request->des2,
            'author' => $request->author,
            'is_active' =>0,
           
        ]);

        session()->flash('success', 'Class Added Successfully!!!');
        return redirect(route('admin_teacher_group_single',$group->id));
    }
    public function admin_teacher_group_single($id)
    {
        $group=Group::findOrFail($id);
        
        return view('admin.teachers.groups.group_single')->with('group',$group);
    }

    public function admin_teacher_group_update(Request $request, $id)
    {
        $group = Group::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('img1')) {
            $img1 = $request->img1->store('web');
            Storage::delete($group->img1);
            $data['img1'] = $img1;
        }
        if ($request->hasFile('img2')) {
            $img2 = $request->img2->store('web');
            Storage::delete($group->img2);
            $data['img2'] = $img2;
        }
        $group->update($data);
        $group->save();
        session()->flash('success', 'Class Updated Successfully!!!');
        return redirect()->back();
    }

    public function admin_teacher_group_delete(Request $request)
    {
        
        $group=Group::findOrFail($request->id);
        Storage::delete($group->img1);
        Storage::delete($group->img2);
        $d_log = DLog::create([
        
            'user_id' => Auth::user()->id,
            'des' =>'Course '.$group->user->title.$group->user->f_name.' '. $group->grade->title.' '. $group->title.' Deleted ',
           
           
        ]);
        $group->delete();
        session()->flash('danger', 'Course Deleted Successfully!!!');
        return redirect(route('admin_teacher_groups',$group->user_id));
    }
    public function user_search(Request $request)
    {
        $data = $request->all();
        $search_users = User::where('user_name', 'LIKE', '%' . $data['user_name'] . '%')->get();
        return redirect()->back()->with('search_users',$search_users);
    }

    public function sad_search(Request $request)
    {
        $data = $request->all();
        $search_users = User::where('sadhana_reg_number', 'LIKE', '%' . $data['sadhana_reg_number'] . '%')->get();
        return redirect()->back()->with('search_users',$search_users);
    }

    public function student_search(Request $request)
    {
        $startDate = Carbon::createFromFormat('d/m/Y',date('d/m/Y', strtotime($request->s_day)));
        $endDate = Carbon::createFromFormat('d/m/Y', date('d/m/Y', strtotime($request->e_day)));


            $s_sts= User::where('created_at', '>=', $startDate)
            ->where('created_at', '<=', $endDate)
            ->where('role_id',4)
            ->get();
       
        return redirect()->back()->with('s_sts',$s_sts)->with('startDate',$startDate)->with('endDate',$endDate);
    }
    public function admin_teachers_password(Request $request, $id)
    {
        $teacher = User::findOrFail($id);
        $request->validate([
            'new_password' => ['required', Rules\Password::defaults()],
        ]);
        $teacher->password=Hash::make($request->new_password);
        $teacher->save();
        session()->flash('success', 'Password Changed Successfully!!!');
        return redirect()->back();
    }

    public function admin_teachers_subject_add(Request $request)
    {
        $teacher=User::findOrFail($request->user_id);
        $subject= Subject::findOrFail($request->subject_id);
        if ($teacher->s_teachers->where('subject_id',$subject->id)->count()==0) {
            $s_teacher = STeacher::create([
                'user_id' =>$teacher->id,
                'subject_id' =>$subject->id,
                
                
            ]);
            
            return redirect(route('admin_teacher_single',$teacher->id));
        } else {
            return redirect()->back();
        }
    }

    public function admin_teachers_subject_remove($id)
    {
        $st=STeacher::findOrFail($id);
        $st->delete();
        session()->flash('danger', 'Subject Removed!');
        return redirect()->back();

        
    }

    public function admin_teachers_sms(Request $request)
    {
        $mobileNumber = '+94'.$request->mobile;
        $msg=$request->msg;

        //SMS Gateway crendetails
        $user_id = "13565"; // string | API User ID - Can be found in your settings page.
        $api_key = "EyUaBqDwGn5XZxDbbfRR"; // string | API Key - Can be found in your settings page.
        $sender_id = "NotifyDEMO"; // string | This is the from name recipient will see as the sender of the SMS. Use \\\"NotifyDemo\\\" if you have not ordered your own sender ID yet.
        $baseURL = "https://app.notify.lk/api/v1/send?";

        $apiURL =  $baseURL . 'user_id=' . $user_id . '&api_key=' . $api_key . '&sender_id=' . $sender_id . '&to=' . $mobileNumber . '&message=' . $msg;

        $client = new Client();
        $res = $client->get($apiURL);
        $data = json_decode($res->getBody());
        $msg_status = $data->status;
        $msg_data    = $data->data;

        $sms = Msg::create([
            'user_id' =>$request->user_id,
            'send_by' =>$request->send_by,
            'msg' =>$request->msg,
            'mobile' =>$request->mobile, 
            'status' =>$msg_status,         
        ]);

        if ($msg_status == 'success' & $msg_data  == 'Sent') {
            session()->flash('success', 'Message Send Successfully!!!');
        } else {
            session()->flash('danger', 'Message Send Failed!');
        }
        
        
        return redirect()->back();
    }

    public function admin_msgs()
    {
        return view('admin.sms.index');
    }

    public function admin_msgs_search(Request $request)
    {
        $startDate = Carbon::createFromFormat('d/m/Y',date('d/m/Y', strtotime($request->s_date)));
        $endDate = Carbon::createFromFormat('d/m/Y', date('d/m/Y', strtotime($request->e_date)));
        $s_msgs= Msg::where('created_at', '>=', $startDate)
        ->where('created_at', '<=', $endDate)
        ->get();
        return redirect()->back()->with('s_msgs',$s_msgs)->with('startDate',$startDate)->with('endDate',$endDate);
    }

    public function admin_msgs_bulk(Request $request)
    {
        
        $msg=$request->msg;

        //SMS Gateway crendetails
        $user_id = "13565"; // string | API User ID - Can be found in your settings page.
        $api_key = "EyUaBqDwGn5XZxDbbfRR"; // string | API Key - Can be found in your settings page.
        $sender_id = "NotifyDEMO"; // string | This is the from name recipient will see as the sender of the SMS. Use \\\"NotifyDemo\\\" if you have not ordered your own sender ID yet.
        $baseURL = "https://app.notify.lk/api/v1/send?";

        if ($request->op==1) {
            $users= User::where('is_active',1)->where('role_id',2)->get();
        }
        if ($request->op==2) {
            $users= User::where('is_active',1)->where('role_id',4)->get();
        }
        if ($request->op==3) {
            $users= User::where('is_active',1)->where('role_id',3)->get();
        }
        if ($request->op==4) {
            $users= User::where('is_active',1)->get();
        }
        foreach ($users as $user) {
            $mobileNumber='+94'.$user->mobile;
            $apiURL =  $baseURL . 'user_id=' . $user_id . '&api_key=' . $api_key . '&sender_id=' . $sender_id . '&to=' . $mobileNumber . '&message=' . $msg;
            $client = new Client();
            $res = $client->get($apiURL);
            $data = json_decode($res->getBody());
            $msg_status = $data->status;
            $msg_data    = $data->data;

            $sms = Msg::create([
                'user_id' =>$user->id,
                'send_by' =>$request->send_by,
                'msg' =>$request->msg,
                'mobile' =>$user->mobile, 
                'status' =>$msg_status,         
            ]);
        }
        
        session()->flash('success', 'Message Send Successfully!!!');
    
        return redirect()->back();
    }

    public function delete_log()
    {
        $logs=DLog::orderBy('updated_at', 'desc')->take(10)->get();
      
        
        return view('admin.d_logs')->with('logs',$logs);
    }

    public function delete_search(Request $request)
    {
        $startDate = Carbon::createFromFormat('d/m/Y',date('d/m/Y', strtotime($request->s_day)));
        $endDate = Carbon::createFromFormat('d/m/Y', date('d/m/Y', strtotime($request->e_day)));
  
        $s_logs = DLog::where('created_at', '>=', $startDate)
                        ->where('created_at', '<=', $endDate)
                        ->get();
        return redirect()->back()->with('s_logs',$s_logs)->with('startDate',$startDate)->with('endDate',$endDate);
    }

    public function create_zoom_meeting(Request $request)
    {

        $zAcc=ZAccount::findOrFail($request->zoom_account_id);
      
       $key = $zAcc->key;
       $secret = $zAcc->secret;
       $url = env('ZOOM_API_URL', '');

       $payload = [
        'iss' => $key,
        'exp' => strtotime('+60 minute'),
        ];

        $jwt = JWT::encode($payload, $secret, 'HS256');
       
         $headers = [
            'Authorization' => 'Bearer '. $jwt,
            'Content-Type'  => 'application/json',
            'Accept'        => 'application/json',
        ];
        

        //API path
        $path = 'users/'.$zAcc->email.'/meetings';
      
       
       
        $data_ZoomTimeFormat  = date('Y-m-d\TH:i:s', strtotime($request->date));
        //meeting topic
        $meetingTopic = $request->input('meeting_topic');
        //meeting topic
        $meetingAgenda = $request->input('meeting_agenda');
        //duration in minutes
        $meetingDuration = $request->input('meeting_duration');
        $meetingType =2;

        $body =json_encode([
            'topic'      => $meetingTopic,
            'type'       => $meetingType,
            'start_time' => $data_ZoomTimeFormat,
            'duration'   => $meetingDuration,
            'agenda'     => $meetingAgenda,
            'timezone'     => 'Asia/Kolkata',
            'settings'   => [
                'host_video'        => true,
                'participant_video' => false,
                'waiting_room'      => true,
            ],
        ]);

        $params['headers'] = $headers;
        $params['body'] = $body;

        $client = new Client();
        $response = $client->post($url.$path,  $params);

        $data = json_decode($response->getBody());


        $status = $data->status;
        if( $status == 'waiting'){

            $online = Online::create([
                'topic' => $meetingTopic,
               'agenda' => $meetingAgenda,
               'meeting_type' => $meetingType,
               'meeting_id' => $data->id,
               'meeting_password' => $data->password,
               'assistant_id' => 'NA',
               'host_id' => $data->host_id,
               'join_url' => $data->join_url,
               'start_time' => $data->start_time,
               'start_url' => $data->start_url,
               'status' =>0,
               'author' =>$request->author,
               'g_batch_id' =>$request->g_batch_id,
                
                
            ]);
          

       }
       
        return redirect()->back();
    }

    public function zoom_accounts()
    {
        $zAccounts= ZAccount::orderBy('updated_at', 'desc')->get();
        return view('admin.zoom.index')->with('zAccounts',$zAccounts);
    }

    public function admin_students()
    {
        
        return view('admin.students.index');
    }
    public function admin_student_single($id)
    {
        $student=User::findOrFail($id);
        return view('admin.students.single')->with('student',$student);
    }

    public function admin_student_delete(Request $request)
    {
        
        $student=User::findOrFail($request->id);
        Storage::delete($student->image);
        $d_log = DLog::create([
        
            'user_id' => Auth::user()->id,
            'des' =>'Student '.$student->title.' '. $student->f_name.' '. $student->l_name.' Deleted ',
           
           
        ]);
        $student->forceDelete();
        session()->flash('danger', 'Student Deleted Successfully!!!');
        return redirect(route('admin_students'));
    }

    public function create_zoom_account(Request $request)
    {
          
        $zAcc = ZAccount::create([
            
            'title' => $request->title,
            'email' => $request->email,
            'key' => $request->key,
            'secret' => $request->secret,
            'author' => $request->author,
        ]);
        session()->flash('success', 'Account Added Successfully!!!');
        return redirect(route('zoom_account_single',$zAcc->id));
    }

    public function zoom_account_single($id)
    {
        $zAcc=ZAccount::findOrFail($id);
        return view('admin.zoom.single')->with('zAcc',$zAcc);
    }

    public function zoom_account_update(Request $request, $id)
    {
        $zAcc=ZAccount::findOrFail($id);

        $data = $request->all();

        $zAcc->update($data);
        $zAcc->save();
        session()->flash('success', 'Account Updated Successfully!!!');
        return redirect()->back();
    }

    public function delete_zoom_account(Request $request)
    {
        
        $zAcc=ZAccount::findOrFail($request->id);
        
        $d_log = DLog::create([
        
            'user_id' => Auth::user()->id,
            'des' =>'Zoom Account'.$zAcc->title.' Deleted',
           
           
        ]);
        $zAcc->delete();
        session()->flash('danger', 'Subject Deleted Successfully!!!');
        return redirect(route('zoom_accounts'));
    }

}
