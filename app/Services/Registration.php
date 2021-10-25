<?php
 namespace App\Services;

 use App\Http\Controllers\userController;
 use App\Models\User;

 class Registration
 {
    // protected $attributes=$attributes;
    public  $username;
    public $password;
    public $email;
     public function __construct($username,$email,$password)
     {
         $this->username=$username;
         $this->email=$email;
         $this->password=$password;
    }
    /**
     * @param name
     * @param email
     * @param password
     * Insert record in users table
     * @author Khushbu Waghela
     */
    public function insertRecord($username,$email,$password)
    {
        $user= new User;
        $existing_user=User::where('email',$email);
        if($existing_user)
        {
            $messages = "Email already exists";
            return redirect(view('admin.auth.register'))->withInput()->withErrors($messages);
        }
        $user->name=$username;
        $user->email=$email;
        $user->password=$password;
        $user->save();
    }
 }