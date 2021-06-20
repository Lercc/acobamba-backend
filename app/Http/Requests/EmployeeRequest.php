<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Role;
use App\Models\Office;
use App\Models\Suboffice;

class EmployeeRequest extends FormRequest
{
 
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        // role                              1 admin
        $objectAdminRole =  Role::where('name','Interno')->get('id');
        $arrayIdRoles= [];
        foreach ($objectAdminRole as $el) {
            array_push($arrayIdRoles, $el->id);
        }
        
        // office
        $objectOffices = Office::get('id');
        $arrayIdOffices = [];
        foreach($objectOffices as $el) {
            array_push($arrayIdOffices, $el->id);
        }

        // suboffice
        $objectSuboffices = Suboffice::get('id');
        $arrayIdSuboffices = [];
        foreach($objectSuboffices as $el) {
            array_push($arrayIdSuboffices, $el->id);
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
            'office_id'         => ['nullable', 'numeric', Rule::in($arrayIdOffices)],
            'suboffice_id'      => ['nullable', 'numeric', Rule::in($arrayIdSuboffices)], 
            'employee_type'     => ['required', 'string', 'max:10', Rule::in(['gerente', 'subgerente', 'trabajador', 'secretaria'])]
        ];
    }
}
