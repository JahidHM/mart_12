<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\WebEmail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller

    {
    
   public function profile(){
    return view('admin.admin_profile');
   }
   public function profileSubmit(Request $request){
    $request->validate([
        'name'=> 'required',
        'email' => 'required | email | unique:admins,email,'. Auth::guard('admin')->user()->id,
       
    ]);
    $admin = Admin::where('id',Auth::guard('admin')->user()->id)->first();
    //photo seve 
    if($request->photo){
      $request->validate([
       'photo' => 'image|mimes:jpeg,png,jpg,webp,svg,gif|max:2048'

      ]);
      $photo_name ='admin_'.time().'.'.$request->photo->extension();
      //if ($admin->photo != '') {
       //unlink(public_path('uploads/'.$admin->photo));
     // }
      $request->photo->move(public_path('uploads/'), $photo_name);
      $admin->photo ='uploads/'. $photo_name;
    }
    // password save 
    if($request->password){
        $request->validate([
       'password'=> 'string',
        'confirm_password'=> 'required | same:password',
        ]);
       
        $admin->password = Hash::make($request->password);

    }
    $admin->name = $request->name;
    $admin->email = $request->email;
    $admin->save();

    return redirect()->back()->with('success', 'Profile updated successfully.');
    
   }

    public function dashboard(){
    return view('admin.admin_dashboard');
}
public function login(){
    return view('admin.admin_login');
}
public function login_submit(Request $request){
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',


    ]);
    $check = $request->all();

$data = [
    'email' => $check['email'],
    'password' => $check['password'],
];

    if (Auth::guard('admin')->attempt($data)){
        return redirect()->route('admin_dashboard')->with('success','Logged in successfully');
    }else{
        return redirect()->back()->withErrors(['email'=>'Invalid Email Credentials']);
    }
 
}
public function logout(){
    Auth::guard('admin')->logout();
    return redirect()->route('admin_login')->with('success','Logged out successfully');
}
public function forget_password(){
     return view('admin.admin_forget_password');
}
public function forget_password_submit(Request $request){

    $request->validate([
        'email' => 'required|email',
        
    ]);
    $admin = Admin::where('email', $request->email)->first();
    if(!$admin){
        return redirect()->back()->with('error','Email Not Found');
    }
    $token = hash('sha256',time());
    $admin->token = $token;
    $admin->update();
    $reset_link = route('admin_reset_password',[$token, $request->email]);
    $subject = 'Reset password';
    $message = "Click on the link to reset your password: <br>";
    $message .= '<a href="'. $reset_link.'">'. $reset_link.' </a>';
    Mail::to($request->email)->send(new WebEmail($subject, $message));
    return redirect()->back()->with('success','Reset password link has been sent to your email ');

        

}
public function reset_password($token,$email){
     $admin = Admin::where('email', $email)->where('token', $token)->first();
     if(!$admin){
        return to_route('admin_login')->with('error','Invalid link');
    }
    return view('admin.admin_reset_password',compact('token','email'));
}
public function reset_password_submit(Request $request, $token,$email){
        $request->validate([
        'password' => 'required',
        'confirm_password' => 'required|same:password',
        
    ]);
    $admin = Admin::where('email', $email)->where('token', $token)->first();
    $admin->password = Hash::make($request->password);
    $admin->token = '';
    $admin->update();
    
    return to_route('admin_login')->with('success','Password reset successfully');
}
}
