<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFieldFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'area'               => $this->faker->numberBetween(100, 999),
            'yearOfConstruction' => $this->faker->numberBetween(1998, 2022),
            'rooms'              => $this->faker->numberBetween(1, 30),
            "heatingType"        => $this->faker->randomElement(['gas', 'electric', 'solar']),
            "parking"            => $this->faker->randomElement([true, false]),
            "returnActual"       => $this->faker->randomFloat(),
            "price"              => $this->faker->numberBetween(500000, 50000000),
            'property_id'        => Property::inRandomOrder()->first()->id
        ];
    }
}
