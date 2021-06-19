<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'role_id'         => ['required', 'numeric'],
            'name'            => ['required', 'string', 'max:80', 'regex:/^[\pL\s\-]+$/u'], 
            'last_name'       => ['required', 'string', 'max:120', 'regex:/^[\pL\s\-]+$/u'], 
            'doc_type'        => ['required', 'string'], 
            'doc_number'      => ['required', 'numeric', 'digits:11','unique:users,doc_number'], 
            'email'           => ['required', 'string', 'email', 'unique:users,email'], 
            'password'        => ['required', 'string', 'password', 'unique:users,password'], 
            'status'          => ['required', 'string', 'max:11'], 
        ];
    }
}
