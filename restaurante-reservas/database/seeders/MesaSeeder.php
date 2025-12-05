<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mesa;

class MesaSeeder extends Seeder
{
    public function run(): void
    {
        Mesa::create([
            'numero' => 1,
            'capacidad' => 2,
            'ubicacion' => 'Terraza'
        ]);

        Mesa::create([
            'numero' => 2,
            'capacidad' => 4,
            'ubicacion' => 'Terraza'
        ]);

        Mesa::create([
            'numero' => 3,
            'capacidad' => 4,
            'ubicacion' => 'Interior'
        ]);

        Mesa::create([
            'numero' => 4,
            'capacidad' => 6,
            'ubicacion' => 'Interior'
        ]);

        Mesa::create([
            'numero' => 5,
            'capacidad' => 8,
            'ubicacion' => 'Salón Privado'
        ]);
    }
}