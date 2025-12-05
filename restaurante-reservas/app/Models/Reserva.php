<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'mesa_id',
        'fecha_hora',
        'num_personas',
        'estado'
    ];

    protected $casts = [
        'fecha_hora' => 'datetime'
    ];

    // Relación: Una reserva pertenece a un cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Relación: Una reserva pertenece a una mesa
    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }
}