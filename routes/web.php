<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AtividadeController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// A rota do dashboard continua sendo a principal após o login
Route::get('/dashboard', [AtividadeController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/meus-certificados', [AtividadeController::class, 'gallery'])
    ->middleware(['auth', 'verified'])
    ->name('meus-certificados');

Route::get('/registro-horas', [AtividadeController::class, 'create'])->middleware(['auth'])->name('registrar-horas');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('atividades', AtividadeController::class)->except(['index']);
});

//GRUPO DE ROTAS DO MIDDLEWARE ADMIN
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // O Dashboard principal de aprovação
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // As ações de aprovar e negar
    Route::post('/atividades/{atividade}/aprovar', [AdminDashboardController::class, 'aprovar'])->name('atividades.aprovar');
    Route::post('/atividades/{atividade}/negar', [AdminDashboardController::class, 'negar'])->name('atividades.negar');
});

require __DIR__.'/auth.php';
