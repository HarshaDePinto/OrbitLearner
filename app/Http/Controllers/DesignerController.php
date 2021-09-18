<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\DLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;

class DesignerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin_designers()
    {
        $designers= User::orderBy('updated_at', 'desc')->where('role_id',6)->get();
        return view('admin.designers.index')->with('designers',$designers);
    }

    public function admin_designer_single($id)
    {
        $teacher=User::findOrFail($id);
        return view('admin.designers.single')->with('teacher',$teacher);
    }

    public function admin_designer_create()
    {
        
        return view('admin.designers.create');
    }

    public function admin_designer_store(Request $request)
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
            'role_id' =>6,
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
        $user->user_name='DE'.(1000+$user->id);
        $user->save();

        session()->flash('success', 'Designer Added Successfully!!!');
        return redirect(route('admin_designer_single',$user->id));
    }

    public function admin_designer_delete(Request $request)
    {
        
        $student=User::findOrFail($request->id);
        Storage::delete($student->image);
        $d_log = DLog::create([
        
            'user_id' => Auth::user()->id,
            'des' =>'Designer '.$student->title.' '. $student->f_name.' '. $student->l_name.' Deleted ',
           
           
        ]);
        $student->forceDelete();
        session()->flash('danger', 'Designer Deleted Successfully!!!');
        return redirect(route('admin_designers'));
    }

    public function designer_profile($id)
    {
        $designer= User::findOrFail($id);
        return view('designer.profile')->with('designer',$designer);
    }

    public function designer_web()
    {
        $designer = Auth::user();
        $abt= About::findOrFail(1);
        return view('designer.web')->with('abt',$abt)->with('designer',$designer);
    }
}
