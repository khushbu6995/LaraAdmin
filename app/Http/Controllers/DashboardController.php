<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\App;
use App\Services\Registration;
use App\Services\UserManagement;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Events\TaskEvent;
class DashboardController extends Controller
{
    /**
     * redirect to dashboard
     * @author Khushbu Waghela
     */
    public function index()
    {
        $email=session('email');
        $user_email=User::where('email',"=",$email)->first();
        $user_image=$user_email->image;
        $users=User::latest()->take(5)->get();
        return view('admin.dashboard',compact('user_image','users'));
    }

      /**
     * redirect to User's list page
     * @author Khushbu Waghela
     */
    public function userManagement(Request $request)
    {
        $email=session('email');
        $user_email=User::where('email',"=",$email)->first();
        $user_image=$user_email->image;
        $search=$request['search'] ?? '';
        if($search != '')
        {
            $users=User::where('name',"LIKE","%$search%")->orWhere('email',"LIKE","%$search%")->simplePaginate(5);
            // return $users;
        }
        else{
            $users=User::orderBy('name')->simplePaginate(5);
        }
        
        return view('admin.user.usermanagement',compact('user_image','users'));
    }

      /**
     * redirect to Add user Form
     * @author Khushbu Waghela
     */
    public function addUserForm()
    {
        $email=session('email');
        $user_email=User::where('email',"=",$email)->first();
        $user_image=$user_email->image;
        return view('admin.user.addUserForm',compact('user_image'));
    }

      /**
     * Insert User
     * @author Khushbu Waghela
     */
    public function insertUser(StoreUserRequest $request)
    {
        $email=session('email');
        $user_email=User::where('email',"=",$email)->first();
        $user_image=$user_email->image;
        $username = $request->username;
        $email = $request->email;
        $password = Hash::make($request->password);
        $phone = $request->phone;
        $address = $request->address;
        $file=$request->file('file');
        $extention=$file->getClientOriginalName();
        $filename=time().".".$extention;
        $file->move('public/admin/profile_image/',$filename);

        //share parameter with services/UserManagement.php class
        $reg = App::makeWith(UserManagement::class, ['username' => $username, 'email' => $email, 'password' => $password, 'phone' => $phone, 'address' => $address,'image'=>$filename]);

        //function calling
       $reg->insertRecord($username, $email, $password,$phone, $address, $filename);
        return redirect('usermanagement');
       
    }

      /**
     * redirect to edit user form
     * @author Khushbu Waghela
     */
    public function editUser($id)
    {
        $email=session('email');
        $user_email=User::where('email',"=",$email)->first();
        $user_image=$user_email->image;
        $user=User::find($id);
        return view('admin.user.editUser',compact('user_image','user'));
    }

      /**
     * update user
     * @author Khushbu Waghela
     */
    public function updateUser($id,Request $req)
    {
        if($req->has('file'))
        {
            $img_path='public/admin/profile_image/';
            File::delete($img_path.$req->old_file);
            $file=$req->file('file');
            $extention=$file->getClientOriginalName();
            $filename=time().".".$extention;
            $file->move('public/admin/profile_image/',$filename);
        }
        else
        {
            $user=User::find($id);
            $filename=$user->image;
        }
        // $file=$req->file('file');
        // $extention=$file->getClientOriginalName();
        // $filename=time().".".$extention;
        // $file->move('public/admin/profile_image/',$filename);
        
        $user=User::find($id);
        $user->name=$req->username;
        $user->email=$req->email;
        $user->phone=$req->phone;
        $user->address=$req->address;
        $user->image=$filename;
        $save=$user->save();
        if($save)
        {
            return redirect('usermanagement');
        }
        else
        {
            $message="Something Went Wrong Try again!!!!";
            return redirect()->back()->withInput()->withErrors($message);
        }
        
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
        $email=session('email');
        $user_email=User::where('email',"=",$email)->first();
        $user_image=$user_email->image;
        $user=User::find($id);
        return view('admin.user.viewUser',compact('user_image','user'));
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
