<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Models\Employee;
use App\Models\Expedient;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DerivationRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    

   
    public function rules()
     {
        $objectExpedients =  Expedient::get('id');
        $arrayIdExpedients = [];
        foreach ($objectExpedients as $dev) {
            array_push($arrayIdExpedients, $dev->id);
        }
    
        
            $objectUsers =  User::get('id');
            $arrayIdUsers = [];
            foreach ($objectUsers as $ius) {
                array_push($arrayIdUsers, $ius->id);
        
            }
                
            $objectEmployees =  Employee::get('id');
            $arrayIdEmployees = [];
            foreach ($objectEmployees as $empl) {
                array_push($arrayIdEmployees, $empl->id);
              }
  
        return [
            'expedient_id'    => ['required', 'numeric', Rule::in($arrayIdExpedients)],
            'user_id'         => ['required', 'numeric', Rule::in($arrayIdUsers)],
            'employee_id'     => ['required', 'numeric', Rule::in($arrayIdEmployees)],
            'status'          => ['required', 'string', 'max:11', Rule::in(['nuevo', 'en proceso','derivado'])]
        ];
    }
     }