<?php
 namespace App\Services;

 use App\Models\User;
 use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Mail;

class Registration 
 {
    public  $username;
    public $password;
    public $email;
    public $phone;
    public $address;
    public $image;
        
    /**
     * @param name
     * @param email
     * @param password
     * Insert record in users table
     * @author Khushbu Waghela
     */
    public function insertRecord($username,$email,$password,$phone,$address,$image)
    {
        $user= new User;
        $existing_user=User::whereEmail($email);
        if($existing_user)
        {
            $messages = "Email already exists";
            // return redirect(view('admin.auth.register'))->withInput()->withErrors($messages);
            // return redirect(view('admin.auth.register'))->withInput()->withErrors($messages);
        }
        $user->name=$username;
        $user->email=$email;
        $user->password=$password;
        $user->phone=$phone;
        $user->address=$address;
        $user->image=$image;
        $user->save();

    }

    /**
     * send mail to reset Password
     * @author Khushbu Waghela
     */
    public function forgotPassword($email)
    {
        $data=['Khusbu'];
        $user=$email;
        Mail::send('admin.auth.mail',$data,function($messages) use ($user)
        {
            $messages->to($user);
            $messages->subject('Password Reset');
        });
    }

    /**
     * Update Password in database
     * @author Khushbu Waghela
     */
    public function resetPassword($email,$password)
    {
        $user=User::where('email',$email)->first();
        $user->password=$password;
        $user->save();
    }
 }