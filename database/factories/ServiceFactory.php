<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\Machine;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'machine_id' => Machine::factory()->create(), 
            'failure' => $this->faker->sentence(1),
            'date' => now(),
            'price' => $this->faker->randomNumber(8,false),
            'failure_description' => $this->faker->sentence(2),
            'service_description' => $this->faker->sentence(4)
        ];

    }
}
