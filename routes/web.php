<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/dashboard',[App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

//Validacion panel de Alumno
Route::get('/panelalumno',[App\Http\Controllers\PanelAlumnoController::class, 'index'])->name('panelalumno.index');
Route::get('/consultamedica_alumno',[App\Http\Controllers\PanelAlumnoController::class, 'consultamedica_alumno'])->name('panelalumno.consultamedica');

//Validacion panel de Visitante

Route::get('/panelvisitante',[App\Http\Controllers\PanelVisitanteController::class, 'index'])->name('panelvisitante.index');

//rutas para  gestor de formularios

Route::get('/forms_control',[App\Http\Controllers\FormsController::class, 'index'])->name('forms_control');

//formulario tutores
Route::resource('formtutores',App\Http\Controllers\TutoresController::class);
//formulario entrenadores
Route::resource('formentrenadores',App\Http\Controllers\EntrenadoresController::class);
//formulario RegistrosMedicos}
Route::resource('formreg_med', App\Http\Controllers\RegistrosMedicosController::class);
//formulario alumno
Route::resource('formalumnos', App\Http\Controllers\AlumnosController::class);

Route::resource('asistencia/grupos', App\Http\Controllers\GruposController::class);

Route::resource('asistencia/grupo_alumnos', App\Http\Controllers\GrupoAlumnosController::class);
Route::get('/asistencia/grupo_alumnosgeneral',[App\Http\Controllers\GrupoAlumnosController::class, 'general'])->name('grupo_alumnosgeneral');

//Rutas para formasistencia
Route::get('/formasistencia',[App\Http\Controllers\AsistenciasController::class, 'index'])->name('formasistencia.index'); 
Route::get('/formasistencia/create',[App\Http\Controllers\AsistenciasController::class, 'create'])->name('formasistencia.create'); 
Route::post('/formasistencia',[App\Http\Controllers\AsistenciasController::class, 'store'])->name('formasistencia.store'); 
Route::get('/formasistencia_dia',[App\Http\Controllers\AsistenciasController::class, 'dia'])->name('formasistencia_dia');


//Rutas para Modulo asistencia
Route::get('/asistencia_control',[App\Http\Controllers\ControlAsistenciaController::class, 'index'])->name('asistencia_control');

//Formulario de Historico_Medico
Route::resource('formhistorico_medico',  App\Http\Controllers\HistoricosMedicosController::class);

//Formulario de Tabla Historica Medica
Route::resource('tablamedica', App\Http\Controllers\TablaHistoricaMedicaController::class);

//Formulario de Historico_Deportivo
Route::resource('formhistorico_deportivo', App\Http\Controllers\HistoricosDeportivosController::class);

//Formulario de Tabla Historica Deportiva
Route::resource('tabladeportiva', App\Http\Controllers\TablaHistoricoDeportivoController::class);

//Formulario de USUARIOS
Route::resource('formusuario', App\Http\Controllers\usuariosController::class);

//Rutas para DESCARGAR PDF
Route::get('/MenuPDF', function () {
    return view('seccionPDF.MenuPDF');
})->name('MenuPdf');

Route::get('/alumnosPDF',[App\Http\Controllers\PDFcontroller::class, 'alumnosPDF'])->name('alumnosPDF');

 Route::get('/VistalumnoPDF',[App\Http\Controllers\VistasPDF::class, 'alumnosPDF']); 

 Route::get('/tutoresPDF',[App\Http\Controllers\PDFcontroller::class, 'tutoresPDF'])->name('tutoresPDF');

 Route::get('/VistatutoresPDF',[App\Http\Controllers\VistasPDF::class, 'tutoresPDF']); 

 Route::get('/entrenadoresPDF',[App\Http\Controllers\PDFcontroller::class, 'entrenadoresPDF'])->name('entrenadoresPDF');

 Route::get('/VistaentrenadoresPDF',[App\Http\Controllers\VistasPDF::class, 'entrenadoresPDF']);

 Route::get('/reg_medPDF',[App\Http\Controllers\PDFcontroller::class, 'reg_medPDF'])->name('reg_medPDF');

 Route::get('/Vistareg_medPDF',[App\Http\Controllers\VistasPDF::class, 'reg_medPDF']);

 Route::get('/historial_DeportivoPDF',[App\Http\Controllers\PDFcontroller::class, 'historial_DeportivoPDF'])->name('historial_DeportivoPDF');

 Route::get('/Vistahistorial_DeportivoPDF',[App\Http\Controllers\VistasPDF::class, 'historial_DeportivoPDF']);
 
 Route::get('/historial_MedicoPDF',[App\Http\Controllers\PDFcontroller::class, 'historial_DeportivoPDF'])->name('historial_DeportivoPDF');

 Route::get('/Vistahistorial_DeportivoPDF',[App\Http\Controllers\VistasPDF::class, 'historial_DeportivoPDF']);

 Route::get('/historial_MedicoPDF',[App\Http\Controllers\PDFcontroller::class, 'historial_MedicoPDF'])->name('historial_MedicoPDF');

 Route::get('/Vistahistorial_MedicoPDF',[App\Http\Controllers\VistasPDF::class, 'historial_MedicoPDF']);

 Route::get('/GruposAsignadosPDF',[App\Http\Controllers\PDFcontroller::class, 'GruposAsignadosPDF'])->name('GruposAsignadosPDF');

 Route::get('/VistaGruposAsignadosPDF',[App\Http\Controllers\VistasPDF::class, 'GruposAsignadosPDF']);

 Route::get('/listaGrupoPDF',[App\Http\Controllers\PDFcontroller::class, 'listaGrupoPDF'])->name('listaGrupoPDF');

 Route::get('/VistalistaGrupoPDF',[App\Http\Controllers\VistasPDF::class, 'listaGrupoPDF']);

 Route::get('/listaGrupoAlumnosPDF',[App\Http\Controllers\PDFcontroller::class, 'listaGrupoAlumnosPDF'])->name('listaGrupoAlumnosPDF');

 Route::get('/VistalistaGrupoAlumnosPDF',[App\Http\Controllers\VistasPDF::class, 'listaGrupoAlumnosPDF']);

//EJERCICIO FULLCALENDAR 
Route::get('/calendario',[App\Http\Controllers\EventoController::class,'index'])->name('calendario');
//no borrar porque este depende que se muestren
Route::get('/calendario/show',[App\Http\Controllers\EventoController::class,'show'])->name('/calendario/show');

//De aqui en adelante crear las rutas a partir de su tipo de solicitud y 
// no por las rutas de tipo resource
Route::resource('/eventos', App\Http\Controllers\EventoController::class);

 //Formulario Teams/Equipos de trabajo
Route::resource('teams',App\Http\Controllers\TeamsController::class);

//Rutas para Administrador_control
Route::get('/administrador_control',[App\Http\Controllers\OpcionesAdminController::class, 'index'])->name('administrador_control');

//Ruta para Modulo de Teams_entrenador
Route::resource('team_entrenadores', App\Http\Controllers\TeamEntrenadoresController::class);
Route::get('/team_entrenadoresespecifico',[App\Http\Controllers\TeamEntrenadoresController::class, 'especifico'])->name('team_entrenadoresespecifico');


//Validacion panel de Alumno
Route::get('/panelteam',[App\Http\Controllers\PanelTeamController::class, 'index'])->name('panelteam.index');


//Ruta para fechaprueba
Route::resource('fechaprueba', App\Http\Controllers\PruebaFechaController::class);

