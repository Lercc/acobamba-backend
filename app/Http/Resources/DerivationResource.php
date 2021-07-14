<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Employee;

class DerivationResource extends JsonResource
{
    
    public function toArray($request)
    {
       // return parent::toArray($request);
        $employee = Employee::where('user_id', $this->user_id)->get();
       $employee = $employee[0];

        return [
            'type' =>  'Derivation',
            'id'   =>  (string) $this->id,
            'attributes' => [
                'id'             => $this->id , 
                'expedient_id'   => $this->expedient_id,
                'expedient_code' => $this->expedient->code, 
                'user_id'        => $this->user_id,
                'user_name'      => "{$this->user->last_name} {$this->user->name}",
                'user_area'      => $employee->office_id ? $employee->office->name : $employee->suboffice->name,
                'employee_id'    => $this->employee_id,
                'employee_name'  => $this->employee->user->name,
                'employee_area'  => $this->employee->office_id ? $this->employee->office->name : $this->employee->suboffice->name,
                'status'         => $this->status,
                'createdAt'        => date('m/d/Y H:i:s a', strtotime($this->created_at))
            ],

            'relationships' => [
                'expedient' => [
                    'links' => [
                       'related' => route('derivations.expedients.index', $this->id)
                    ],
                    'data'    => [
                        'type'  => 'expedient',
                        'id'    => (string) $this->expedient_id,
                    ]
                ],
                'user' => [
                    'links' => [
                       'related' => route('derivations.users.index', $this->id)
                    ],
                    'data'    => [
                        'type'  => 'user',
                        'id'    => (string) $this->user_id,
                    ]
                ],

                'employee' => [
                    'links' => [
                       'related' => route('derivations.employees.index', $this->id)
                    ],
                    'data'    => [
                        'type'  => 'employee',
                        'id'    => (string) $this->role_id,
                    ]
                ],
                'links' => [
                    'self' => route('derivations.show', $this->id)
                ]
            ],

        ];

    }
}
