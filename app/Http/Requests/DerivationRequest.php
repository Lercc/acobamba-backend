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
        $objectExpedient =  Expedient::get('id');
      
        $arrayIdExpedient= [];
        foreach ($objectExpedient as $dev) {
            array_push($arrayIdExpedient, $dev->id);
        }
    
        
            $objectUser =  User::get('id');
          
            $arrayIdUser= [];
            foreach ($objectUser as $ius) {
                array_push($arrayIdUser, $ius->id);
        
            }
                
            $objectEmployee =  Employee::get('id');
          
            $arrayIdEmployee= [];
            foreach ($objectEmployee as $empl) {
                array_push($arrayIdEmployee, $empl->id);
              }
  
        return [
            'expedient_id'    => ['required', 'numeric',Rule::in($arrayIdExpedient)],
            'user_id'         => ['required', 'numeric',Rule::in($arrayIdUser)],
            'employee_id'     => ['required', 'numeric',Rule::in($arrayIdEmployee)],
            'status'          => ['required', 'string', 'max:11', Rule::in(['nuevo', 'en proceso','derivado'])]
        ];
    }
     }