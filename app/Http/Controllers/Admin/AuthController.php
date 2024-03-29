<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{


  public function loginShow()
  {

    // if (Auth::check()) {
    //   return redirect()->route('admin.index');
    // } else {
      return view('auth.login');
    // }
  }

  public function authCheck(Request $request)
  {

    $request->validate([
      'username' => 'required',
      'password' => 'required'
    ]);


      $credential = $request->only('username', 'password');
      
      if (Auth::attempt($credential)) {
        // $pin = rand(11111,999999);
        $user = User::where('id', Auth::user()->id)->first();
        // $user->status = '0';
        // $user->otp = $pin;
         $user->status = '1';
        $user->save();
        // $message = "$user->name,আপনার পিন নম্বর $pin";
        // // $company = CompanyProfile::first();
        // $phone_6 = $company->phone_6;
        // $phone_7 = $company->phone_7;
        // $this->send_sms($phone_6, $message);
        // $this->send_sms($phone_7, $message);
        return redirect()->route('admin.index');
        //  return redirect()->route('login.otp');
       

      } else {
      
        Session::flash('errors', 'Opps! username or password not match');
        return redirect()->route('login');
      }
  }
  public function otp(){
      return view('auth.otp_form');
  }
  public function otpCheck(Request $request){
    // dd($request->all());
    $otp = $request->otp;
    $username = $request->username;
     $user = User::where('username',$username)->first();
    if($user->otp == $otp){
      $user->status = '1';
      $user->save();
      return redirect()->route('admin.index');
    }
    else{
      Session::flash('error','Your otp no match');
      return back()->with('error','Your otp no match');
    }

  }
 
  public function logout()
  {
    Auth::logout();
    return redirect()->route('login');
  }
}
