<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArchivationResource extends JsonResource
{
    
    public function toArray($request)
    {
       // return parent::toArray($request);
       return [
        'type' =>  'Archivation',
        'id'   =>  (string) $this->id,
        'attributes' => [
            'id'             => $this->id , 
            'expedient_id'   => $this->expedient_id,
            'expedient_code' => $this->expedient->code, 
            'user_id'        => $this->user_id,
            'user_name'      => $this->user->name,
            'observations'   => $this->observations,
            'status'   => $this->status,
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
    

