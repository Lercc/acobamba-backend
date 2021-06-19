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
            'user_id'         => ['required', 'numeric'],
            'code'            => ['required', 'string', 'max:30', 'regex:/^[\pL\s\-]+$/u'], 
            'document_type'   => ['required', 'string', 'max:200'], 
            'header'          => ['required', 'string', 'max:220'], 
            'subject'         => ['required', 'string', 'max:200', 'regex:/^[\pL\s\-]+$/u'], 
            'folios'          => ['required', 'numeric', 'digits:3'], 
            'file'            => ['required', 'string'], 
            'status'          => ['required', 'string', 'max:11'], 
        ];
    }
}
