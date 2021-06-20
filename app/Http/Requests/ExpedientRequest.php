<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpedientRequest extends FormRequest
{
  
    public function authorize()
    {
        return true;
    }


    public function rules()
    {


        return [
            // 'user_id'         => ['required', 'numeric'],
            // 'processor_id'    => ['nullable', 'numeric', Rule::in($arrayIdProcessor)],
            // 'employee_id'     => ['nullable', 'numeric', Rule::in($arrayIdEmployee)],
            'code'            => ['required', 'alpha_num','max:30'],
            'document_type'   => ['required', 'string', 'max:200'],
            'header'          => ['required', 'string', 'max:220'],
            'subject'         => ['required', 'string', 'max:200'],
            'folios'          => ['required', 'numeric', 'digits:3'],
            'file'            => ['required', 'string'],
            'status'          => ['required', 'string', 'max:11', Rule::in(['activado', 'desactivado'])],
        ];
    }
}
