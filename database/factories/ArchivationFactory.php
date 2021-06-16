<?php

namespace Database\Factories;

use App\Models\Archivation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArchivationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Archivation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'expedient_id'   => rand(1,40),
            'user_id'        => rand(1,50),
            'observations'    => $this->faker->text($maxNbChars = 200) ,
            'status'         => 'archivado'

        ];
    }
}
