<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SessionsController;

// Listar todas as ideias
Route::get('/ideas', [IdeaController::class, 'index']);
// Abrir formulário de criação
Route::get('/ideas/create', [IdeaController::class, 'create']);
// Salvar uma nova ideia
Route::post('/ideas', [IdeaController::class, 'store']);
// Mostrar uma ideia
Route::get('/ideas/{idea}', [IdeaController::class, 'show']);
// Abrir formulário de edição
Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit']);
// Atualizar uma ideia
Route::patch('/ideas/{idea}', [IdeaController::class, 'update']);
// Excluir uma ideia
Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy']);

Route::get('/register',[RegisteredUserController::class, 'create']);
Route::post('/register',[RegisteredUserController::class, 'store']);
// Deslogar
Route::delete('/logout',[SessionsController::class, 'destroy']);
// Login
Route::get('/login',[SessionsController::class, 'create']);
Route::post('/login',[SessionsController::class, 'store']);
