@extends('layouts.app')

@section('title', 'Editar Mesa')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h2>Editar Mesa</h2>
        
        <div class="card mt-4">
            <div class="card-body">
                <form action="{{ route('mesas.update', $mesa) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="numero" class="form-label">Número de Mesa</label>
                        <input type="number" class="form-control @error('numero') is-invalid @enderror" 
                               id="numero" name="numero" value="{{ old('numero', $mesa->numero) }}" required>
                        @error('numero')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="capacidad" class="form-label">Capacidad (personas)</label>
                        <input type="number" class="form-control @error('capacidad') is-invalid @enderror" 
                               id="capacidad" name="capacidad" value="{{ old('capacidad', $mesa->capacidad) }}" min="1" required>
                        @error('capacidad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="ubicacion" class="form-label">Ubicación</label>
                        <select class="form-select @error('ubicacion') is-invalid @enderror" 
                                id="ubicacion" name="ubicacion" required>
                            <option value="">Selecciona una ubicación</option>
                            <option value="Terraza" {{ old('ubicacion', $mesa->ubicacion) == 'Terraza' ? 'selected' : '' }}>Terraza</option>
                            <option value="Interior" {{ old('ubicacion', $mesa->ubicacion) == 'Interior' ? 'selected' : '' }}>Interior</option>
                            <option value="Salón Privado" {{ old('ubicacion', $mesa->ubicacion) == 'Salón Privado' ? 'selected' : '' }}>Salón Privado</option>
                        </select>
                        @error('ubicacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                        <a href="{{ route('mesas.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection