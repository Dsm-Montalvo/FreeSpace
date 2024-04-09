<?php

use App\Http\Controllers\proyectoController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckExternalAPILogin;
use App\Http\Middleware\CheckRole;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
});

 */

 Route::get('/', [proyectoController::class, 'index'])->name('index');

 Route::get('/info', [proyectoController::class, 'info'])->name('info'); 

 //---------------------------Inicio-----------------------------------------------------------
Route::get('/listado', [proyectoController::class, 'listado'])->middleware('check.external.api.login')->name('listado');


//---------------------------------Crear------------------------------------------------------
/* Route::get('/create', [proyectoController::class, 'create'])->name('create'); */
Route::post('/create', [proyectoController::class, 'save'])->name('create.save');
//-------------------------------Actualizar----------------------------------------------------
Route::get('/update/{id}', [proyectoController::class, 'update'])->name('actualizar');
Route::post('/updatesave', [proyectoController::class, 'updatesave'])->name('update.save');
//---------------------------------Eliminar-----------------------------------------------------
Route::get('/delete/{id}', [proyectoController::class, 'delete'])->name('destroy');

//----------------------------------vistas-------------------------------------------------------
Route::get('/listadoPIR', [proyectoController::class, 'listadoPIR'])->name('listadoPIR');
Route::get('/graficos', [proyectoController::class, 'graficos'])->name('graficos');
//-----------------------------------login--------------------------------------------------------
Route::get('/login', [proyectoController::class, 'login'])->name('login');
Route::get('/ingresar', [proyectoController::class, 'ingresar'])->name('ingresar');
Route::get('/register', [proyectoController::class, 'register'])->name('register');
Route::post('/registro', [proyectoController::class, 'registro'])->name('registro');

<<<<<<< HEAD
Route::get('/prueba', [proyectoController::class, 'prueba'])->name('prueba');
=======
Route::get('/cerrarSesion', [proyectoController::class, 'cerrarSesion'])->name('cerrarSesion');


//-----------------------------------------------------admin----------------------------------------
Route::get('/create', [proyectoController::class, 'create'])->name('create');

/* ->middleware('role:admin') */

//-----------------------------------------Profesores+---------------------------------------------

Route::get('/indexp', [proyectoController::class, 'indexp'])->middleware('check.external.api.login')->name('indexp');
Route::get('/explorar', [proyectoController::class, 'explorar'])->middleware('check.external.api.login')->name('explorar');
Route::get('/detalles', [proyectoController::class, 'perfil'])->middleware('check.external.api.login')->name('detalles');
Route::get('/detalles2', [proyectoController::class, 'perfil2'])->middleware('check.external.api.login')->name('detalles2');
Route::get('/detalles3', [proyectoController::class, 'perfil3'])->middleware('check.external.api.login')->name('detalles3');
Route::get('/reserva', [proyectoController::class, 'reserva'])->middleware('check.external.api.login')->name('reserva');
Route::post('/guardarDatos', [proyectoController::class, 'guardarDatos'])->middleware('check.external.api.login')->name('guardarDatos');
Route::get('/historial', [proyectoController::class, 'historial'])->middleware('check.external.api.login')->name('historial');
Route::get('/allRecervas', [proyectoController::class, 'allRecervas'])->middleware('check.external.api.login')->name('allRecervas');

Route::get('/registerteacher', [proyectoController::class, 'registerteacher'])->name('registerteacher');
Route::post('/registroteacher', [proyectoController::class, 'registroteacher'])->name('registroteacher');

//-----------------------------------------------Estudiantes-------------------------------------------

Route::get('/indexe', [proyectoController::class, 'indexe'])->middleware('check.external.api.login')->name('indexe');
Route::get('/calendario', [proyectoController::class, 'calendario'])->middleware('check.external.api.login')->name('calendario');
Route::get('/detalle', [proyectoController::class, 'detalle'])->middleware('check.external.api.login')->name('detalle');
Route::get('/detalle2', [proyectoController::class, 'detalle2'])->middleware('check.external.api.login')->name('detalle2');
Route::get('/detalle3', [proyectoController::class, 'detalle3'])->middleware('check.external.api.login')->name('detalle3');

Route::get('/allRecervasE', [proyectoController::class, 'allRecervasE'])->middleware('check.external.api.login')->name('allRecervasE');
>>>>>>> main
