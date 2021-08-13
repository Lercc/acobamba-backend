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
                // 'user_id'           => $this->user_id,
                // 'user_name'         => $this->user->name,
                // 'user_last_name'    => $this->user->last_name,
                // 'user_email'        => $this->user->email,
                'processor_id'         => $this->processor_id ? $this->processor_id : null,
                'processor_name'       => $this->processor_id ? $this->processor->user->name : null,
                'processor_last_name'  => $this->processor_id ? $this->processor->user->last_name : null,
                'processor_email'      => $this->processor_id ? $this->processor->user->email : null,

                'employee_id'         => $this->employee_id ? $this->employee_id : null,
                'employee_name'       => $this->employee_id ? $this->employee->user->name : null,
                'employee_last_name'  => $this->employee_id ? $this->employee->user->last_name : null,
                'employee_email'      => $this->employee_id ? $this->employee->user->email : null,
                'code'              => $this->code,
                'document_type'     => $this->document_type,
                'header'            => $this->header,
                'subject'           => $this->subject,
                'folios'            => $this->folios,
                'file'              => $this->file,
                'status'            => $this->status,
                // 'created_at_default'        => $this->created_at,
                'createdAt'        => date('d/m/Y H:i:s a', strtotime($this->created_at))
            ],
            'relationships' => [
                // relacion de dependencia hacia arriba con la tabla user
                // el registro de la tabla expedient utiliza registros de la tabla user
                // 'user' => [
                //     'links' => [
                //         'related' => route('expedients.users.index', $this->id)
                //     ]
                // ],
                'processor' => [
                    'links' => [
                        'related' => route('expedients.processors.index', $this->id)
                    ]
                ],
                'employee' => [
                    'links' => [
                        'related' => route('expedients.employees.index', $this->id)
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
