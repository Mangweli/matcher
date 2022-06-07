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
        $propertyFields['area']               = $this->faker->numberBetween(100, 999);
        $propertyFields['yearOfConstruction'] = $this->faker->numberBetween(1998, 2022);
        $propertyFields['rooms']              = $this->faker->numberBetween(1, 30);
        $propertyFields['heatingType']        = $this->faker->randomElement(['gas', 'electric', 'solar']);
        $propertyFields['parking']            = $this->faker->randomElement([true,false]);
        $propertyFields['returnActual']       = $this->faker->randomFloat(1, 10, 100);
        $propertyFields['price']              = $this->faker->numberBetween(500000, 50000000);

        return [
            'name'             => $this->faker->name(),
            'address'          => $this->faker->address(),
            'property_type_id' => PropertyType::inRandomOrder()->first()->id,
            'fields'           => json_encode($propertyFields)
        ];
    }
}
