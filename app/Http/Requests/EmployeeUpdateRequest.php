<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\UserDocNumberDocType;
use App\Rules\UserMatchEmployee;
use App\Models\User;
use App\Models\Employee;
use App\Models\Role;
use App\Models\Office;
use App\Models\Suboffice;

class EmployeeUpdateRequest extends FormRequest
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
        $objectRolesExceptAdmin = Role::where('name', '!=','admin')->get();
        $arrayRolesExceptAdmin= [];
        foreach ($objectRolesExceptAdmin as $el) {
            array_push($arrayRolesExceptAdmin, $el->id);
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

        $user = User::find($this->user_id);

        return [
            'role_id'    => ['required', 'numeric', Rule::in($arrayRolesExceptAdmin)],
            'name'       => ['required', 'max:80', 'regex:/^[\pL\s\-]+$/u'],
            'last_name'  => ['required', 'max:120', 'regex:/^[\pL\s\-]+$/u'],
            'doc_type'   => ['required', 'string', Rule::in(['dni', 'extranjeria'])],
            'doc_number' => ['required', 'numeric',
                            $user ? ($this->doc_number != $user->doc_number ? 'unique:users,doc_number' : null) : null,
                            $this->doc_type == 'dni' ? 'digits:8' : ($this->doc_type == 'extranjeria' ? 'digits:11' : new UserDocNumberDocType($this->doc_type))
                        ],
            'email'      => ['required', 'string', 'email', 
                            $user ?  ($this->email != $user->email ? 'unique:users,email' : null) : null
                        ],
            'status'     => ['required', 'string', 'max:11', Rule::in(['activado', 'desactivado'])],

            // EMPLOYEE
            //'user_id'           => ['required', 'numeric', new UserMatchEmployee($this->user_id)],
            'office_id'         => ['nullable', 'numeric', Rule::in($arrayIdOffices)],
            'suboffice_id'      => ['nullable', 'numeric', Rule::in($arrayIdSuboffices)], 
            'employee_type'     => ['required', 'string', 'max:10', Rule::in(['gerente', 'subgerente', 'trabajador', 'secretaria'])],
        ];
    }
}
