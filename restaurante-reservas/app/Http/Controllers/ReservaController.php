<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\Mesa;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with(['cliente', 'mesa'])->get();
        return view('reservas.index', ['reservas' => $reservas]);
    }

    public function create()
    {
        $clientes = Cliente::all();
        $mesas = Mesa::all();
        return view('reservas.create', ['clientes' => $clientes, 'mesas' => $mesas]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'mesa_id' => 'required|exists:mesas,id',
            'fecha_hora' => 'required|date',
            'num_personas' => 'required|integer|min:1',
            'estado' => 'required|in:pendiente,confirmada,cancelada,completada'
        ]);

        Reserva::create($request->all());

        return redirect()->route('reservas.index')
            ->with('success', 'Reserva creada exitosamente.');
    }

    public function show(Reserva $reserva)
    {
        return view('reservas.show', ['reserva' => $reserva]);
    }

    public function edit(Reserva $reserva)
    {
        $clientes = Cliente::all();
        $mesas = Mesa::all();
        return view('reservas.edit', ['reserva' => $reserva, 'clientes' => $clientes, 'mesas' => $mesas]);
    }

    public function update(Request $request, Reserva $reserva)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'mesa_id' => 'required|exists:mesas,id',
            'fecha_hora' => 'required|date',
            'num_personas' => 'required|integer|min:1',
            'estado' => 'required|in:pendiente,confirmada,cancelada,completada'
        ]);

        $reserva->update($request->all());

        return redirect()->route('reservas.index')
            ->with('success', 'Reserva actualizada exitosamente.');
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();

        return redirect()->route('reservas.index')
            ->with('success', 'Reserva eliminada exitosamente.');
    }
}