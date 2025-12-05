@extends('layouts.app')

@section('title', 'Ver Reserva')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h2>Detalles de la Reserva</h2>
        
        <div class="card mt-4">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>ID:</th>
                        <td>{{ $reserva->id }}</td>
                    </tr>
                    <tr>
                        <th>Cliente:</th>
                        <td>
                            <a href="{{ route('clientes.show', $reserva->cliente) }}">
                                {{ $reserva->cliente->nombre }}
                            </a>
                            <br>
                            <small class="text-muted">{{ $reserva->cliente->email }} - {{ $reserva->cliente->telefono }}</small>
                        </td>
                    </tr>
                    <tr>
                        <th>Mesa:</th>
                        <td>
                            <a href="{{ route('mesas.show', $reserva->mesa) }}">
                                Mesa {{ $reserva->mesa->numero }}
                            </a>
                            <br>
                            <small class="text-muted">Capacidad: {{ $reserva->mesa->capacidad }} - {{ $reserva->mesa->ubicacion }}</small>
                        </td>
                    </tr>
                    <tr>
                        <th>Fecha y Hora:</th>
                        <td>{{ $reserva->fecha_hora->format('d/m/Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Número de Personas:</th>
                        <td>{{ $reserva->num_personas }}</td>
                    </tr>
                    <tr>
                        <th>Estado:</th>
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
                    </tr>
                    <tr>
                        <th>Creado:</th>
                        <td>{{ $reserva->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Actualizado:</th>
                        <td>{{ $reserva->updated_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </table>

                <div class="d-flex gap-2 mt-4">
                    <a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-warning">Editar</a>
                    <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection