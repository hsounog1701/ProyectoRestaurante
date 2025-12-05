@extends('layouts.app')

@section('title', 'Reservas')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Reservas</h2>
    <a href="{{ route('reservas.create') }}" class="btn btn-success">Nueva Reserva</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Mesa</th>
                    <th>Fecha y Hora</th>
                    <th>Personas</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->id }}</td>
                    <td>{{ $reserva->cliente->nombre }}</td>
                    <td>Mesa {{ $reserva->mesa->numero }}</td>
                    <td>{{ $reserva->fecha_hora->format('d/m/Y H:i') }}</td>
                    <td>{{ $reserva->num_personas }}</td>
                    <td>
                        @if($reserva->estado == 'pendiente')
                            <span class="badge bg-warning">{{ $reserva->estado }}</span>
                        @elseif($reserva->estado == 'confirmada')
                            <span class="badge bg-success">{{ $reserva->estado }}</span>
                        @elseif($reserva->estado == 'cancelada')
                            <span class="badge bg-danger">{{ $reserva->estado }}</span>
                        @else
                            <span class="badge bg-info">{{ $reserva->estado }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('reservas.show', $reserva) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('reservas.destroy', $reserva) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No hay reservas registradas</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection