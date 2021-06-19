<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationRequest extends FormRequest
{

    public function authorize()
    {
        return false;
    }

    public function rules()
    {
        return [       
            'expedient_id'    => ['required', 'numeric'],
            'exp_status'      => ['required', 'string', 'max:9'],
            'status'          => ['required', 'string', 'max:8']
        ];
    }
}
