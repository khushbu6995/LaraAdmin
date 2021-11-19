<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
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
Route::middleware('guest')->group(function () {
    //redirect to login page
    Route::get('/login', [UserController::class, 'login'])->name('login');
    //check for user exists or not database for login
    Route::post('/login-check', [UserController::class, 'loginCheck']);
    //user register to login
    Route::get('/register', [UserController::class, 'register']);
    //check validations and register a new user
    Route::post('/register-Check', [UserController::class, 'registerCheck']);
});
//redirect to forgot password
Route::get('/forgot-Password', [UserController::class, 'forgotPassword']);
//reset password
Route::post('/forgot-Password', [UserController::class, 'resetPassword']);
//from mail to blade file link to reset password
Route::get('/reset-Password-link', [UserController::class, 'resetPasswordLink']);
// going for password update
Route::post('/password-update', [UserController::class, 'passwordUpdate']);
//logout the user
Route::get('/logout', [DashboardController::class, 'destroy']);

Route::middleware('auth')->group(function () {
Route::get('/change-Password', [UserController::class, 'changePassword']);
Route::post('/change-new-password', [UserController::class, 'NewPassword']);

    //redirect to dashboard
    Route::get('/', [DashboardController::class, 'index']);
    //redirect to dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);
    //redirect to users list
    Route::get('/user-management', [DashboardController::class, 'userManagement']);
    //redirect to edit selected user to blade file
    Route::get('/edit-user/{id}', [DashboardController::class, 'editUser']);
    //redirect to selected update user in database
    Route::post('/update-User/{id}', [DashboardController::class, 'updateUser']);
    //get id for delete user 
    Route::get('/destroy-user/{id}', [DashboardController::class, 'destroyUser']);
    //delete user 
    Route::get('/delete-user/{id}', [DashboardController::class, 'deleteUser']);
    //redirect to selected view user 
    Route::get('/view-user/{id}', [DashboardController::class, 'viewUser']);
    //add user blade form
    route::get('/add-user-form', [DashboardController::class, 'addUserForm']);
    //add user in database
    Route::post('/insert-User', [DashboardController::class, 'insertUser']);
});



route::get('/testmail',function()
{
    $data=["message"=>"this is test"];
    Mail::to('khushbuw.mobio@gmail.com')->send(new TestMail($data));
    return back();
});