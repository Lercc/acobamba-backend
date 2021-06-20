<?php

namespace Database\Factories;

use App\Models\Expedient;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpedientFactory extends Factory
{
   
    public function definition()
    {
        return [
            // 'user_id'        => rand(2,7),
            'processor_id'   => rand(1,2),
            'employee_id'    => rand(1,4),
            'code'           => $this->faker->unique()->postcode(),
            'document_type'  => $this->faker->randomElement(['solicitud','carta','dictamen','directiva','expediente','informe','memorandum', 'oficio']),
            'header'         => $this->faker->name(),
            'subject'        => $this->faker->city(),
            'folios'         => rand(1,20),
            'file'           => 'files/document-test.pdf',
            'status'         => $this->faker->randomElement(['activado','desactivado']),
       
        ];
    }
}
