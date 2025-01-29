<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\UserController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);


Route::get('/cards', [CardController::class, 'index']); // Listar cartas
Route::post('/cards', [CardController::class, 'store']); // Crear carta
Route::put('/cards/{id}', [CardController::class, 'update']); // Actualizar carta
Route::delete('/cards/{id}', [CardController::class, 'destroy']); // Eliminar carta



Route::middleware('auth')->group(function () {
    Route::get('/perfil', [UserController::class, 'perfil']);
});
