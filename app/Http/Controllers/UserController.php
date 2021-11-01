<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Validation\ValidationException;
use App\Services\Registration;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\UserRepository1;

class userController extends Controller
{

    public $user_repo;
    public function __construct(UserRepository1 $user_repo)
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
    public function loginCheck()
    {
        $attributes = request()->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ]
        );
        $email = request('email');
        if (auth()->attempt($attributes)) {

            request()->session()->put('email', $email);
            return redirect('/dashboard')->with("success", "welcome Back");
        }
        throw validationException::withMessages([
            'email' => "provided credentials could not be verified"
        ]);
        return redirect('/login')->with('error', "Please Enter Correct Email Password");
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
        $name = $request->name;
        $email = $request->email;
        $password = bcrypt($request->password);
        $phone = $request->phone;
        $address = $request->address;
        $filename = $request->file('file')->getClientOriginalName();
        $filepath = $request->file('file')->storeAs('file', 'public/admin/profile_image/');
        $file = $filepath . "/" . $filename;


        //share parameter with services/registration.php class
        $reg = App::make(Registration::class);

        //function calling
        $reg->insertRecord($name, $email, $password, $phone, $address, $file);
        return redirect('/login');
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
        $email = $request['email'];
        $existing_user = $this->user_repo->email_find($email);
        if ($existing_user) {
            $reg = App::make(Registration::class);
            $reg->forgotPassword($email);
            return redirect()->back()->withInput()->with('success', "Email sent !!! Check Your gmail and reset Password");
        } else {
            return redirect()->back()->withInput()->with('error', 'Email Not Exists!!');
        }
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
        $email = $request->email;
        $password = bcrypt($request->password);
        $user = $this->user_repo->email_find($email);
        if ($user) {
            $reg = App::make(Registration::class);
            $reg->resetPassword($email, $password);
            return redirect('/login')->with('success', 'Password Reset Successfully. You can LogIn ');
        } else {
            return redirect()->back()->withInput()->with('error', "Please Enter Correct Email!!!!");
        }
    }
}
