<?php

namespace App\Http\Controllers;

use App\Models\DLog;
use App\Models\GBatch;
use App\Models\GMcq;
use App\Models\Group;
use App\Models\GTutorial;
use App\Models\GVideo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function teacher_profile($id)
    {
        $teacher= User::findOrFail($id);
        return view('teacher.profile')->with('teacher',$teacher);
    }

    public function teacher_courses()
    {
        $teacher= Auth::user();
        return view('teacher.courses.index')->with('teacher',$teacher);
    }

    public function teacher_c_classes($id)
    {
        $teacher= Auth::user();
        $group= Group::findOrFail($id);
        return view('teacher.courses.classes')->with('teacher',$teacher)->with('group',$group);
    }

    public function teacher_c_single($id)
    {
        $teacher= Auth::user();
        $group= Group::findOrFail($id);
        return view('teacher.courses.single')->with('teacher',$teacher)->with('group',$group);
    }

    public function teacher_c_tutorial($id)
    {
        $teacher= Auth::user();
        $group= Group::findOrFail($id);
        return view('teacher.courses.tutorial')->with('teacher',$teacher)->with('group',$group);
    }

    public function teacher_c_tutorial_s($id)
    {
        $teacher= Auth::user();
        $tutorial=GTutorial::findOrFail($id);
        return view('teacher.courses.tutorial_s')->with('teacher',$teacher)->with('tutorial',$tutorial);
    }

    public function teacher_c_tutorial_d(Request $request)
    {
        $tutorial = GTutorial::findOrFail($request->id);
        Storage::delete($tutorial->doc);
        $d_log = DLog::create([
        
            'user_id' => Auth::user()->id,
            'des' =>'Tutorial '.$tutorial->title.' Removed from '.$tutorial->group->title,
           
           
        ]);
        $tutorial->delete();

        session()->flash('danger', 'Tutorial Removed!');
        return redirect(route('teacher_c_tutorial',$tutorial->group_id));

        
    }

    public function teacher_c_tutorial_c(Request $request)
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
        return redirect(route('teacher_c_tutorial_s',$tutorial->id));
    }

    public function teacher_c_video($id)
    {
        $teacher= Auth::user();
        $group= Group::findOrFail($id);
        return view('teacher.courses.video')->with('teacher',$teacher)->with('group',$group);
    }

    public function teacher_c_video_s($id)
    {
        $teacher= Auth::user();
        $video=GVideo::findOrFail($id);
        
        return view('teacher.courses.video_s')->with('video',$video)->with('teacher',$teacher);

        
    }

    public function teacher_c_video_c(Request $request)
    {
        
            
        $video = GVideo::create([
        
            'group_id' => $request->group_id,
            'title' => $request->title,
            'vid' => $request->vid,
            'is_active' => $request->is_active,
            'author' => $request->author,
            
           
        ]);
        
        session()->flash('success', 'Video Added Successfully!!!');
        return redirect(route('teacher_c_video_s',$video->id));
    }

    public function teacher_c_video_d(Request $request)
    {
        $video = GVideo::findOrFail($request->id);
        $d_log = DLog::create([
        
            'user_id' => Auth::user()->id,
            'des' =>'Video '.$video->title.' Removed from '.$video->group->title,
           
           
        ]);
        $video->delete();

        session()->flash('danger', 'Video Removed!');
        return redirect(route('teacher_c_video',$video->group_id));

        
    }

    public function teacher_c_mcq($id)
    {
        $teacher= Auth::user();
        $mcqs=GMcq::where('group_id',$id)->with('group')->orderBy('number', 'desc')->get();
        $group=Group::findOrFail($id);
        
        return view('teacher.courses.mcq')->with('mcqs',$mcqs)->with('group',$group)->with('teacher',$teacher);

        
    }

    public function teacher_c_mcq_c(Request $request)
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
        return redirect(route('teacher_c_mcq_s',$mcq->id));
    }

    public function teacher_c_mcq_s($id)
    {
        $teacher= Auth::user();
        $mcq=GMcq::findOrFail($id);
        
        return view('teacher.courses.mcq_s')->with('mcq',$mcq)->with('teacher',$teacher);

        
    }

    public function teacher_c_mcq_d(Request $request)
    {
        $mcq = GMcq::findOrFail($request->id);
        $d_log = DLog::create([
        
            'user_id' => Auth::user()->id,
            'des' =>'MCQ '.$mcq->title.' Removed from '.$mcq->group->title,
           
           
        ]);

        $mcq->delete();

        session()->flash('danger', 'MCQ Paper Deleted!');
        return redirect(route('teacher_c_mcq',$mcq->group_id));

        
    }

    public function teacher_c_essay($id)
    {
        $teacher= Auth::user();
        
        $group=Group::findOrFail($id);
        
        return view('teacher.courses.essay')->with('group',$group)->with('teacher',$teacher);

        
    }

    public function teacher_batches()
    {
        $teacher= Auth::user();
        return view('teacher.batches.index')->with('teacher',$teacher);
    }

    public function teacher_b_single($id)
    {
        $teacher= Auth::user();
        $batch=GBatch::findOrFail($id);
        
        return view('teacher.batches.single')->with('batch',$batch)->with('teacher',$teacher);
    }

    public function teacher_b_students($id)
    {
        $teacher= Auth::user();
        $batch=GBatch::findOrFail($id); 
        return view('teacher.batches.students')->with('batch',$batch)->with('teacher',$teacher);
    }

    public function teacher_b_online($id)
    {
        $teacher= Auth::user();
        $batch=GBatch::findOrFail($id);
        
        return view('teacher.batches.online')->with('batch',$batch)->with('teacher',$teacher);
    }

    public function teacher_b_zoom(Request $request)
    {
        $teacher= Auth::user();
        $meeting_id = $request->input('meeting_id');
        $meeting_pass = $request->input('meeting_pass');

    

        $data = [
            'meeting_id' => $meeting_id,
            'meeting_pass' => $meeting_pass,
        ];

        return view('teacher.batches.zoom')->with('data',$data)->with('teacher',$teacher);
    }

    public function teacher_b_tutorial($id)
    {
        $teacher= Auth::user();
        $batch=GBatch::findOrFail($id);
        
        return view('teacher.batches.tutorial')->with('teacher',$teacher)->with('batch',$batch);
    }

    public function teacher_b_video($id)
    {
        $teacher= Auth::user();
        $batch=GBatch::findOrFail($id);
        
        return view('teacher.batches.video')->with('batch',$batch)->with('teacher',$teacher);
    }

    public function teacher_b_mcq($id)
    {
        $teacher= Auth::user();
        $batch=GBatch::findOrFail($id);
        
        return view('teacher.batches.mcq')->with('batch',$batch)->with('teacher',$teacher);

        
    }

    public function teacher_b_essay($id)
    {
        $teacher= Auth::user();
        $batch=GBatch::findOrFail($id);
        
        return view('teacher.batches.essay')->with('batch',$batch)->with('teacher',$teacher);

        
    }
}
