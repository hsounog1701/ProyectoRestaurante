@extends('layouts.app')

@section('title', 'Ver Mesa')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h2>Detalles de la Mesa</h2>
        
        <div class="card mt-4">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>ID:</th>
                        <td>{{ $mesa->id }}</td>
                    </tr>
                    <tr>
                        <th>Número:</th>
                        <td>{{ $mesa->numero }}</td>
                    </tr>
                    <tr>
                        <th>Capacidad:</th>
                        <td>{{ $mesa->capacidad }} personas</td>
                    </tr>
                    <tr>
                        <th>Ubicación:</th>
                        <td>{{ $mesa->ubicacion }}</td>
                    </tr>
                    <tr>
                        <th>Creado:</th>
                        <td>{{ $mesa->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Actualizado:</th>
                        <td>{{ $mesa->updated_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </table>

                <div class="mt-4">
                    <h5>Reservas de esta Mesa</h5>
                    @if($mesa->reservas->count() > 0)
                        <ul class="list-group">
                            @foreach($mesa->reservas as $reserva)
                            <li class="list-group-item">
                                Cliente: {{ $reserva->cliente->nombre }} - 
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
                    <a href="{{ route('mesas.edit', $mesa) }}" class="btn btn-warning">Editar</a>
                    <a href="{{ route('mesas.index') }}" class="btn btn-secondary">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection