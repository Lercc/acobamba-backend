<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{

    public function toArray($request)
    {
      //  return parent::toArray($request);
        return [
            'type' =>  'Notification',
            'id'   =>  (string) $this->id,
            'attributes' => [
                'id'             => $this->id , 
                'expedient_id'   => $this->expedient_id,
                'expedient_code' => $this->expedient->code, 
                'area'           => $this->area,
                'exp_status'     => $this->exp_status,
                'status'         => $this->status,
                'created_at'      => $this->created_at->diffForHumans()
            ],

            'relationships' => [
                'expedient' => [
                    'links' => [
                       'related' => route('notifications.expedients.index', $this->id)
                    ],
                    'data'    => [
                        'type'  => 'expedient',
                        'id'    => (string) $this->expedient_id,
                    ]
                ],
           
                'links' => [
                    'self' => route('notifications.show', $this->id)
                ]
            ],

        ];

    }
}
