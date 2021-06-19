<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'name'    =>['required', 'max:11','regex:/^[\pL\s\-]+$/u'],
            'status'  => ['required', 'string', 'max:11', Rule::in(['activado', 'desactivado'])]
        ];
    }
}
