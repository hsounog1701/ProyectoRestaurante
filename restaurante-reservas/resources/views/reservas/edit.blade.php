@extends('layouts.app')

@section('title', 'Editar Reserva')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h2>Editar Reserva</h2>
        
        <div class="card mt-4">
            <div class="card-body">
                <form action="{{ route('reservas.update', $reserva) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="cliente_id" class="form-label">Cliente</label>
                        <select class="form-select @error('cliente_id') is-invalid @enderror" 
                                id="cliente_id" name="cliente_id" required>
                            <option value="">Selecciona un cliente</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}" {{ old('cliente_id', $reserva->cliente_id) == $cliente->id ? 'selected' : '' }}>
                                    {{ $cliente->nombre }} - {{ $cliente->email }}
                                </option>
                            @endforeach
                        </select>
                        @error('cliente_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="mesa_id" class="form-label">Mesa</label>
                        <select class="form-select @error('mesa_id') is-invalid @enderror" 
                                id="mesa_id" name="mesa_id" required>
                            <option value="">Selecciona una mesa</option>
                            @foreach($mesas as $mesa)
                                <option value="{{ $mesa->id }}" {{ old('mesa_id', $reserva->mesa_id) == $mesa->id ? 'selected' : '' }}>
                                    Mesa {{ $mesa->numero }} - Capacidad: {{ $mesa->capacidad }} - {{ $mesa->ubicacion }}
                                </option>
                            @endforeach
                        </select>
                        @error('mesa_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="fecha_hora" class="form-label">Fecha y Hora</label>
                        <input type="datetime-local" class="form-control @error('fecha_hora') is-invalid @enderror" 
                               id="fecha_hora" name="fecha_hora" value="{{ old('fecha_hora', $reserva->fecha_hora->format('Y-m-d\TH:i')) }}" required>
                        @error('fecha_hora')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="num_personas" class="form-label">Número de Personas</label>
                        <input type="number" class="form-control @error('num_personas') is-invalid @enderror" 
                               id="num_personas" name="num_personas" value="{{ old('num_personas', $reserva->num_personas) }}" min="1" required>
                        @error('num_personas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select @error('estado') is-invalid @enderror" 
                                id="estado" name="estado" required>
                            <option value="pendiente" {{ old('estado', $reserva->estado) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="confirmada" {{ old('estado', $reserva->estado) == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                            <option value="cancelada" {{ old('estado', $reserva->estado) == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                            <option value="completada" {{ old('estado', $reserva->estado) == 'completada' ? 'selected' : '' }}>Completada</option>
                        </select>
                        @error('estado')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                        <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection