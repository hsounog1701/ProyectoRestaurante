<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\ReservaController;

//Dashboard
Route::get('/', function () {
return view('welcome');}) ->name('home');

//Clientes
Route::resource('clientes', ClienteController::class);

//Mesas
Route::resource('mesas', MesaController::class);

//Reservas
Route::resource('reservas', ReservaController::class);