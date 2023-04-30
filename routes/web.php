<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\SupportTeamController;
use App\Http\Controllers\Admin\ComplaintController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',[ComplaintController::class,'dashboard'])->name('customer.dashboard');
    Route::post('/dashboard',[ComplaintController::class,'customerCreate'])->name('complaint.create');
    Route::get('logout',[ComplaintController::class,'logout'])->name('customer.logout');
});

Route::prefix('/admin')->group(function(){
     // Admin Login Route
     Route::match(['get','post'],'login',[AdminController::class,'login'])->name('admin.login');

     Route::group(['middleware'=>['admin']],function(){
        // Admin Logout Route
        Route::get('logout',[AdminController::class,'logout'])->name('admin.logout');
        
        // Admin Dashboard Route 
        Route::get('dashboard',[AdminController::class,'adminDashboard'])->name('admin.dashboard');
        
        // Admin Management route
        Route::get('admins',[AdminController::class,'index'])->name('admin.index');
        Route::get('admins/{user}',[AdminController::class,'show'])->name('admin.show');
        // Admin Delete route
        Route::delete('admins/{user}',[AdminController::class,'destroy'])->name('admin.destroy');


        
        Route::resource('/role', RoleController::class);
        Route::post('/role/{role}/permissions', [RoleController::class, 'givePermission'])->name('role.permissions');
        Route::delete('/role/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('role.permissions.revoke');
        Route::resource('/permission', PermissionController::class);

        Route::post('/admins/{user}/roles', [AdminController::class,'assignRole'])->name('admin.roles');
        Route::delete('/admins/{user}/roles/{role}', [AdminController::class,'revokeRole'])->name('admin.role.revoke');
        Route::post('/admins/{user}/permissions', [AdminController::class,'assignPermission'])->name('admin.permissions');
        Route::delete('/admins/{user}/permissions/{permission}', [AdminController::class,'revokePermission'])->name('admin.permissions.revoke');

        // Support Team
        Route::resource('/support-team', SupportTeamController::class);
        Route::get('/team-members', [SupportTeamController::class,'teamIndex'])->name('team_members');
    
    });
});
 