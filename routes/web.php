<?php

// routes/web.php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AtividadeController; // Importar o controller
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// A rota do dashboard continua sendo a principal após o login
Route::get('/dashboard', [AtividadeController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

// A galeria é uma rota customizada
Route::get('/meus-certificados', [AtividadeController::class, 'gallery'])
    ->middleware(['auth'])->name('atividades.gallery');

Route::get('/registro-horas', [AtividadeController::class, 'register'])->middleware(['auth'])->name('atividades.register');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ROUTE RESOURCE: Cria as rotas para create, store, show, edit, update, destroy
    // Usamos 'except' para não recriar a rota 'index' que já usamos para o dashboard.
    Route::resource('atividades', AtividadeController::class)->except(['index']);

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/{id}', [AdminController::class, 'edit'])->name('admin.edit');
});

require __DIR__.'/auth.php';
