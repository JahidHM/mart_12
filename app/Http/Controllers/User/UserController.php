<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\WebEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;



class UserController extends Controller
{
    public function dashboard(){
        $user = Auth::user();
        return view('user.dashbord',compact('user'));                    
    }
    public function register(){
        return view('user.register');
    }
    public function register_submit(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:100|unique:users,email',
        'password' => 'required|min:8',
        'confirm_password' => 'required|same:password',
    ]);
     $token = hash('sha256',time());

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->token = $token;
    $user->save();
    $register_link = route('register_verify', [$token, $request->email]);

    $subject = 'Registration Verification';
      $message = "Click on the link to verify your email: <br>";
    $message .= '<a href="'.$register_link.'">'.$register_link.'</a>';
    Mail::to($request->email)->send(new WebEmail($subject, $message));
    return redirect()->back()->with('success','Registration Successfull. Please check your email to verify your account.');

}
public function register_verify($token, $email)
{
    $user = User::where('email', $email)
                ->where('token', $token)
                ->first();

    if (!$user) {
        return redirect()->route('login')
                         ->with('error', 'Invalid token or email');
    }

    $user->token = '';
    $user->status = 1;
    $user->update();

    return redirect()->route('login') ->with('success', 'Email Verified Successfully. You can login now.');
}


public function login(){
    return view('user.login');
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

    if (Auth::guard('web')->attempt($data)){
        return redirect()->route('dashboard')->with('success','Logged in successfully');
    }else{
        return redirect()->back()->withErrors(['email'=>'Invalid Email ','password'=>'rong password','status'=> 'User is not activated yet. Wait for sometime']);
    }

   
}
    public function logout(){
    Auth::guard('web')->logout();
    return redirect()->route('login')->with('success','Logged out successfully');
}
public function forget_password(){
     return view('user.forget_password');
}
public function forget_password_submit(Request $request){

    $request->validate([
        'email' => 'required|email',
        
    ]);
    $user = User::where('email', $request->email)->first();
    if(!$user){
        return redirect()->back()->with('error','Email Not Found');
    }
    $token = hash('sha256',time());
    $user->token = $token;
    $user->update();
    $reset_link = route('reset_password',[$token, $request->email]);
    $subject = 'Reset password';
    $message = "Click on the link to reset your password: <br>";
    $message .= '<a href="'. $reset_link.'">'. $reset_link.' </a>';
    Mail::to($request->email)->send(new WebEmail($subject, $message));
    return redirect()->back()->with('success','Reset password link has been sent to your email ');
    

}
public function reset_password($token,$email){
     $user = User::where('email', $email)->where('token', $token)->first();
     if(!$user){
        return to_route('login')->with('error','Invalid link');
    }
    return view('user.reset_password',compact('token','email'));
}
public function reset_password_submit(Request $request, $token,$email){
        $request->validate([
        'password' => 'required',
        'confirm_password' => 'required|same:password',
        
    ]);
    $user = User::where('email', $email)->where('token', $token)->first();
    $user->password = Hash::make($request->password);
    $user->token = '';
    $user->update();
    
    return to_route('login')->with('success','Password reset successfully');
}
public function profile(){
    return view('user.pages.profile');
}
 public function profileSubmit(Request $request){
    $request->validate([
        'name'=> 'required',
        'email' => 'required | email | unique:users,email,'. Auth::guard('web')->user()->id,
       
    ]);
    $user = User::where('id',Auth::guard('web')->user()->id)->first();
    //photo seve 
    if($request->photo){
      $request->validate([
       'photo' => 'image|mimes:jpeg,png,jpg,webp,svg,gif|max:2048'

      ]);
      $photo_name ='user_'.time().'.'.$request->photo->extension();
      //if ($admin->photo != '') {
       //unlink(public_path('uploads/'.$admin->photo));
     // }
      $request->photo->move(public_path('uploads/'), $photo_name);
      $user->photo ='uploads/'. $photo_name;
    }
    // password save 
    if($request->password){
        $request->validate([
       'password'=> 'string',
        'confirm_password'=> 'required | same:password',
        ]);
       
        $user->password = Hash::make($request->password);

    }
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->country = $request->country;
    $user->city = $request->city;
    $user->division = $request->division;
    $user->zip = $request->zip;
    $user->save();

    return redirect()->back()->with('success', 'Profile updated successfully.');
    
   }


    public function wishlist()
    {
        return view('user.pages.wishlist');
    }
    public function orders(){
        return view('user.pages.orders');
    }
    public function orders_single($id){
        return view('user.pages.orders_single');
    }
}


