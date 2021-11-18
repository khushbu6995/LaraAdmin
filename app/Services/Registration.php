<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Mail;
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
     * @param name
     * @param email
     * @param password
     * Insert record in users table
     * @author Khushbu Waghela
     */
    public function insertRecord($name, $email, $password, $phone, $address, $image)
    {
        try {
            $existing_user = $this->user_repo->email_find($email);
            ($existing_user) ? $messages = "Email already exists" :
            $this->user_repo->store($name, $email, $password, $phone, $address, $image);
        } catch (Throwable $t) {
            return view('admin.error.error');
        }
    }

    /**
     * send mail to reset Password
     * @author Khushbu Waghela
     */
    public function forgotPassword($email)
    {
        try {
            $data = ['Khushbu'];
            Mail::send('admin.auth.mail', $data, function ($messages) use ($email) {
                $messages->to($email);
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
}
