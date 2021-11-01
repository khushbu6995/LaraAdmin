<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Repositories\UserRepository1;
use Illuminate\Support\Facades\App;
use App\Services\Registration;
use App\Services\UserManagement;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Events\TaskEvent;

class DashboardController extends Controller
{
    public $user_repo;
    public function __construct(UserRepository1 $user_repo)
    {
        $this->user_repo = $user_repo;
    }
    /**
     * redirect to dashboard
     * @author Khushbu Waghela
     */
    public function index()
    {
        $email = session('email');
        $user_email = $this->user_repo->email_find($email);
        $user_image = $user_email->image;
        $users = $this->user_repo->getFiveRecords();
        return view('admin.dashboard', compact('user_image', 'users'));
    }

    /**
     * redirect to User's list page
     * @author Khushbu Waghela
     */
    public function userManagement(Request $request)
    {
        $email = session('email');
        $user_email = $this->user_repo->email_find($email);
        $user_image = $user_email->image;
        $search = $request['search'] ?? '';
        if ($search != '') {
            $users = $this->user_repo->searchRecord($search);
        } else {
            $users = $this->user_repo->all();
        }
        return view('admin.user.usermanagement', compact('user_image', 'users'));
    }

    /**
     * redirect to Add user Form
     * @author Khushbu Waghela
     */
    public function addUserForm()
    {
        $email = session('email');
        $user_email = $this->user_repo->email_find($email);;
        $user_image = $user_email->image;
        return view('admin.user.addUserForm', compact('user_image'));
    }

    /**
     * Insert User
     * @author Khushbu Waghela
     */
    public function insertUser(StoreUserRequest $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = Hash::make($request->password);
        $phone = $request->phone;
        $address = $request->address;
        $file = $request->file('file');

        //share parameter with services/UserManagement.php class
        $reg = App::make(UserManagement::class);

        //function calling
        $qry = $reg->insertRecord($name, $email, $password, $phone, $address, $file);
        return redirect('/user-management')->with('success', "Record Inserted Successfully");
    }

    /**
     * redirect to edit user form
     * @author Khushbu Waghela
     */
    public function editUser($id)
    {
        // $user_img=$this->user_repo->email_verify();
        $email = session('email');
        $user_email = $this->user_repo->email_find($email);;
        $user_image = $user_email->image;
        $user = $this->user_repo->get($id);
        return view('admin.user.editUser', compact('user_image', 'user'));
    }

    /**
     * update user
     * @author Khushbu Waghela
     */
    public function updateUser($id, Request $req)
    {
        $name = $req->name;
        $phone = $req->phone;
        $address = $req->address;
        $old_file = $req->old_file;
        if ($req->has('file')) {
            $img_path = 'public/admin/profile_image/';
            File::delete($img_path . $req->old_file);
            $file = $req->file('file');
            $extention = $file->getClientOriginalName();
            $filename = time() . "." . $extention;
            $file->move('public/admin/profile_image/', $filename);
        } else {
            $user = $this->user_repo->get($id);
            $filename = $user->image;
        }
        //share parameter with services/UserManagement.php class
        $reg = App::make(UserManagement::class);

        //function calling
        $qry = $reg->updateRecord($id, $name, $phone, $address, $filename);

        return redirect('/user-management')->with('success', "Record Updated Successfully");
    }

    /**
     * delete User
     * @author Khushbu Waghela
     */
    public function deleteUser($id)
    {
        $qry = $this->user_repo->delete($id);

        return redirect('/user-management')->with('success', "User Deleted Successfully");
    }

    /**
     *  view user
     * @author Khushbu Waghela
     */
    public function viewUser($id)
    {
        $email = session('email');
        $user_email = $this->user_repo->email_find($email);;
        $user_image = $user_email->image;
        $user = $this->user_repo->get($id);
        return view('admin.user.viewUser', compact('user_image', 'user'));
    }

    /**
     * logout code
     * @author Khushbu Waghela
     */
    public function destroy()
    {
        auth()->logout();
        return redirect('/login');
    }
}
