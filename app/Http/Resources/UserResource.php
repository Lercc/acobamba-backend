<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'type'   => 'user',
            'id'     => (string) $this->id,
            'attributes' => [
                'id'           => $this->id,
                'role_id'      => $this->role_id,
                'role_name'    => $this->role->name,
                'name'         => $this->name,
                'last_name'    => $this->last_name,
                'doc_type'     => $this->doc_type,
                'doc_number'   => $this->doc_number,
                'email'        => $this->email,
                'status'       => $this->status,
            ],
            'relationships' => [
                'role' => [
                    'links' => [
                       'related' => route('users.roles.index', $this->id)
                    ],
                    'data'    => [
                        'type'  => 'role',
                        'id'    => (string) $this->role_id,
                    ]
                ],
            ],
            'links' => [
                'self' => route('users.show', $this->id)
            ]
        ];
    }
}
