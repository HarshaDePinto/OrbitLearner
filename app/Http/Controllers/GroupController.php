<?php

namespace App\Http\Controllers;

use App\Models\BMcq;
use App\Models\BTutorial;
use App\Models\BVideo;
use App\Models\DLog;
use App\Models\GBatch;
use App\Models\GMcq;
use App\Models\Grade;
use App\Models\Group;
use App\Models\GTutorial;
use App\Models\GVideo;
use App\Models\MMark;
use App\Models\MQuestion;
use App\Models\Subject;
use App\Models\User;
use App\Models\ZAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GroupController extends Controller
{
    public function admin_teacher_batches($id)
    {
        $group=Group::findOrFail($id);
        return view('admin.teachers.batches.index')->with('group',$group);
    }

    public function admin_teacher_batch(Request $request)
    {

        $batch = GBatch::create([
        
            'type' => $request->type,
            'user_id' => $request->user_id,
            'grade_id' => $request->grade_id,
            'subject_id' => $request->subject_id,
            'group_id' => $request->group_id,
            'title' => $request->title,
            'year' => $request->year,
            'day' => $request->day,
            'cat' => $request->cat,
            'start' => $request->start,
            'end' => $request->end,
            'fees' => $request->fees,
            'teacher_commission' => $request->teacher_commission,
            'author' => $request->author,
            'is_active' =>0,
           
        ]);

        session()->flash('success', 'Batch Added Successfully!!!');
        return redirect(route('admin_teacher_batch_single',$batch->id));
    }

    public function admin_teacher_batch_online($id)
    {
        $batch=GBatch::findOrFail($id);
        $zAccounts= ZAccount::orderBy('updated_at', 'desc')->get();
        
        return view('admin.teachers.batches.online')->with('batch',$batch)->with('zAccounts',$zAccounts);
    }

    public function admin_teacher_batch_students($id)
    {
        $batch=GBatch::findOrFail($id);
        
        return view('admin.teachers.batches.students')->with('batch',$batch);
    }

    public function admin_teacher_batch_single($id)
    {
        $batch=GBatch::findOrFail($id);
        
        return view('admin.teachers.batches.single')->with('batch',$batch);
    }

    public function admin_teacher_batch_update(Request $request, $id)
    {
        $batch = GBatch::findOrFail($id);

        $data = $request->all();

        $batch->update($data);
        $batch->save();
        session()->flash('success', 'Batch Updated Successfully!!!');
        return redirect()->back();
    }

    public function admin_delete_batch(Request $request)
    {
        
        $batch=GBatch::findOrFail($request->id);

        $d_log = DLog::create([
        
            'user_id' => Auth::user()->id,
            'des' =>'Class '.$batch->user->title.$batch->user->f_name.' '. $batch->grade->title.' '. $batch->title.' Deleted ',
           
           
        ]);
        $batch->delete();
        session()->flash('danger', 'Class Deleted Successfully!!!');
        return redirect(route('admin_teacher_batches',$batch->group_id));
    }

    public function teacher_zoom_meeting(Request $request)
    {
        
        $meeting_id = $request->input('meeting_id');
        $meeting_pass = $request->input('meeting_pass');

    

        $data = [
            'meeting_id' => $meeting_id,
            'meeting_pass' => $meeting_pass,
        ];

        return view('admin.teachers.batches.zoom')->with('data',$data);
    }

    public function admin_teacher_group_tutorial($id)
    {
        $group=Group::findOrFail($id);
        
        return view('admin.teachers.groups.tutorials')->with('group',$group);
    }

    public function admin_create_group_tutorial(Request $request)
    {
        
        if ($request->hasFile('doc')) {
            $doc = $request->doc->store('web');
            $request->doc = $doc;
        }
            
        $tutorial = GTutorial::create([
        
            'group_id' => $request->group_id,
            'title' => $request->title,
            'doc' => $request->doc,
            'is_active' => $request->is_active,
            'author' => $request->author,
            
           
        ]);
        
        session()->flash('success', 'Tutorial Added Successfully!!!');
        return redirect(route('admin_teacher_group_tutorial_s',$tutorial->id));
    }

    public function admin_teacher_group_tutorial_s($id)
    {
        
        $tutorial=GTutorial::findOrFail($id);
        
        return view('admin.teachers.groups.tutorial_s')->with('tutorial',$tutorial);

        
    }

    public function admin_update_group_tutorial(Request $request, $id)
    {
        $tutorial = GTutorial::findOrFail($id);

        $data = $request->all();
      
        if ($request->hasFile('doc')) {
            $doc = $request->doc->store('web');
            Storage::delete($tutorial->doc);
            $data['doc'] = $doc;
        }

        $tutorial->update($data);
        $tutorial->save();
        session()->flash('success', 'Tutorial Updated Successfully!!!');
        return redirect()->back();
    }

    public function admin_delete_group_tutorial(Request $request)
    {
        $tutorial = GTutorial::findOrFail($request->id);
        Storage::delete($tutorial->doc);
        $d_log = DLog::create([
        
            'user_id' => Auth::user()->id,
            'des' =>'Tutorial '.$tutorial->title.' Removed from '.$tutorial->group->title,
           
           
        ]);
        $tutorial->delete();

        session()->flash('danger', 'Tutorial Removed!');
        return redirect(route('admin_teacher_group_tutorial',$tutorial->group_id));

        
    }

    public function admin_teacher_batch_tutorial($id)
    {
        $batch=GBatch::findOrFail($id);
        
        return view('admin.teachers.batches.tutorial')->with('batch',$batch);
    }

    public function admin_teacher_batch_t_add(Request $request)
    {
        
        
        $tutorial = BTutorial::create([
        
            'g_tutorial_id' => $request->g_tutorial_id,
            'group_id' => $request->group_id,
            'g_batch_id' => $request->g_batch_id,
            'is_active' => $request->is_active,
            'author' => $request->author,
            
           
        ]);
        

        session()->flash('success', 'Tutorial Added Successfully!!!');
        return redirect()->back();
    }

    public function admin_teacher_batch_tutorial_status($id)
    {
        $tutorial = BTutorial::findOrFail($id);
        if($tutorial->is_active==1){
            $tutorial->is_active=0;
            $tutorial->author=Auth::user()->title.Auth::user()->f_name.' '.Auth::user()->l_name;
            $tutorial->save();
            session()->flash('warning', 'Tutorial Deactivated!');
            return redirect()->back();
        }
        if($tutorial->is_active==0){
            $tutorial->is_active=1;
            $tutorial->author=Auth::user()->title.Auth::user()->f_name.' '.Auth::user()->l_name;
            $tutorial->save();
            session()->flash('success', 'Tutorial Activated!');
            return redirect()->back();
        }

        
    }

    public function admin_teacher_batch_tutorial_delete($id)
    {
        $tutorial = BTutorial::findOrFail($id);
        $d_log = DLog::create([
        
            'user_id' => Auth::user()->id,
            'des' =>'Tutorial '.$tutorial->g_tutorial->title.' Removed from '.$tutorial->group->title.' | '.$tutorial->g_batch->title,
           
           
        ]);

        $tutorial->delete();

        session()->flash('danger', 'Tutorial Removed!');
        return redirect()->back();

        
    }

    public function admin_teacher_group_video($id)
    {
        $group=Group::findOrFail($id);
        
        return view('admin.teachers.groups.videos')->with('group',$group);
    }

    public function admin_create_group_video(Request $request)
    {
        
            
        $video = GVideo::create([
        
            'group_id' => $request->group_id,
            'title' => $request->title,
            'vid' => $request->vid,
            'is_active' => $request->is_active,
            'author' => $request->author,
            
           
        ]);
        
        session()->flash('success', 'Video Added Successfully!!!');
        return redirect(route('admin_teacher_group_video_s',$video->id));
    }

    public function admin_teacher_group_video_s($id)
    {
        
        $video=GVideo::findOrFail($id);
        
        return view('admin.teachers.groups.video_s')->with('video',$video);

        
    }

    public function admin_update_group_video(Request $request, $id)
    {
        $video = GVideo::findOrFail($id);

        $data = $request->all();
        $video->update($data);
        $video->save();
        session()->flash('success', 'Video Updated Successfully!!!');
        return redirect()->back();
    }

    public function admin_delete_group_video(Request $request)
    {
        $video = GVideo::findOrFail($request->id);
        $d_log = DLog::create([
        
            'user_id' => Auth::user()->id,
            'des' =>'Video '.$video->title.' Removed from '.$video->group->title,
           
           
        ]);
        $video->delete();

        session()->flash('danger', 'Video Removed!');
        return redirect(route('admin_teacher_group_video',$video->group_id));

        
    }

    public function admin_teacher_batch_video($id)
    {
        $batch=GBatch::findOrFail($id);
        
        return view('admin.teachers.batches.video')->with('batch',$batch);
    }

    public function admin_teacher_batch_v_add(Request $request)
    {
        
        
        $video = BVideo::create([
        
            'g_video_id' => $request->g_video_id,
            'group_id' => $request->group_id,
            'g_batch_id' => $request->g_batch_id,
            'is_active' => $request->is_active,
            'author' => $request->author,
            
           
        ]);
        

        session()->flash('success', 'Video Added Successfully!!!');
        return redirect()->back();
    }

    public function admin_teacher_batch_video_status($id)
    {
        $video = BVideo::findOrFail($id);
        if($video->is_active==1){
            $video->is_active=0;
            $video->author=Auth::user()->title.Auth::user()->f_name.' '.Auth::user()->l_name;
            $video->save();
            session()->flash('warning', 'Video Deactivated!');
            return redirect()->back();
        }
        if($video->is_active==0){
            $video->is_active=1;
            $video->author=Auth::user()->title.Auth::user()->f_name.' '.Auth::user()->l_name;
            $video->save();
            session()->flash('success', 'Video Activated!');
            return redirect()->back();
        }

        
    }

    public function admin_teacher_batch_video_delete($id)
    {
        $video = BVideo::findOrFail($id);
        $d_log = DLog::create([
        
            'user_id' => Auth::user()->id,
            'des' =>'Video '.$video->g_video->title.' Removed from '.$video->group->title.' | '.$video->g_batch->title,
           
           
        ]);

        $video->delete();

        session()->flash('danger', 'Video Removed!');
        return redirect()->back();

        
    }

    public function admin_teacher_group_mcq($id)
    {
        $mcqs=GMcq::where('group_id',$id)->with('group')->orderBy('number', 'desc')->get();
        $group=Group::findOrFail($id);
        
        return view('admin.teachers.groups.mcq')->with('mcqs',$mcqs)->with('group',$group);

        
    }

    public function admin_create_group_mcq(Request $request)
    {
        
            
        $mcq = GMcq::create([
        
            'group_id' => $request->group_id,
            'title' => $request->title,
            'number' => $request->number,
            'time' => $request->time,
            'is_active' => $request->is_active,
            'type' => $request->type,
            'author' => $request->author,
            
           
        ]);
        
        session()->flash('success', 'MCQ Paper Added Successfully!!!');
        return redirect(route('admin_teacher_group_mcq_s',$mcq->id));
    }

    public function admin_teacher_group_mcq_s($id)
    {
        
        $mcq=GMcq::findOrFail($id);
        
        return view('admin.teachers.groups.mcq_s')->with('mcq',$mcq);

        
    }

    public function admin_update_group_mcq(Request $request, $id)
    {
        $mcq = GMcq::findOrFail($id);

        $data = $request->all();
      
        

        $mcq->update($data);
        $mcq->save();
        session()->flash('success', 'MCQ Paper Updated Successfully!!!');
        return redirect()->back();
    }

    public function admin_delete_group_mcq(Request $request)
    {
        $mcq = GMcq::findOrFail($request->id);
        $d_log = DLog::create([
        
            'user_id' => Auth::user()->id,
            'des' =>'MCQ '.$mcq->title.' Removed from '.$mcq->group->title,
           
           
        ]);

        $mcq->delete();

        session()->flash('danger', 'MCQ Paper Deleted!');
        return redirect(route('admin_teacher_group_mcq',$mcq->group_id));

        
    }

    public function admin_create_group_mqu(Request $request)
    {
        if ($request->hasFile('q_img')) {
            $q_img = $request->q_img->store('web');
            $request->q_img = $q_img;
        }

        if ($request->hasFile('s_img')) {
            $s_img = $request->s_img->store('web');
            $request->s_img = $s_img;
        }

        if ($request->hasFile('s_audio')) {
            $s_audio = $request->s_audio->store('web');
            $request->s_audio = $s_audio;
        }
            
        $mqu = MQuestion::create([
        
            'g_mcq_id' => $request->g_mcq_id,
            'number' => $request->number,
            'marks' => $request->marks,
            'ans' => $request->ans,
            'q_img' => $request->q_img,
            's_img' => $request->s_img,
            's_audio' => $request->s_audio,
            's_vid' => $request->s_vid,
            's_des' => $request->s_des,
            'author' => $request->author,
            
           
        ]);
        
        session()->flash('success', 'MCQ Question Added Successfully!!!');
        return redirect()->back();
    }

    public function admin_delete_group_mqu($id)
    {
        $mqu = MQuestion::findOrFail($id);
        Storage::delete($mqu->q_img);
        Storage::delete($mqu->s_img);
        Storage::delete($mqu->s_audio);
        $d_log = DLog::create([
        
            'user_id' => Auth::user()->id,
            'des' =>'Question '.$mqu->number.' Removed from paper '.$mqu->g_mcq->title.' | '.$mqu->g_mcq->group->title,
           
           
        ]);

        $mqu->delete();

        session()->flash('danger', 'MCQ Removed!');
        return redirect()->back();

        
    }

    public function admin_teacher_batch_mcq($id)
    {
        
        $batch=GBatch::findOrFail($id);
        
        return view('admin.teachers.batches.mcq')->with('batch',$batch);

        
    }

    public function admin_teacher_batch_m_add(Request $request)
    {
        
        
        $mcq = BMcq::create([
        
            'g_mcq_id' => $request->g_mcq_id,
            'group_id' => $request->group_id,
            'g_batch_id' => $request->g_batch_id,
            'is_active' => $request->is_active,
            'author' => $request->author,
            
           
        ]);
        

        session()->flash('success', 'MCQ Paper Added Successfully!!!');
        return redirect()->back();
    }

    public function admin_teacher_batch_mcq_status($id)
    {
        $mcq = BMcq::findOrFail($id);
        if($mcq->is_active==1){
            $mcq->is_active=0;
            $mcq->author=Auth::user()->title.Auth::user()->f_name.' '.Auth::user()->l_name;
            $mcq->save();
            session()->flash('warning', 'MCQ Deactivated!');
            return redirect()->back();
        }
        if($mcq->is_active==0){
            $mcq->is_active=1;
            $mcq->author=Auth::user()->title.Auth::user()->f_name.' '.Auth::user()->l_name;
            $mcq->save();
            session()->flash('success', 'MCQ Activated!');
            return redirect()->back();
        }

        
    }

    public function admin_teacher_batch_mcq_delete($id)
    {
        $mcq = BMcq::findOrFail($id);
        $d_log = DLog::create([
        
            'user_id' => Auth::user()->id,
            'des' =>'MCQ Paper '.$mcq->g_mcq->title.' Removed from '.$mcq->group->title.' | '.$mcq->g_batch->title,
           
           
        ]);
        $mcq->delete();

        session()->flash('danger', 'MCQ Removed!');
        return redirect()->back();

        
    }

    public function admin_teacher_batch_essay($id)
    {
        
        $batch=GBatch::findOrFail($id);
        
        return view('admin.teachers.batches.essay')->with('batch',$batch);

        
    }

    public function admin_teacher_group_essay($id)
    {
        $group=Group::findOrFail($id);
        
        return view('admin.teachers.groups.essays')->with('group',$group);
    }

    public function b_mcq_result($id)
    {
        $mcq = BMcq::findOrFail($id);
       

        return view('admin.teachers.batches.mcq_result')->with('mcq',$mcq);

        
    }

    public function b_mcq_result_s($id)
    {
        $mark = MMark::findOrFail($id);
       

        return view('admin.teachers.batches.mcq_result_s')->with('mark',$mark);

        
    }

}
