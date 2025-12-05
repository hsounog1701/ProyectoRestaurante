<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;

class MesaController extends Controller
{
    public function index()
    {
        $mesas = Mesa::all();
        return view('mesas.index', ['mesas' => $mesas]);
    }

    public function create()
    {
        return view('mesas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|integer|unique:mesas,numero',
            'capacidad' => 'required|integer|min:1',
            'ubicacion' => 'required|string|max:255'
        ]);

        Mesa::create($request->all());

        return redirect()->route('mesas.index')
            ->with('success', 'Mesa creada exitosamente.');
    }

    public function show(Mesa $mesa)
    {
        return view('mesas.show', ['mesa' => $mesa]);
    }

    public function edit(Mesa $mesa)
    {
        return view('mesas.edit', ['mesa' => $mesa]);
    }

    public function update(Request $request, Mesa $mesa)
    {
        $request->validate([
            'numero' => 'required|integer|unique:mesas,numero,' . $mesa->id,
            'capacidad' => 'required|integer|min:1',
            'ubicacion' => 'required|string|max:255'
        ]);

        $mesa->update($request->all());

        return redirect()->route('mesas.index')
            ->with('success', 'Mesa actualizada exitosamente.');
    }

    public function destroy(Mesa $mesa)
    {
        $mesa->delete();

        return redirect()->route('mesas.index')
            ->with('success', 'Mesa eliminada exitosamente.');
    }
}