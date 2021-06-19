<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolRequest extends FormRequest
{
  
    public function authorize()
    {
        return true;
    }

 
    public function rules()
    {
        return [
            'name'    => ['required', 'string', 'max:7', 'regex:/^[\pL\s\-]+$/u'], 
            'status'    => ['required', 'string', 'max:11'], 
        ];
    }
}
