<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('welcome');
});
Route::get('/login', [UserController::class, 'login'])->middleware('guest');;
Route::post('/login_check', [UserController::class, 'loginCheck'])->middleware('guest');;
Route::get('/register', [UserController::class, 'register'])->middleware('guest');;
Route::post('/registerCheck', [UserController::class, 'registerCheck'])->middleware('guest');;
Route::get('/forgotPassword', [UserController::class, 'forgotPassword']);
Route::post('/forgotPassword', [UserController::class, 'resetPassword']);
Route::get('/resetPassword_link', [UserController::class, 'resetPasswordLink']);
Route::post('/passwordupdate', [UserController::class, 'passwordUpdate']);

Route::get('/logout',[DashboardController::class,'destroy']);

Route::get('/dashboard',[DashboardController::class,'index']);
Route::get('/usermanagement',[DashboardController::class,'userManagement']);
Route::get('/edituser/{id}',[DashboardController::class,'editUser']);
Route::post('/updateUser/{id}',[DashboardController::class,'updateUser']);

Route::get('/deleteuser/{id}',[DashboardController::class,'deleteUser']);
Route::get('/viewuser/{id}',[DashboardController::class,'viewUser']);
route::get('/adduserform',[DashboardController::class,'addUserForm']);
Route::post('/insertUser',[DashboardController::class,'insertUser']);
