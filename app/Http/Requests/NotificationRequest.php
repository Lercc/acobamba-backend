<?php

namespace App\Http\Requests;

use App\Models\Expedient;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class NotificationRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $objectExpedient =  Expedient::get('id');
      
        $arrayIdExpedient= [];
        foreach ($objectExpedient as $exp) {
            array_push($arrayIdExpedient, $exp->id);
        }
        
        return [       
            'expedient_id'    => ['required', 'numeric',Rule::in($arrayIdExpedient)],
            'exp_status'      => ['required', 'string', 'max:11', Rule::in(['archivado','derivado'])],
            'status'          => ['required', 'string', 'max:8', Rule::in(['visto', 'no visto'])]
        ];
    }
}
