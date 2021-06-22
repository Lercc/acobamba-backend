<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\UserDocNumberDocType;
use App\Models\Role;

class ProcessorRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        // role                              
        $objectExternoRole =  Role::where('name','Externo')->get('id');
        $arrayIdRoles = [];
        foreach ($objectExternoRole as $el) {
            array_push($arrayIdRoles, $el->id);
        }

        return [
            // USER 
            'role_id'               => ['required', 'numeric', Rule::in($arrayIdRoles)],
            'name'                  => ['required', 'max:80', 'regex:/^[\pL\s\-]+$/u'], 
            'last_name'             => ['required', 'max:120', 'regex:/^[\pL\s\-]+$/u'],
            'doc_type'              => ['required', 'string', Rule::in(['dni', 'extranjeria'])],
            'doc_number'            => ['required', 'numeric','unique:users,doc_number',
                                        $this->doc_type == 'dni' ? 'digits:8' : ($this->doc_type == 'extranjeria' ? 'digits:11' : new UserDocNumberDocType($this->doc_type))],
            'email'                 => ['required', 'string', 'email', 'unique:users,email'],
            'password'              => ['required', 'min:8'], 
            'password_confirmation' => ['required', 'min:8', 'same:password'],
            'status'                => ['required', 'string', 'max:11', Rule::in(['activado', 'desactivado'])],

            // EMPLOYEE
        ];
    }
}
