<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserUpdateRequest extends FormRequest
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
            'email'      => ['required', 'string', 'email', $user ?  ($this->email != $user->email ? 'unique:users,email' : null) : null],
            'status'     => ['required', 'string', 'max:11', Rule::in(['activado', 'desactivado'])]
        ];
    }
}
