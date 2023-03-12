<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'mothers_name' => $this->faker->firstNameFemale . ' ' . $this->faker->lastName,
            'birth_date' => $this->faker->date,
            'CPF' => $this->faker->unique()->cpf,
            'CNS' => $this->faker->randomNumber(6, $strict = false),
            'photo' => $this->faker->imageUrl,
        ];
    }
}
