<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserUpdateRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        $objectUsersAdmin = User::where('role_id','1')->get('id');
        $arrayUsersAdmin= [];
        foreach ($objectUsersAdmin as $el) {
            array_push($arrayUsersAdmin, $el->id);
        }

        $user = User::find($this->id);
        
        return [
            'id'         => ['required', 'numeric', Rule::in($arrayUsersAdmin)],
            'name'       => ['required', 'max:80', 'regex:/^[\pL\s\-]+$/u'],
            'last_name'  => ['required', 'max:120', 'regex:/^[\pL\s\-]+$/u'],
            'phone'      => ['required', 'numeric' ,'digits:9'],
            'email'      => ['required', 'string', 'email', $user ?  ($this->email != $user->email ? 'unique:users,email' : null) : null],
            'password'              => ['required', 'min:8'], 
            'password_confirmation' => ['required', 'min:8', 'same:password'],
            'status'     => ['required', 'string', 'max:11', Rule::in(['activado', 'desactivado'])]
        ];
    }
}
