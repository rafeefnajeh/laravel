<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use App\User;

class AdminController extends Controller
{
    public function login(request $request){
        if($request->isMethod('POST')){
            $credentials = $request->only('username', 'password');
            if(Auth::attempt($credentials)){
                $user = Auth::user();
                $view = '';
                if ($user['role_id'] == 1) {
                   $view = '/admin/dashboard';
                } else if ($user['role_id'] == 10) {
                    $view = '/pages/student';
                } else if ($user['role_id'] == 20) {
                    $view = '/pages/organization';
                } else if ($user['role_id'] == 30) {
                        $view = '/pages/trainer';
                }
                return redirect($view);
            }else{
                return redirect('/')->with('flash_message_error','Invalid Username or Password');
            }
        }

        return view('admin.admin_login');
    }

    public function dashboard(){
    /*    if(Session::has('adminSession')){

        }else{
            return redirect('/admin')->with('flash_message_error','Please Login');
        }*/
        return view('admin.dashboard');
    }

    public function settings(){
        return view('admin.settings');
    }

    public function chkPassword(request $request){
       $data = $request->all();
       $current_password = $data['current_pwd'];
       $check_password = User::where(['admin'=>'1'])->first();
       if(Hash::check($current_password,$check_password->password)){
           echo 'True';
       }else{
           echo 'False';
       }
    }
    public function logout(){
        Auth::logout();
        return redirect('/')->with('flash_message_success','Logged out Successfully');
    }
}
