<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Employee;

class ArchivationResource extends JsonResource
{
    public function toArray($request)
    {
       // return parent::toArray($request);
        $employee = Employee::where('user_id', $this->user_id)->get();
        $employee = $employee[0];

       return [
        'type' =>  'Archivation',
        'id'   =>  (string) $this->id,
        'attributes' => [
            'id'             => $this->id , 
            'expedient_id'   => $this->expedient_id,
            'expedient_code' => $this->expedient->code, 
            'user_id'        => $this->user_id,
            'user_name'      => "{$this->user->last_name} {$this->user->name}",
            'user_area'      => $employee->office_id ? $employee->office->name : $employee->suboffice->name,
            'observations'   => $this->observations,
            'status'         => $this->status,
            'createdAt'     => date('m/d/Y H:i:s a', strtotime($this->created_at))
        ],

        'relationships' => [
            'expedient' => [
                'links' => [
                   'related' => route('archivations.expedients.index', $this->id)
                ],
                'data'    => [
                    'type'  => 'expedient',
                    'id'    => (string) $this->expedient_id,
                ]
            ],
            'user' => [
                'links' => [
                   'related' => route('archivations.users.index', $this->id)
                ],
                'data'    => [
                    'type'  => 'user',
                    'id'    => (string) $this->user_id,
                ]
            ],

 
            'links' => [
                'self' => route('archivations.show', $this->id)
            ]
        ],

    ];

}
}
    

