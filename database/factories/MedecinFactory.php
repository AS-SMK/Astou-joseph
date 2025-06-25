<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MedecinFactory extends Factory
{
    protected $model = \App\Models\Medecin::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->name(),
            'specialite' => $this->faker->word(),
            'email' => $this->faker->unique()->safeEmail(),
            'telephone' => $this->faker->phoneNumber(),
            'photo' => null,
        ];
    }
}
