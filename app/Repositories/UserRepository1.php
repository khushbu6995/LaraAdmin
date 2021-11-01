<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository1 implements UserInterface
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
        return  User::where('name', "LIKE", "%$search%")->orWhere('email', "LIKE", "%$search%")->simplePaginate(5);
    }

    /**
     * Insert record in database
     * @author Khushbu Waghela
     */
    public function store($name, $email, $password, $phone, $address, $image)
    {
        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->phone = $phone;
        $user->address = $address;
        $user->image = $image;
        $user->save();
    }

    /**
     * Update Record in database
     * @author Khushbu Waghela
     */
    public function update($id, $name, $phone, $address, $image)
    {
        $user = User::find($id);
        $user->name = $name;
        $user->phone = $phone;
        $user->address = $address;
        $user->image = $image;
        $user->save();
    }

    /**
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
        $email = session('email');
        $user_email = User::where('email', "=", $email)->firstOrFail();
        return $user_image = $user_email['image'];
    }

    /**
     * find record by email
     * @author Khushbu Waghela
     */
    public function email_find($email)
    {
        return User::where('email', $email)->first();
    }
}
