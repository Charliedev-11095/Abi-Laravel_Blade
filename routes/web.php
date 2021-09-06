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
