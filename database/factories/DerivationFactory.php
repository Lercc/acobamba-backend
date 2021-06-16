<?php

namespace Database\Factories;

use App\Models\Derivation;
use Illuminate\Database\Eloquent\Factories\Factory;

class DerivationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Derivation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'expedient_id'        => rand(1,40),
            'user_id'        => rand(1,50),
            'employee_id'        => rand(1,45),
            'status'         => $this->faker->randomElement(['nuevo','en-proceso','derivado']),      
        ];
    }
}
