<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubofficeResource extends JsonResource
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
            'type'   => 'suboffice',
            'id'     => (string) $this->id,
            'attributes' => [
                'id'           => $this->id,
                'office_id'    => $this->office_id,
                'office_name'  => $this->office->name ,
                'name'         =>  $this->name, 
                'status'       =>  $this->status
            ],
            'relationships' => [
                'role' => [
                    'links' => [
                       'related' => route('suboffices.offices.index', $this->id)
                    ],
                    'data'    => [
                        'type'  => 'office',
                        'id'    => (string) $this->office_id,
                    ]
                ],
            ],
            'links' => [
                'self' => route('suboffices.show', $this->id)
            ]
        ];
    }
}
