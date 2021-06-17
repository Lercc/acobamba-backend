<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
     //   return parent::toArray($request);
     return [
        'type'   => 'employee',
        'id'     => (string) $this->id,
        'attributes' => [
            'id'               => $this->id,
            'user_id'          => $this->user_id,
            'user_name'        => $this->user->name,
            'office_id'        => $this->office_id,
            'office_name'      => $this->office->name,
            'suboffice_id'     => $this->suboffice_id,
            'suboffice_name'   => $this->suboffice->name,
            'employee_type'    => $this->employee_type,
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
                   'related' => route('employees.offices.index', $this->id)
                ],
                'data'    => [
                    'type'  => 'office',
                    'id'    => (string) $this->office_id,
                ]
            ],
            'suboffices' => [
                'links' => [
                   'related' => route('employees.suboffices.index', $this->id)
                ],
                'data'    => [
                    'type'  => 'suboffice',
                    'id'    => (string) $this->suboffice_id,
                ]
            ],
        ],
        'links' => [
            'self' => route('employees.show', $this->id)
        ]
    ];
    }
}
