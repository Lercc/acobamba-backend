<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProcessorResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'type'   => 'processor',
            'id'     => (string) $this->id,
            'attributes' => [
                'id'               => $this->id,
                'user_id'          => $this->user_id,
                'user_name'        => $this->user->name,
                'user_last_name'   => $this->user->last_name,
                'user_email'       => $this->user->email,
                'user_doc_type'       => $this->user->doc_type,
                'user_doc_number'       => $this->user->doc_number,
                'user_status'       => $this->user->status,
                'dni_represent'     => $this->dni_represent
            ],
            'relationships' => [
                'user' => [
                    'links' => [
                       'related' => route('processors.users.index', $this->id)
                    ],
                    'data'    => [
                        'type'  => 'user',
                        'id'    => (string) $this->user_id,
                    ]
                ],
        
            ],
            'links' => [
                'self' => route('processors.show', $this->id)
            ]
        ];
        }
    }

