<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

use Throwable;

class Registration
{
    public $name;
    public $password;
    public $email;
    public $phone;
    public $address;
    public $image;
    protected $user_repo;

    public function __construct(UserRepository $user_repo)
    {
        $this->user_repo = $user_repo;
    }

    /**
     * send mail to reset Password
     * @author Khushbu Waghela
     */
    public function forgotPassword($email)
    {
        try {
            $data = ['Khusbu'];
            $user = $email;
            Mail::send('admin.auth.mail', $data, function ($messages) use ($user) {
                $messages->to($user);
                $messages->subject('Password Reset');
            });
        } catch (Throwable $t) {
            return view('admin.error.error');
        }
    }

    /**
     * Update Password in database
     * @author Khushbu Waghela
     */
    public function resetPassword($email, $password)
    {
        try {
            $user = $this->user_repo->email_find($email);
            $user->password = $password;
            $user->save();
        } catch (Throwable $t) {
            return view('admin.error.error');
        }
    }

    public function PasswordCheck($email,$newpassword)
    {
        $user=$this->user_repo->update_password($email,$newpassword);      
    }
}
