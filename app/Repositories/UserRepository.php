<?php

namespace App\Repositories;

use App\Models\User;
use phpDocumentor\Reflection\PseudoTypes\LowercaseString;

class UserRepository implements UserInterface
{
    /**
     * get all the record in assending order
     * @author Khushbu Waghela
     */
    public function all()
    {
        return User::orderBy('name')->simplePaginate(5);
    }

    /**
     * get single record by id
     * @author Khushbu Waghela
     */
    public function get($id)
    {
        return  User::find($id);
    }

    /**
     * get 5 record 
     * @author Khushbu Waghela
     */
    public function getFiveRecords()
    {
        return  User::latest()->take(5)->get();
    }

    /**
     * get a record by given name or email in search variable
     * @author Khushbu Waghela
     */
    public function searchRecord($search)
    {
        return  User::where('name', "LIKE", strtolower("%$search%"))->orWhere('email', "LIKE", strtolower("%$search%"))->simplePaginate(5);
    }

    /**
     * Insert record in database
     * @author Khushbu Waghela
     */
    public function store($insertFields)
    {
        User::create($insertFields);
    }

    /**
     * Update Record in database
     * @author Khushbu Waghela
     */
    public function update($updateFields)
    {
        $user = User::find($updateFields['id'])->update($updateFields);
    }

    /**
     * @param delete
     *delete record by id
     * @author Khushbu Waghela
     */
    public function delete($id)
    {
        User::find($id)->delete();
    }

    /**
     *verify email which is available in session or not
     * @author Khushbu Waghela
     */
    public function email_verify()
    {
        $user_email = User::where('email', "=",  session('email'))->firstOrFail();
        return $user_image = $user_email['image'];
    }

    /**
     * @param email
     * find record by email
     * @author Khushbu Waghela
     */
    public function email_find($email)
    {
        return User::where('email', $email)->first();
    }

    /**
     * @param email
     * @param password
     * check password by email
     * @author Khushbu Waghela
     */
    public function password_check($email, $password)
    {
        $user = User::where('email', $email)->first();
        return $password = $user['password'];
    }

    /**
     * @param email
     * @param password
     * update password by email
     * @author Khushbu Waghela
     */
    public function update_password($email, $newpassword)
    {
        $user = User::where('email', $email)->first();
        $user->password = $newpassword;
        $user->save();
    }
}
