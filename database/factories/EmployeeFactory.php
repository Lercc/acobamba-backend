<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
         
            'user_id'        => rand(1,50),
            'office_id'        => rand(1,18),
            'suboffice_id'        => rand(1,11),
            'employee_type'  => $this->faker->randomElement(['gerente','subgerente','trabajador','secretaria']),
           
        ];
    }
}
