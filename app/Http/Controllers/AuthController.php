<?php

namespace App\Http\Controllers;

use App\Events\UserRegisterEvent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signUp(){
        return view('auth.sign-up');
    }

    public function registerUser(Request $request){
        $request->validate([
           'full_name' =>'required|max:155',
           'email'=>'required|max:90|email',
           'password'=>'required|max:20',
           'phone_number'=>'required'
        ]);
        try{
            if(checkEmailExist($request->email)){
                return redirect()->back()->withWarning('An account with email already exists');
            }
            DB::beginTransaction();
                $userObj = new User();
                $userObj->name = $request->full_name;
                $userObj->email = $request->email;
                $userObj->phone_number = $request->phone_number;
                $userObj->password = Hash::make($request->password);
                $userObj->u_status = 1;
                $userObj->save();
                $userId = $userObj->id;
                event(new UserRegisterEvent($userObj));
            DB::commit();    
            Auth::loginUsingId($userId);
            return redirect('user/dashboard')->withSuccess('register succesfull');
        }catch(\Exception $e){
            DB::rollback();
            // echo $e->getMessage();die;
            return redirect()->back()->withWarning('Registration failed..something went wrong');
        }
    }

    public function login(){
        return view('auth.login');
    }

    public function checkLogin(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
         ]);
         if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],1)){
            if(Auth::user()->u_status!=1){
                Auth::logout();
                return redirect('/login')->withWarning('Account pending for approval or is de-activated..please contact administrator for more info.');
            }
            return redirect('/user/dashboard')->withSuccess('Login Successfull');
         }
         return redirect('/login')->withWarning('Invalid login credentials');
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
