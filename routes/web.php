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
