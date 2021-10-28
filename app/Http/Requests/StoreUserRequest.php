<?php

namespace App\Http\Requests;

use App\Http\Controllers\DashboardController;
use App\Providers\UserManagement;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|max:255|min:3',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'min:6',
            'confirmpassword' => 'required_with:password|same:password|min:6',
            'phone' => 'required|digits:10',
            'address'=>'required|max:255',
            'file'=>'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
