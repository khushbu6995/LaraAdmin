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

class userController extends Controller
{
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
        $email=request('email');
        if (auth()->attempt($attributes)) {
            session()->regenerate();
            // session::put('email',$email);
            return redirect('/dashboard')->with("success", "welcome Back");
        }
        throw validationException::withMessages([
            'email' => "provided credentials could not be verified"
        ]);
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
        $username = $request->username;
        $email = $request->email;
        $password = bcrypt($request->password);

        //share parameter with services/registration.php class
        $reg = App::makeWith(Registration::class, ['username' => $username, 'email' => $email, 'password' => $password]);

        //function calling
        $reg->insertRecord($username, $email, $password);
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
        $email=$request['email'];
        $email=$email;
        $existing_user=User::whereEmail($email)->first();
      
        if($existing_user)
        {
            $reg = App::make(Registration::class);
            $reg->forgotPassword($email);
            $messages="Email sent !!! Check Your gmail and reset Password";
            return redirect()->back()->withInput()->withErrors($messages);
        }
        else
        {
             $messages="Email Not Exists!!";
            return redirect()->back()->withInput()->withErrors($messages);
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
        $email=$request->email;
        $password=bcrypt($request->password);
        $user=User::where('email',$email)->first();
        if($user)
        {
            $reg = App::make(Registration::class);
            $reg->resetPassword($email,$password);
            $messages="Password Reset Successfully. You can LogIn ";
            return redirect('admin.auth.login')->withErrors($messages);
        }
        else
        {
            $messages="Please Enter Correct Email!!!!";
            return redirect()->back()->withInput()->withErrors($messages);;
        }
    }
}
