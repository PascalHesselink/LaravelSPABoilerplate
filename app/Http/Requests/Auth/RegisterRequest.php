<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
                'name'     => 'required|string|unique:users|min:3|max:16|regex:/(^[A-Za-z0-9\_ ]+$)+/',
                'email'    => 'required|email|unique:users',
                'password' => 'required|confirmed|min:6',
        ];
    }
}
