@extends('layouts.app')

@section('title', 'Inicio - Restaurante')

@section('content')
<div class="text-center py-5">
    <h1 class="display-4">Sistema de Reservas de Restaurante</h1>
    <p class="lead">Gestiona clientes, mesas y reservas de forma sencilla</p>
    
    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Clientes</h5>
                    <p class="card-text">Gestiona la información de tus clientes</p>
                    <a href="{{ route('clientes.index') }}" class="btn btn-primary">Ver Clientes</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Mesas</h5>
                    <p class="card-text">Administra las mesas del restaurante</p>
                    <a href="{{ route('mesas.index') }}" class="btn btn-primary">Ver Mesas</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Reservas</h5>
                    <p class="card-text">Controla todas las reservas</p>
                    <a href="{{ route('reservas.index') }}" class="btn btn-primary">Ver Reservas</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection