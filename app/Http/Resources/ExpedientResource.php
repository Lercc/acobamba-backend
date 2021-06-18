<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExpedientResource extends JsonResource
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
            'type'      => 'expedient',
            'id'        => (string) $this->id,
            'attributes'    => [
                'id'                => $this->id,
                'user_id'           => $this->user_id,
                'user_name'         => $this->user->name,
                'user_last_name'    => $this->user->last_name,
                'user_email'        => $this->user->email,
                'code'              => $this->code,
                'document_type'     => $this->document_type,
                'header'            => $this->header,
                'subject'           => $this->subject,
                'folios'            => $this->folios,
                'file'              => $this->file,
                'status'            => $this->status
            ],
            'relationships' => [
                // relacion de dependencia hacia arriba con la tabla user
                // el registro de la tabla expedient utiliza registros de la tabla user
                'user' => [
                    'links' => [
                        'related' => route('expedients.users.index', $this->id)
                    ]
                ],
                // relacion de dependencia hacia abajo con la tabla derivations
                // el registro de la tabla expediente es utilizada en la tabla derivations, archivation ,notifications
                'derivations' => [
                    'links' => [
                        'related' => route('expedients.derivations.index' ,$this->id)
                    ],
                ],
                'archivation' => [
                    'links' => [
                        'related' => route('expedients.archivations.index' ,$this->id)
                    ],
                ],
                'notifications' => [
                    'links' => [
                        'related' => route('expedients.notifications.index' ,$this->id)
                    ],
                ],
            ],
            'links' => [
                'self' => route('expedients.show', $this->id)
            ]
        ];
    }
}
