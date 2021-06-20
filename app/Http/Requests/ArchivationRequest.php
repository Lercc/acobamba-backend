<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Models\Expedient;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ArchivationRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

  
    public function rules()
    {
            $objectExpedient =  Expedient::get('id');
        
            $arrayIdExpedient= [];
            foreach ($objectExpedient as $dev) {
                array_push($arrayIdExpedient, $dev->id);
            }
        
        
            $objectUser =  User::get('id');
          
            $arrayIdUser= [];
            foreach ($objectUser as $us) {
                array_push($arrayIdUser, $us->id);
        
            }
                

        return [
            'expedient_id'    => ['required', 'numeric',Rule::in($arrayIdExpedient)],
            'user_id'         => ['required', 'numeric',Rule::in($arrayIdUser)],
            'observations'    => ['required', 'string', 'max:200'],
            'status'          => ['required', 'string', 'max:11', Rule::in(['archivado'])]
        ];
    }
}
