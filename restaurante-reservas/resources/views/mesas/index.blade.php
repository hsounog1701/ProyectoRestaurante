@extends('layouts.app')

@section('title', 'Mesas')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Mesas</h2>
    <a href="{{ route('mesas.create') }}" class="btn btn-success">Nueva Mesa</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Número</th>
                    <th>Capacidad</th>
                    <th>Ubicación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mesas as $mesa)
                <tr>
                    <td>{{ $mesa->id }}</td>
                    <td>{{ $mesa->numero }}</td>
                    <td>{{ $mesa->capacidad }} personas</td>
                    <td>{{ $mesa->ubicacion }}</td>
                    <td>
                        <a href="{{ route('mesas.show', $mesa) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('mesas.edit', $mesa) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('mesas.destroy', $mesa) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No hay mesas registradas</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection