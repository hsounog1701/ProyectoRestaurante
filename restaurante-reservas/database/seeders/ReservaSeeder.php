<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reserva;

class ReservaSeeder extends Seeder
{
    public function run(): void
    {
        Reserva::create([
            'cliente_id' => 1,
            'mesa_id' => 1,
            'fecha_hora' => '2024-12-10 20:00:00',
            'num_personas' => 2,
            'estado' => 'confirmada'
        ]);

        Reserva::create([
            'cliente_id' => 2,
            'mesa_id' => 3,
            'fecha_hora' => '2024-12-10 21:00:00',
            'num_personas' => 4,
            'estado' => 'pendiente'
        ]);

        Reserva::create([
            'cliente_id' => 3,
            'mesa_id' => 4,
            'fecha_hora' => '2024-12-11 19:30:00',
            'num_personas' => 6,
            'estado' => 'confirmada'
        ]);

        Reserva::create([
            'cliente_id' => 4,
            'mesa_id' => 2,
            'fecha_hora' => '2024-12-11 22:00:00',
            'num_personas' => 4,
            'estado' => 'completada'
        ]);
    }
}