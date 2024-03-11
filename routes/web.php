<?php

use App\Http\Controllers\proyectoController;
use Illuminate\Support\Facades\Route;

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

 //---------------------------Inicio-----------------------------------------------------------
Route::get('/listado', [proyectoController::class, 'listado'])->name('listado');
//---------------------------------Crear------------------------------------------------------
Route::get('/create', [proyectoController::class, 'create'])->name('create');
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