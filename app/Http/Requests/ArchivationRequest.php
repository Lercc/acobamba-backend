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
            $objectExpedients = Expedient::get('id');
            $arrayIdExpedients = [];
            foreach ($objectExpedients as $dev) {
                array_push($arrayIdExpedients, $dev->id);
            }
        
        
            $objectUsers = User::get('id');
            $arrayIdUsers = [];
            foreach ($objectUsers as $us) {
                array_push($arrayIdUsers, $us->id);
        
            }
                

        return [
            'expedient_id'    => ['required', 'numeric', Rule::in($arrayIdExpedients)],
            'user_id'         => ['required', 'numeric', Rule::in($arrayIdUsers)],
            'observations'    => ['required', 'string', 'max:200'],
            'status'          => ['required', 'string', 'max:11', Rule::in(['archivado'])]
        ];
    }
}
