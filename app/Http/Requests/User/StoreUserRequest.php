<?php

namespace App\Http\Requests\User;

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
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'username' => ['required', 'min:6', 'max:50', 'unique:users,username'],
            'password' => ['required', 'min:8', 'max:30'],
            'password_confirmation' => ['required', 'min:8', 'max:30', 'same:password'],
            'is_admin' => ['required'],
            'is_active' => ['required'],
        ];
    }
}
