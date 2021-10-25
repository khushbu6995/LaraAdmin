<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        if (auth()->attempt($attributes)) {
            session()->regenerate();
            return redirect('admin.layout.app')->with("success", "welcome Back");
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
     */
    public function registerCheck(Request $request)
    {
        $attribute = request()->validate([
            'username' => 'required|max:255|min:3',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'min:6',
            'confirmpassword' => 'required_with:password|same:password|min:6'
        ]);
        $username = $request->username;
        $email = $request->email;
        $password = bcrypt($request->password);

        //share parameter with services/registration.php class
        $reg = App::makeWith(Registration::class, ['username' => $username, 'email' => $email, 'password' => $password]);

        //function calling
        $reg->insertRecord($username, $email, $password);
        return view('admin.auth.login');
    }
}
