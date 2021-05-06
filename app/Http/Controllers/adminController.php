<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Roles;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;
class adminController extends Controller
{
    public function index(){
        return view('login');
    }
    
public function AuthLogin(){ 
    $admin_id = Auth::id();
    if($admin_id){
        return Redirect::to('/dashboard');
    }else{
        return Redirect::to('/admin')->send();
    } 
}
    public function adminDashboard(Request $request){
        $data=$request->all();
        $adminEmail=$data['admin_email'];
        $adminPass=$data['admin_password'];
        $login=Admin::where('admin_email',$adminEmail)->where('admin_password',$adminPass)->first();
        if($login){
            $loginCount=$login->count();
            if($loginCount>0){
                Session::put('admin_name',$login->admin_name);
                Session::put('admin_id',$login->admin_id);
                return Redirect::to('/dashboard');
            }
        }else{
                Session::put('message','Mật khẩu hoặc tài khoản bị sai.Làm ơn nhập lại');
                return Redirect::to('/admin');
        }
    }

    public function show_dashboard(){
        $this->AuthLogin();
        $admin = Admin::find(Auth::id());
       
        return view('dashboard')->with('admin',$admin);
    }
    public function logout(){
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }
  
}
