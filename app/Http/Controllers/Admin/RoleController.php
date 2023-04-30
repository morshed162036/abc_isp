<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        $title = 'Roles';
        return view('admin.role.index', compact('roles','title'));
    }

    public function create(){
        return view('admin.role.create');
    }

    public function store(Request $request){
        Role::create(['guard_name'=>'admin','name'=> $request->name]);
        return to_route('role.index');
    }
    public function edit(Role $role){
        $permissions = Permission::all();
        return view('admin.role.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role){
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        $role->update($validated);
        return to_route('role.index');
    }

    public function givePermission(Request $request, Role $role){
        if($role->HasPermissionTo($request->permission)){
            return back()->with('error', 'Permission Exists.');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('success', 'Permission Assigned.');
    }

    public function revokePermission(Role $role, Permission $permission){
        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            return back()->with('success','Permission revoked');
        }
        return back()->with('error','Permission Not Exist');
    }
    public function destroy(Role $role){
        $role->delete();

        return back();
    }
}
