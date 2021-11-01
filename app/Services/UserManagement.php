<?php
 namespace App\Services;

 use App\Models\User;
 use App\Repositories\UserRepository1;
 use Illuminate\Http\Request;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\File;
use Throwable;

class UserManagement 
 {
    public  $name;
    public $password;
    public $email;
    public $phone;
    public $address;
    public $old_image;
    public $image;
    protected $user_repo;
    // public $array_attribute;
    public function __construct(UserRepository1 $user_repo)
    {
        $this->user_repo=$user_repo;
    }    
    /**
     * @param name
     * @param email
     * @param password
     * Insert record in users table
     * @author Khushbu Waghela
     */
    public function insertRecord($name,$email,$password,$phone,$address,$image)
    {
        try{
            $existing_user=$this->user_repo->email_find($email);
            if($existing_user)
            {
                return redirect()->route('/add-user-form')->with('error',"Email already exists");
            }
            $extention = $image->getClientOriginalName();
            $filename = time() . "." . $extention;
            $image->move('public/admin/profile_image/', $filename);
            $this->user_repo->store($name,$email,$password,$phone,$address,$filename);
    }
    catch(Throwable $t)
    {
        // dd($t->getMessage(),$t->getLine(),$t->getFile());
        // throw $t;
        return view('admin.error.error');
    }
    }
    public function updateRecord($id,$name,$phone, $address, $image)
    { 
        try{
            $qry=$this->user_repo->update($id,$name,$phone,$address,$image);
            
        }
        catch(Throwable $t){
            // dd($t->getMessage(),$t->getLine(),$t->getFile());
            // throw $t;
            return view('admin.error.error');
        }
    }
    public function deleteRecord($id)
    {
        try{
             $this->user_repo->delete($id);
        }
        catch(Throwable $t)
        {
            // dd($t->getMessage(),$t->getLine(),$t->getFile());
            // throw $t;
            return view('admin.error.error');
        }
    }

    
 }