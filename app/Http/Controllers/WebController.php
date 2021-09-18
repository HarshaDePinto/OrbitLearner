<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Grade;
use App\Models\Group;
use App\Models\STeacher;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home()
    {
        $abt= About::findOrFail(1);
        $teachers=User::orderBy('updated_at', 'desc')->where('role_id',2)->where('is_active',1)->select(['id', 'image','f_name', 'l_name','title','des'])->get();
        $groups=Group::orderBy('updated_at', 'desc')->where('is_active',1)->select(['id', 'img1','title', 'des1','grade_id','user_id'])->take(3)->get();
        return view('welcome')->with('abt',$abt)->with('teachers',$teachers)->with('groups',$groups);
    }

    public function teachers()
    {
        $teachers=User::orderBy('updated_at', 'desc')->where('role_id',2)->where('is_active',1)->select(['id', 'image','f_name', 'l_name','title','des'])->get();
        $subjects= Subject::orderBy('updated_at', 'desc')->get();
        return view('teachers')->with('teachers',$teachers)->with('subjects',$subjects);
    }

    public function teachers_by_subject($id)
    {
        $sub= Subject::findOrFail($id);
        $subjects= Subject::orderBy('updated_at', 'desc')->get();
        return view('teachers_by_subject')->with('sub',$sub)->with('subjects',$subjects);
    }

    public function teacher_single($id)
    {
        $teacher= User::findOrFail($id);
        
        return view('teacher_single')->with('teacher',$teacher);
    }

    public function classes()
    {
        
        $subjects= Subject::orderBy('updated_at', 'desc')->get();
        $grades= Grade::orderBy('updated_at', 'desc')->get();
        return view('classes')->with('grades',$grades)->with('subjects',$subjects);
    }

    public function classes_search(Request $request)
    {
        $data = $request->all();
        $search_classes = Group::where('is_active',1)->where('subject_id',$data['subject_id'])->where('grade_id',$data['grade_id'])->get();
        $s_grade=Grade::findOrFail($data['grade_id']);
        $s_subject=Subject::findOrFail($data['subject_id']);
        return redirect()->back()->with('search_classes',$search_classes)->with('s_grade',$s_grade)->with('s_subject',$s_subject);
    }

    public function class_single($id)
    {
        $group= Group::findOrFail($id);
        
        return view('class_single')->with('group',$group);
    }

    public function about_us()
    {
        
        return view('about_us');
    }

    public function privacy_policy()
    {
        
        return view('privacy_policy');
    }

    public function refund_policy()
    {
        
        return view('refund_policy');
    }
}
