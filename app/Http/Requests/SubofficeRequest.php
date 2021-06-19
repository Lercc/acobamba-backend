<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubofficeRequest extends FormRequest
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

    public function rules()
    {
        return [
            'office_id'    => ['required', 'numeric'],
            'name'         => ['required', 'max:200', 'regex:/^[\pL\s\-]+$/u'],
            'status'       => ['required', 'string', 'max:11']
        ];
    }
}
