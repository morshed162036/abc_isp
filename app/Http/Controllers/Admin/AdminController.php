<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\Admin;
use App\Models\Complaint;
class AdminController extends Controller
{
    public function adminDashboard(){
        return view('admin.admins.dashboard');
    }

    public function login(Request $request){

        if($request->isMethod('post')){
            $data = $request->all();
            $validate = $request->validate([
                'email' => 'required|email|max:255',
                'password' => 'required',
            ]);

            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>'Active','type'=>'Employee'])){
                $complain = Complaint::where('assigned_to',Auth::guard('admin')->user()->id)->get();
                return view('admin.admins.dashboard',compact('complain'));
            }
            elseif(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>'Active'])){
                return redirect('admin/dashboard');
            }
            else{
                return redirect()->back()->with('error','Invalid Email or Password');
            }
        }


        return view('admin.login');
    }

    public function index(){
        $user = Admin::all();
        return view('admin.admins.adminmanagement',compact('user'));
    }
    public function show(Admin $user){
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.admins.role', compact('user','roles','permissions'));
    }

    public function assignRole(Request $request, Admin $user){
        if($user->hasRole($request->role)){
            return back()->with('error','Role Exists.');
        }
        $user->assignRole($request->role);
        return back()->with('success','Role Assigned.');
    }

    public function revokeRole(Admin $user, Role $role){
        if($user->hasRole($role)){
            $user->removeRole($role);
            return back()->with('success','Role Removed.');
        }
        return back()->with('error','Role Not Exists.');
    }

    public function assignPermission (Request $request, Admin $user){
        if($user->HasPermissionTo($request->permission)){
            return back()->with('error', 'Permission Exists.');
        }
        $user->givePermissionTo($request->permission);
        return back()->with('success', 'Permission Assigned.');
    }

    public function revokePermission(Admin $user, Permission $permission){
        if($user->hasPermissionTo($permission)){
            $user->revokePermissionTo($permission);
            return back()->with('successs','Permission revoked');
        }
        return back()->with('errors','Permission Not Exist');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
