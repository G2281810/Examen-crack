<?php
use App\Http\Controllers\JqueryController;
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

Route::get('/Vista', [JqueryController::class, 'vista'])->name('Vista');

Route::get('/datosEmpleados', [JqueryController::class, 'datosEmpleados'])->name('datosEmpleados');

Route::get('/datosProductos', [JqueryController::class, 'datosProductos'])->name('datosProductos');

Route::get('/Formulario', [JqueryController::class, 'Formulario'])->name('Formulario');

Route::post('/CrearVenta', [JqueryController::class, 'CrearVenta'])->name('CrearVenta');


Route::post('/FotoTienda', [JqueryController::class, 'FotoTienda'])->name('FotoTienda');
Route::post('/FotoEmpleado', [JqueryController::class, 'FotoEmpleado'])->name('FotoEmpleado');
Route::post('/FotoProducto', [JqueryController::class, 'FotoProducto'])->name('FotoProducto');

