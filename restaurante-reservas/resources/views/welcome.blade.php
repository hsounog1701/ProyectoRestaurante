@extends('layouts.app')

@section('title', 'Inicio - Restaurante')

@section('content')
<div class="text-center py-5">
    <h1 class="display-4">Sistema de Reservas de Restaurante</h1>
    <p class="lead">Gestiona clientes, mesas y reservas de forma sencilla</p>
    
    <div class="row mt-5">
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Clientes</h5>
                    <p class="card-text">Gestiona la información de tus clientes</p>
                    <a href="{{ route('clientes.index') }}" class="btn btn-primary">Ver Clientes</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Mesas</h5>
                    <p class="card-text">Administra las mesas del restaurante</p>
                    <a href="{{ route('mesas.index') }}" class="btn btn-primary">Ver Mesas</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Reservas</h5>
                    <p class="card-text">Controla todas las reservas</p>
                    <a href="{{ route('reservas.index') }}" class="btn btn-primary">Ver Reservas</a>
                </div>
            </div>
        </div>
    </div>

    <!-- NUEVA SECCIÓN: Cards de Reservas -->
    <h2 class="mt-5 mb-4">Reservas Actuales</h2>
    <div class="row">
        @forelse($reservas as $reserva)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Reserva #{{ $reserva->id }}</h5>
                        <p class="mb-1"><strong>Cliente:</strong> {{ $reserva->cliente->nombre }}</p>
                        <p class="mb-1"><strong>Mesa:</strong> {{ $reserva->mesa->numero }}</p>
                        <p class="mb-1"><strong>Fecha:</strong> {{ $reserva->fecha->format('d/m/Y') }}</p>
                        <p class="mb-1"><strong>Hora:</strong> {{ $reserva->hora->format('H:i') }}</p>
                        <a href="{{ route('reservas.show', $reserva->id) }}" class="btn btn-outline-primary mt-2">Ver Detalles</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    No hay reservas registradas.
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
