<?php

use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EspecialidadeController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/cadastro-paciente', function () {
    return view('form-paciente',  ['mensagem' => '']);
})->name('paciente');

Route::get('/cadastro-medico', [MedicoController::class, 'index'])->name('medico');
Route::get('/cadastro-especialidade', function () {
    return view('form-especialidade',['divergente' => false ,'mensagem' => '']);
})->name('especialidade');

Route::get('/agendar-consulta', [ConsultaController::class, 'index'])->name('agendar-consulta');
Route::get('/medicos/por-especialidade', [MedicoController::class, 'getMedicoPorEspecialidade'])->name('medicos-por-especialidade');

Route::post('/store-paciente', [PacienteController::class, 'store'])->name('salve-paciente');
Route::post('/store-medico', [MedicoController::class, 'store'])->name('salve-medico');
Route::post('/store-especialidade', [EspecialidadeController::class, 'store'])->name('salve-especialidade');
Route::post('/store-consulta', [ConsultaController::class, 'store'])->name('salve-consulta');

Route::resource('pacientes', PacienteController::class);
Route::resource('medicos', MedicoController::class);
Route::resource('especialidades', EspecialidadeController::class);
Route::resource('consultas', ConsultaController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
