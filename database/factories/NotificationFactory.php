<?php

namespace Database\Factories;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Notification::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'expedient_id'       => rand(1,60),
            'area'               => $this->faker->randomElement(['RRHH','Administracion']),
            'exp_status'         => $this->faker->randomElement(['derivado','archivado']),
            'status'             => $this->faker->randomElement(['visto','no visto'])
        ];
    }
}
