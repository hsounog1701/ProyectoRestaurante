<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    public function run(): void
    {
        Cliente::create([
            'nombre' => 'Juan Pérez',
            'email' => 'juan@email.com',
            'telefono' => '666111222'
        ]);

        Cliente::create([
            'nombre' => 'María García',
            'email' => 'maria@email.com',
            'telefono' => '666333444'
        ]);

        Cliente::create([
            'nombre' => 'Carlos López',
            'email' => 'carlos@email.com',
            'telefono' => '666555666'
        ]);

        Cliente::create([
            'nombre' => 'Ana Martínez',
            'email' => 'ana@email.com',
            'telefono' => '666777888'
        ]);
    }
}