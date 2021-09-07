<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//formulario tutores
Route::resource('formtutores',App\Http\Controllers\TutoresController::class);
//formulario entrenadores
Route::resource('formentrenadores',App\Http\Controllers\EntrenadoresController::class);
//formulario RegistrosMedicos}
Route::resource('formreg_med', App\Http\Controllers\RegistrosMedicosController::class);
//formulario alumno
Route::resource('formalumnos', App\Http\Controllers\AlumnosController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('asistencia/grupos', App\Http\Controllers\GruposController::class);


Route::resource('asistencia/grupo_alumnos', App\Http\Controllers\GrupoAlumnosController::class);
Route::get('/asistencia/grupo_alumnosgeneral',[App\Http\Controllers\GrupoAlumnosController::class, 'general'])->name('grupo_alumnosgeneral');


//Rutas para formasistencia
Route::get('/formasistencia',[App\Http\Controllers\AsistenciasController::class, 'index'])->name('formasistencia.index'); 
Route::get('/formasistencia/create',[App\Http\Controllers\AsistenciasController::class, 'create'])->name('formasistencia.create'); 
Route::post('/formasistencia',[App\Http\Controllers\AsistenciasController::class, 'store'])->name('formasistencia.store'); 
Route::get('/formasistencia_dia',[App\Http\Controllers\AsistenciasController::class, 'dia'])->name('formasistencia_dia');


//Rutas para Modulo asistencia
Route::get('/asistencia_control', function () {
    return view('asistencia.asistencia_control');
})->name('asistencia_control');


//Formulario de Historico_Medico
Route::resource('formhistorico_medico',  App\Http\Controllers\HistoricosMedicosController::class);

//Formulario de Tabla Historica Medica
Route::resource('tablamedica', App\Http\Controllers\TablaHistoricaMedicaController::class);
