<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DerivationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
        return [
            'type' =>  'Derivation',
            'id'   =>  (string) $this->id,
            'attributes' => [
                'id'             => $this->id , 
                'expedient_id'   => $this->expedient_id,
                'expedient_code' => $this->expedient->code, 
                'user_id'        => $this->user_id,
                'user_name'      => $this->user->name,
                'employee_id'    => $this->employee_id,
                'employee_name'  => $this->employee->user->name,
                'status'   => $this->status,
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
