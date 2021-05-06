<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Roles;
use Illuminate\Http\Request;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;
class userController extends Controller
{
    public function AuthLogin(){ 
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        } 
    }
    public function index(){
        $this->AuthLogin();
        $admin=Admin::with('roles')->orderBy('admin_id','DESC')->get();
        return view('all_users')->with('admin',$admin);
    }
    public function add_user(){
        $this->AuthLogin();
        return view('add_users');
    }
    public function deleteUserRoles($admin_id){
        $this->AuthLogin();
        if(Auth::id()==$admin_id){
            return redirect()->back()->with('message','không được xóa chính mình');
        }
        $admin = Admin::find($admin_id);
        if($admin){
            $admin->roles()->detach();
            $admin->delete();
        }
        return redirect()->back()->with('message','xóa thành côg');

    }
    public function store_roles(Request $request){
        $data = $request->all();
        $admin =new Admin();
        $admin->admin_name=$data['admin_name'];
        $admin->admin_email=$data['admin_email'];
        $admin->admin_password=$data['admin_password'];
        $admin->roles()->attach(Roles::where('name','user')->first());

        $admin->save();
        Session::put('message','thêm thành công');
        return Redirect::to('users');

    }
    public function assign_roles(Request $request){
        if(Auth::id()==$request->admin_id){
            return redirect()->back()->with('message','không được xóa chính mình');

        }
        $data = $request->all();
        $user = Admin::where('admin_email',$data['admin_email'])->first();
        $user->roles()->detach();
        if($request->stass_role){
            $user->roles()->attach(Roles::where('name','stass')->first());     
         }
         if($request->user_role){
            $user->roles()->attach(Roles::where('name','user')->first());     
         }
         if($request->admin_role){
            $user->roles()->attach(Roles::where('name','admin')->first());     
         }
         return redirect()->back()->with('message','Cấp quyền thành công');

    }
  public function editUser($admin_id){
      $this->AuthLogin();
    $user = Admin::find($admin_id);
    return view('edit_users')->with('user',$user);
  }
  public function updateUser(Request $request,$admin_id){
    $data = $request -> all();
    $user = Admin :: find($admin_id);
    $user -> admin_name = $data['admin_name'];
    $user -> admin_email = $data['admin_email'];
    $user -> admin_password = $data['admin_password'];
    $user->save();
    Session::put('message','Cập nhật user thành công');
    return redirect('/users');

  }
}
