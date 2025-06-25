<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Medecin;

class PatientFactory extends Factory
{
    protected $model = \App\Models\Patient::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->name(),
            'date_naissance' => $this->faker->date('Y-m-d', '2005-01-01'),
            // 'medecin_id' => // On ne le met pas ici car on l'associera explicitement via la relation
        ];
    }
}
