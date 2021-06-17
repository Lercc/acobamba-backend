<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OfficeResource extends JsonResource
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
            'type' => 'Office',
            'id'   => (string) $this->id,
            'attributes' => [
                'id' =>  $this->id, 
                'name' =>  $this->name, 
                'status' =>  $this->status
            ],
            'relationships' => [
                'suboffices' => [
                    'links' => [
                        'related' => route('offices.suboffices.index',$this->id) ,
                    ],
                ],
             
            ],

        ];
    }
}
