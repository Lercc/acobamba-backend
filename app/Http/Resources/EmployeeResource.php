<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    
    public function toArray($request)
    {
     //   return parent::toArray($request);
     return [
        'type'   => 'employee',
        'id'     => (string) $this->id,
        'attributes' => [
            'id'                    => $this->id,
            'user_id'               => $this->user_id,
            'user_name'             => $this->user->name,
            'user_last_name'        => $this->user->last_name,
            'user_email'            => $this->user->email,
            'user_doc_type'         => $this->user->doc_type,
            'user_doc_number'       => $this->user->doc_number,
            'user_status'           => $this->user->status,
            'office_id'             => $this->office_id ? $this->office_id : null,
            'office_name'           => $this->office_id ? $this->office->name : null,
            'suboffice_id'          => $this->suboffice_id ? $this->suboffice_id : null,
            'suboffice_name'        => $this->suboffice_id ? $this->suboffice->name : null,
            'suboffice_office_id'   => $this->suboffice_id ? $this->suboffice->office->id : null,
            'suboffice_office_name' => $this->suboffice_id ? $this->suboffice->office->name : null,
            'employee_type'         => $this->employee_type,
        ],
        'relationships' => [
            'user' => [
                'links' => [
                   'related' => route('employees.users.index', $this->id)
                ],
                'data'    => [
                    'type'  => 'user',
                    'id'    => (string) $this->user_id,
                ]
            ],
            'office' => [
                'links' => [
                   'related' => $this->office_id ? route('employees.offices.index', $this->id) : null
                ],
                'data'    => [
                    'type'  => 'office',
                    'id'    => $this->office_id ? (string) $this->office_id : null
                ]
            ],
            'suboffices' => [
                'links' => [
                   'related' => $this->suboffice_id ? route('employees.suboffices.index', $this->id) : null
                ],
                'data'    => [
                    'type'  => 'suboffice',
                    'id'    => $this->suboffice_id ? (string) $this->suboffice_id : null
                ]
            ],
        ],
        'links' => [
            'self' => route('employees.show', $this->id)
        ]
    ];
    }
}
