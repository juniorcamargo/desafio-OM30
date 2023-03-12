<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'CEP' => $this->faker->postcode,
            'street' => $this->faker->streetName,
            'number' => $this->faker->buildingNumber,
            'neighborhood' => $this->faker->secondaryAddress,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'complement' => $this->faker->secondaryAddress,
        ];
    }
}
