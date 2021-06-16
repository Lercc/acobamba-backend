<?php

namespace Database\Factories;

use App\Models\Expedient;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpedientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Expedient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'        => rand(2,7),
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
