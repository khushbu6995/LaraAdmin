<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Repositories\UserRepository;
use Illuminate\Validation\ValidationException;
use App\Services\Registration;
use App\Services\UserManagement;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

use App\Repositories\UserRepository1;

class userController extends Controller
{

    public $user_repo;
    public function __construct(UserRepository $user_repo)
    {
        $this->user_repo = $user_repo;
    }
    /**
     * redirect to login page
     * @author Khushbu Waghela
     */
    public function login()
    {
        return view('admin.auth.login');
    }

    /**
     * @param email
     * @param password
     * check whether user exists in table or not if exists user going to login
     * @author Khushbu Waghela
     */
    public function loginCheck(LoginRequest $request)
    {
        $attributes = [
                'email' => $request->email,
                'password' => $request->password,
        ];
        if (!(auth()->attempt($attributes))) {
            return redirect('/login')->with('error', "Please Enter Correct Email Password");
        }
        request()->session()->put('email', $attributes['email']);
            return redirect('/dashboard');
    }

    /**
     * redirect to register page
     */
    public function register()
    {
        return view('admin.auth.register');
    }

    /**
     * Insert record to users table with 
     * @param name
     * @param email
     * @param password
     * @author Khushbu Waghela
     */
    public function registerCheck(StoreUserRequest $request)
    {
            $insertFields = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'address' => $request->address,
                'image' => $request->file('file'),
            ];
 

        //share parameter with services/UserManagement.php class
        $reg = App::make(UserManagement::class);

        //function calling
        $qry = $reg->insertRecord($insertFields);
        return redirect('/login')->with('success', "Registration Successfully");


    }

    /**
     * redirect to forgot Password page
     * @author Khushbu Waghela
     */
    public function forgotPassword()
    {
        return view('admin.auth.forgotPassword');
    }

    /**
     * @param email
     * take email and send mail
     * @author Khushbu Waghela
     */
    public function resetPassword(Request $request)
    {
        $existing_user = $this->user_repo->email_find($request['email']);
        if (!$existing_user) {
            return redirect()->back()->withInput()->with('error', 'Email Not Exists!!');
        }
        $reg = App::make(Registration::class);
        $reg->forgotPassword($request['email']);
        return redirect()->back()->withInput()->with('success', "Email sent !!! Check Your gmail and reset Password");
    }

    /**
     * redirect to reset password page
     *  @author Khushbu Waghela
     */
    public function resetPasswordLink()
    {
        return view('admin.auth.resetpassword');
    }

    /**
     * @param email
     * @param Password
     * take email and password for reset the password and save it to database
     */
    public function passwordUpdate(ResetPasswordRequest $request)
    {
        $user = $this->user_repo->email_find($request->email);
        if (!$user) {
            return redirect()->back()->withInput()->with('error', "Please Enter Correct Email!!!!");
        } 
        $reg = App::make(Registration::class);
        $reg->resetPassword($request->email,bcrypt($request->password));
        return redirect('/login')->with('success', 'Password Reset Successfully. You can LogIn ');
    }
}
