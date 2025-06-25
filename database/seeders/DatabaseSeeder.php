<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medecin;
use App\Models\Patient;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Crée 10 médecins
        Medecin::factory(10)->create()->each(function($medecin) {
            // Pour chaque médecin, créer 3 patients liés
            Patient::factory(3)->create([
                'medecin_id' => $medecin->id,
            ]);
        });
    }
}
