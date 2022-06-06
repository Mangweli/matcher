<?php

namespace Database\Factories;

use App\Models\PropertyType;
use Illuminate\Database\Eloquent\Factories\Factory;

class SearchProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'             => $this->faker->title(2),
            'property_type_id' => PropertyType::inRandomOrder()->first()->id
        ];
    }
}
