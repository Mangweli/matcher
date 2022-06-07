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
        $searchFields['price']              = $this->getSearchFieldValues($this->faker->numberBetween(0, 100000), $this->faker->numberBetween(150000, 1000000));
        $searchFields['area']               = $this->getSearchFieldValues($this->faker->numberBetween(50, 100), $this->faker->numberBetween(150, 999));
        $searchFields['yearOfConstruction'] = $this->getSearchFieldValues($this->faker->numberBetween(1998, 2006), $this->faker->numberBetween(2007, 2022));
        $searchFields['rooms']              = $this->getSearchFieldValues($this->faker->numberBetween(1, 3), $this->faker->numberBetween(4, 30));
        $searchFields['returnActual']       = $this->getSearchFieldValues($this->faker->randomFloat(1, 1, 10), $this->faker->randomFloat(1, 15, 100));


        return [
            'name'             => $this->faker->title(2),
            'property_type_id' => PropertyType::inRandomOrder()->first()->id,
            'search_fields'    => json_encode($searchFields),
            'return_potential' => $this->faker->randomFloat(1, 0, 100)
        ];
    }

    private function getSearchFieldValues($minRange, $maxRange) {
        $min = $this->faker->randomElement([null, $minRange]);
        $max = $this->faker->randomElement([null, $maxRange]);
        return [$min, $max];
    }
}
