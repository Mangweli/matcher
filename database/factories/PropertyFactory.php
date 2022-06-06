<?php

namespace Database\Factories;

use App\Models\PropertyType;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'             => $this->faker->text(5),
            'address'          => $this->faker->address(),
            'property_type_id' => PropertyType::inRandomOrder()->first()->id
        ];
    }
}
