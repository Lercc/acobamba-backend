<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
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
            'type'  => 'role',
            'id'    => (string) $this->id,
            'attributes'    => [
                'id'      => $this->id,
                'name'      => $this->name,
                'status'      => $this->status
            ],
            'relations' => [
                'users' => [
                    'links' => [
                        'related' => route('roles.users.index', $this->id)
                    ]
                ],
            ]
        ];
    }
}
