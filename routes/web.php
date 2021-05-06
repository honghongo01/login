<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\userController;
use App\Http\Controllers\authController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layout');
});
Route::get('/admin',[adminController::class,'index']);
Route::post('/admin-dashboard',[adminController::class,'adminDashboard']);
Route::get('/dashboard',[AdminController::class,'show_dashboard']);

Route::get('add-user',[userController::class,'add_user']);
Route::post('store-users',[userController::class,'store_roles']);
Route::get('users',[userController::class,'index']);
// ->middleware('auth.roles');

Route::get('/logout',[adminController::class,'logout']);
Route::group(['middleware'=>'auth.roles'],function(){
Route::get('add-user',[userController::class,'add_user']);
});

Route::get('/login-auth',[authController::class,'login_auth']);
Route::post('/login',[authController::class,'login']);
Route::get('/logout-auth',[authController::class,'logout_auth']);

Route::post('/assign-roles',[userController::class,'assign_roles']);


Route::get('add-user',[userController::class,'add_user']);

Route::get('delete-user-roles/{admin_id}',[userController::class,'deleteUserRoles']);
Route::get('edit-user/{admin_id}',[userController::class,'editUser']);

Route::post('update-users/{admin_id}',[userController::class,'updateUser']);

