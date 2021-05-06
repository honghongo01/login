<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;


class authController extends Controller
{
    public function login_auth(){
        return view('auth.login_auth');
    }
    public function logout_auth(){
        Auth::logout();
        return redirect('/login-auth')->with('message','Dng xuat authentication');

    }
    public function validation($request){
        return $this->validate($request,[
            'admin_email'=>'required|max:255',
            'admin_password'=>'required|max:255',
        ]);
    }
    public function login(Request $request){
        $this->validate($request,[
            'admin_email' => 'required|email|max:255', 
            'admin_password' => 'required|max:255'
        ]);
        if(Auth::attempt(['admin_email'=>$request->admin_email,'admin_password'=>$request->admin_password ])){
            return redirect('/dashboard');
        }else{
            return redirect('/login-auth')->with('message','Lỗi đăng nhập authentication');
        }

    }
}
