<?php
 namespace App\Services;

 use App\Models\User;
 use Illuminate\Http\Request;
use App\Http\Controllers\DashboardController;
class UserManagement 
 {
    // protected $attributes=$attributes;
    public  $username;
    public $password;
    public $email;
    public $phone;
    public $address;
    public $image;
    //  public function __construct($username,$email,$password)
    //  {
    //      $this->username=$username;
    //      $this->email=$email;
    //      $this->password=$password;
    // }
    
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
        $existing_user=User::where('email',$email);
        if($existing_user)
        {
            $messages = "Email already exists";
            // return redirect(view('admin.auth.register'))->withInput()->withErrors($messages);
            // return redirect(view('admin.user.addUserForm'))->withInput()->withErrors($messages);
        }
        $user->name=$username;
        $user->email=$email;
        $user->password=$password;
        $user->phone=$phone;
        $user->address=$address;
        $user->image=$image;
        $user->save();

    }

    
 }