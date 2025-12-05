@extends('layouts.app')

@section('title', 'Ver Cliente')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h2>Detalles del Cliente</h2>
        
        <div class="card mt-4">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>ID:</th>
                        <td>{{ $cliente->id }}</td>
                    </tr>
                    <tr>
                        <th>Nombre:</th>
                        <td>{{ $cliente->nombre }}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{{ $cliente->email }}</td>
                    </tr>
                    <tr>
                        <th>Teléfono:</th>
                        <td>{{ $cliente->telefono }}</td>
                    </tr>
                    <tr>
                        <th>Creado:</th>
                        <td>{{ $cliente->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Actualizado:</th>
                        <td>{{ $cliente->updated_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </table>

                <div class="mt-4">
                    <h5>Reservas del Cliente</h5>
                    @if($cliente->reservas->count() > 0)
                        <ul class="list-group">
                            @foreach($cliente->reservas as $reserva)
                            <li class="list-group-item">
                                Mesa {{ $reserva->mesa->numero }} - 
                                {{ $reserva->fecha_hora->format('d/m/Y H:i') }} - 
                                {{ $reserva->num_personas }} personas - 
                                <span class="badge bg-primary">{{ $reserva->estado }}</span>
                            </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">No tiene reservas</p>
                    @endif
                </div>

                <div class="d-flex gap-2 mt-4">
                    <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning">Editar</a>
                    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection