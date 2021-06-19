<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
 
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'user_id'           => ['required', 'numeric'],
            'office_id'         => ['nullable', 'numeric'],
            'suboffice_id'      => ['nullable', 'numeric'], 
            'employee_type'     => ['required', 'string', 'max:10'], 
        ];
    }
}
