<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class OfficeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'      => ['required', 'max:200', 'regex:/^[\pL\s\-]+$/u'],
            'status'  => ['required', 'string', 'max:11', Rule::in(['activado', 'desactivado'])]
        ];
    }
}
