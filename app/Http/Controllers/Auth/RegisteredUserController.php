<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use GuzzleHttp\Client;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
          
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $OTPValue = rand(10000, 99999);
        
        $user = User::create([
            'role_id' => 4,
            'author' =>'Online',
            'opt' => $OTPValue,
            'title' => $request->title,
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'mobile' => $request->mobile,
            'school' => $request->school,
            'gender' => $request->gender,
            'is_sadhana' => $request->is_sadhana,
            'parents_name' => $request->parents_name,
            'sadhana_reg_number' => $request->sadhana_reg_number,
            'is_active' =>0,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user = User::where('email', $request->email)->firstOrFail();
        $user->user_name='ST'.(1000+$user->id);
        $user->save();
        $mobileNumber = '+94'.$user->mobile;
        //Message
        $msg = "Dear Customer,\nYour verification OTP is\nOTP:" . $OTPValue;

        //SMS Gateway crendetails
        $user_id = "13565"; // string | API User ID - Can be found in your settings page.
        $api_key = "EyUaBqDwGn5XZxDbbfRR"; // string | API Key - Can be found in your settings page.
        $sender_id = "OrbitLearn"; // string | This is the from name recipient will see as the sender of the SMS. Use \\\"NotifyDemo\\\" if you have not ordered your own sender ID yet.
        $baseURL = "https://app.notify.lk/api/v1/send?";

        $apiURL =  $baseURL . 'user_id=' . $user_id . '&api_key=' . $api_key . '&sender_id=' . $sender_id . '&to=' . $mobileNumber . '&message=' . $msg;

        $client = new Client();
        $res = $client->get($apiURL);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
