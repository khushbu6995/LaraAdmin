<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\App;
use App\Services\Registration;
use App\Services\UserManagement;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    /**
     * redirect to dashboard
     * @author Khushbu Waghela
     */
    public function index()
    {
        return view('admin.dashboard');
    }

      /**
     * redirect to User's list page
     * @author Khushbu Waghela
     */
    public function userManagement()
    {
        $users=User::simplePaginate(5);
        return view('admin.user.usermanagement',compact('users'));
    }

      /**
     * redirect to Add user Form
     * @author Khushbu Waghela
     */
    public function addUserForm()
    {
        return view('admin.user.addUserForm');
    }

      /**
     * Insert User
     * @author Khushbu Waghela
     */
    public function insertUser(StoreUserRequest $request)
    {
        $username = $request->username;
        $email = $request->email;
        $password = Hash::make($request->password);

        //share parameter with services/UserManagement.php class
        $reg = App::makeWith(UserManagement::class, ['username' => $username, 'email' => $email, 'password' => $password]);

        //function calling
       $reg->insertRecord($username, $email, $password);
        return redirect('usermanagement');
       
    }

      /**
     * redirect to edit user form
     * @author Khushbu Waghela
     */
    public function editUser($id)
    {
        $user=User::find($id);
        return view('admin.user.editUser',compact('user'));
    }

      /**
     * update user
     * @author Khushbu Waghela
     */
    public function updateUser($id,Request $req)
    {
        $user=User::find($id);
        $user->name=$req->username;
        $user->email=$req->email;
        $user->save();
        return redirect('usermanagement');
    }
 
      /**
     * delete User
     * @author Khushbu Waghela
     */
    public function deleteUser($id)
    {
        $user = User::find($id)->delete();
        $message="User Deleted";
        return redirect('/usermanagement')->with($message);
    }

      /**
     *  view user
     * @author Khushbu Waghela
     */
    public function viewUser($id)
    {
        $user=User::find($id);
        return view('admin.user.viewUser',compact('user'));
    }

      /**
     * logout code
     * @author Khushbu Waghela
     */
    public function destroy()
    {
        auth()->logout();
        return redirect('/login')->with('success',"LoggedOut");
    }
}
