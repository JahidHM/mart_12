<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Mail\WebEmail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Request;


class AdminUserController extends Controller
{
    public function user_index()
    {
        $users = User::all();

        return view('admin.user.index', compact('users'));
    }
    public function user_create(){
        return view('admin.user.create');
    }
            public function user_submit(Request $request){
                
                 $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:100|unique:users,email',
        
    ]);
   $randomPassword = bin2hex(random_bytes(4));
    $user = new User();
    //photo seve 
    if($request->photo){
      $request->validate([
       'photo' => 'image|mimes:jpeg,png,jpg,webp,svg,gif|max:2048'

      ]);
      $photo_name ='user_'.time().'.'.$request->photo->extension();
     
      $request->photo->move(public_path('uploads/'), $photo_name);
      $user->photo ='uploads/'. $photo_name;
    }
  

   
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->city = $request->city;
    $user->country = $request->country;
    $user->division = $request->division;
    $user->zip = $request->zip;
    $user->status = $request->status;
    $user->token ='';
    $user->password = bcrypt($randomPassword);
    // send email to user with their credentiols
     
 $subject = 'Your Account is created';

$message = 'Login Url: ' . route('login') . '<br>';
$message .= 'Your Login Details: <br>';
$message .= 'Email: ' . $request->email . '<br>';
$message .= 'Password: ' . $randomPassword . '<br>';

$user->save();

Mail::to($request->email)->send( new WebEmail($subject, $message));

  
   
    return to_route('admin_user_index')->with('success','User Create  Successfull. .');

}
public function user_edit( string $id){
    $user = User::where('id',$id)->first();
    return view('admin.user.edit',compact('user'));
}
 public function user_update(Request $request, string $id){
                
                 $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:100|unique:users,email,'.$id,
        
    ]);
   
  $user = User::where('id',$id)->first();
    //photo seve 
    if($request->photo){
      $request->validate([
       'photo' => 'image|mimes:jpeg,png,jpg,webp,svg,gif|max:2048'

      ]);
      $photo_name ='user_'.time().'.'.$request->photo->extension();
     
      $request->photo->move(public_path('uploads/'), $photo_name);
      $user->photo ='uploads/'. $photo_name;
    }
  

   
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->city = $request->city;
    $user->country = $request->country;
    $user->division = $request->division;
    $user->zip = $request->zip;
    $user->status = $request->status;
    $user->token ='';
   
    

$user->save();



  
   
    return to_route('admin_user_index')->with('success','User updated   Successfull. .');

}
public function user_delete(string $id){
    $user = User::where('id', $id)->first();
    if (!$user) {

        return redirect()->with('error','User not found');
    }if($user->photo){
        unlink(public_path($user->photo));
        $user->delete();
         return to_route('admin_user_index')->with('success','User deleted   Successfull. .');
    }
}

 }
        
   
    

   

