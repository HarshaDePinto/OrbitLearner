<?php

namespace App\Http\Controllers;

use App\Models\GBatch;
use App\Models\Grade;
use App\Models\Group;
use App\Models\Subject;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        switch (Auth::user()->role_id) {
            case 1:
                if (Auth::user()->is_active==1) {
                    return redirect()->route('admin_home');
                } else {
                    return redirect()->route('mobile_verification');
                }
                
                break;
            case 3:
                return redirect()->route('manager_home',Auth::user()->id);
                break;
            case 2:
                if (Auth::user()->is_active==1) {
                    return redirect()->route('teacher_home',Auth::user()->id);
                } else {
                    return redirect()->route('home');
                }
                break;
                
            case 4:
                if (Auth::user()->is_active==1) {
                    return redirect()->route('student_home',Auth::user()->id);
                } else {
                    return redirect()->route('mobile_verification');
                }
                
                break;
            case 5:
                if (Auth::user()->is_active==1) {
                        return redirect()->route('finance_home',Auth::user()->id);
                } else {
                        return redirect()->route('home');
                }
                    
                break;

            case 6:
                    if (Auth::user()->is_active==1) {
                            return redirect()->route('designer_home',Auth::user()->id);
                    } else {
                            return redirect()->route('home');
                    }
                        
                    break;
                
        }

    }

    public function admin_home()
    {
        $date = Carbon::now();
        $day=$date->dayName;
        $users=User::with('role')->orderBy('updated_at', 'desc')->get();
        $grades= Grade::orderBy('updated_at', 'desc')->get();
        $subjects= Subject::orderBy('updated_at', 'desc')->get();
        $batches = GBatch::where('is_active',1)->where('day',$day)->orderBy('updated_at', 'desc')->get();
        return view('admin.admin-home')->with('users',$users)->with('grades',$grades)->with('subjects',$subjects)->with('batches',$batches);
    }

    public function mobile_verification()
    {
        return view('mobile-verification');
    }

    public function mobile_activation(Request $request)
    {
        if (Auth::user()->opt==$request->opt) {
            $user= User::findOrFail(Auth::user()->id);
            $user->is_active=1;
            $user->save();
            session()->flash('success', 'Mobile Verified Successfully!!!');
            return redirect()->intended(RouteServiceProvider::HOME);
        }
        if (Auth::user()->opt!=$request->opt) {
            session()->flash('danger', 'Code Does Not  Match Please Try Again!');
            return redirect()->back();
        }
   
       
        
    }

    public function student_home($id)
    {
        $student= User::findOrFail($id);
        
        return view('student.student_home')->with('student',$student);
    }

    public function teacher_home($id)
    {
        $teacher= User::findOrFail($id);
        
        return view('teacher.teacher_home')->with('teacher',$teacher);
    }

    public function finance_home($id)
    {
        $accountant= User::findOrFail($id);
        
        return view('accountant.accountant_home')->with('accountant',$accountant);
    }

    public function designer_home($id)
    {
        $designer= User::findOrFail($id);
        
        return view('designer.designer_home')->with('designer',$designer);
    }
}
