<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
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
    public $insertFields;
    public $updateFields;
    public function __construct(UserRepository $user_repo)
    {
        $this->user_repo = $user_repo;
    }

    /**
     * @param name 
     * @param email
     * @param password
     * @param phone
     * @param address
     * @param image
     * Insert record in users table
     * @author Khushbu Waghela
     */
    public function insertRecord($insertFields)
    {
        try {
            $existing_user = $this->user_repo->email_find($insertFields['email']);
            if ($existing_user) {
                return redirect()->back()->with('error', "Email already exists");
            }
            $path = 'public/admin/profile_image/';
            $extention = $insertFields['image']->getClientOriginalName();
            $filename = time() . "." . $extention;
            $insertFields['image']->move($path, $filename);
            $insertFields['image']=$filename;
            $this->user_repo->store($insertFields);
        } catch (Throwable $t) {
            return view('admin.error.error');
        }
    }

    /**
     * @param name
     * @param phone
     * @param address
     * @param image
     * Update record in users table
     * @author Khushbu Waghela
     */
    public function updateRecord($updateFields)
    {
        try {
            $qry = $this->user_repo->update($updateFields);
        } catch (Throwable $t) {
            return view('admin.error.error');
        }
    }

    /**
     * @param id
     * delete record from users table
     */
    public function deleteRecord($id)
    {
        try {
            $qry = $this->user_repo->get($id);
            $image=$qry->image;
            $img_path = 'public/admin/profile_image/';
            File::delete($img_path . $image);
            $this->user_repo->delete($id);


        } catch (Throwable $t) {
            return view('admin.error.error');
        }
    }
}
