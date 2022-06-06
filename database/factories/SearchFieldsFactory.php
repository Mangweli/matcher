<?php

namespace Database\Factories;

use App\Models\SearchProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

class SearchFieldsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'minPrice'              => $this->faker->numberBetween(0, 100000),
            'maxPrice'              => $this->faker->numberBetween(150000, 1000000),
            'minArea'               => $this->faker->numberBetween(50, 100),
            'maxArea'               => $this->faker->numberBetween(150, 999),
            'minYearOfConstruction' => $this->faker->numberBetween(1998, 2006),
            'maxYearOfConstruction' => $this->faker->numberBetween(2007, 2022),
            'minRooms'              => $this->faker->numberBetween(1, 3),
            'maxRooms'              => $this->faker->numberBetween(3, 30),
            'minReturnActual'       => $this->faker->numberBetween(0, 10),
            'maxReturnActual'       => $this->faker->numberBetween(15, 100),
            'search_profile_id'     => SearchProfile::inRandomOrder()->first()->id
        ];
    }
}
