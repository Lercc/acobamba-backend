<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArchivationRequest extends FormRequest
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
            'observations'    => ['required', 'string', 'max:200'],
            'status'          => ['required', 'string', 'max:10']
        ];
    }
}
