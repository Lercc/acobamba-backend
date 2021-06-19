<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DerivationRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'expedient_id'    => ['required', 'numeric'],
            'user_id'         => ['required', 'numeric'],
            'employee_id'     => ['required', 'numeric'],
            'status'          => ['required', 'string', 'max:10'], 
        ];
    }
}
