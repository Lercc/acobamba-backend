<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\UserDocNumberDocType;
use App\Rules\UserMatchProcessor;
use App\Models\Role;
use App\Models\User;

class ProcessorUpdateRequest extends FormRequest
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

        $user = User::find($this->user_id);

        return [
            'role_id'    => ['required', 'numeric', Rule::in($arrayRolesExceptAdmin)],
            'name'       => ['required', 'max:80', 'regex:/^[\pL\s\-]+$/u'],
            'last_name'  => ['required', 'max:120', 'regex:/^[\pL\s\-]+$/u'],
            'doc_type'   => ['required', 'string', Rule::in(['dni', 'extranjeria','ruc'])],
            'doc_number' => ['required', 'numeric',
                            $user ? ($this->doc_number != $user->doc_number ? 'unique:users,doc_number' : null) : null,
                            $this->doc_type == 'dni' ? 'digits:8' : ($this->doc_type == 'extranjeria' ? 'digits:11' : new UserDocNumberDocType($this->doc_type))
                        ],
            'email'      => ['required', 'string', 'email', 
                            $user ? ($this->email != $user->email ? 'unique:users,email' : null) : null
                        ],
            'status'     => ['required', 'string', 'max:11', Rule::in(['activado', 'desactivado'])],

            // PROCESSOR
            'user_id'           => ['required', 'numeric', new UserMatchProcessor($this->id)],
            'dni_represent'         => ['nullable', 'numeric','digits:8'], 
        ];
    }
}
