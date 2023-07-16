<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaunaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PassController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\Horario_disciplinaController;
USE App\Http\Controllers\MembresiaController;
use App\Models\User;
use App\Http\Controllers\PeriodoController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\VentaController;   
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\TarjetaController;
use App\Http\Controllers\BitacoraController;


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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');                                                    
//agregamos un middleware para que solo los usuarios con rol de admin puedan acceder a la ruta de editar,eliminar,crear etc de sauna con "->middleware('can:admin-access');"
Route::resource('/sauna', SaunaController::class)->names('sauna')->middleware('auth')->middleware('can:admin-access');
Route::resource('/empleado', EmpleadoController::class)->names('empleado')->middleware('auth')->middleware('can:admin-access');
Route::resource('/cliente', ClienteController::class)->names('cliente')->middleware('auth')->middleware('can:admin-access');
Route::resource('/disciplina', DisciplinaController::class)->names('disciplina')->middleware('auth')->middleware('can:admin-access');
Route::resource('/horario_disciplina',Horario_disciplinaController::class)->names('horario_disciplina')->middleware('auth')->middleware('can:admin-access');
Route::resource('/membresia',MembresiaController::class)->names('membresia')->middleware('auth')->middleware('can:admin-access');
Route::resource('/pago',PagoController::class)->names('pago')->middleware('auth')->middleware('can:admin-access');
Route::resource('/promocion',PromocionController::class)->names('promocion')->middleware('auth')->middleware('can:admin-access');
Route::resource('/producto', ProductoController::class)->names('producto')->middleware('auth')->middleware('can:admin-access');
Route::resource('/categoria', CategoriaController::class)->names('categoria')->middleware('auth')->middleware('can:admin-access');
Route::resource('/bitacora', BitacoraController::class)->names('bitacora')->middleware('auth')->middleware('can:admin-access');
//Route::resource('/venta', VentaController::class)->names('venta')->middleware('auth')->middleware('can:admin-access');
//Route::post('/venta', [VentaController::class, 'store'])->name('venta.store')->middleware('auth')->middleware('can:admin-access');
//Route::get('/venta/create', [VentaController::class, 'create'])->name('venta.create')->middleware('auth')->middleware('can:admin-access');
//Route::get('/venta', [VentaController::class, 'index'])->name('venta.index')->middleware('auth')->middleware('can:admin-access');
////////////////////////////esto es practica de cambio de contraseña///////////////////////////////
Route::get('/change-password', function() {
    $user = Auth::user(); 
        return view('change-password',compact('user'));
})->name('change-password')->middleware('auth');


Route::put('/usuarios/{id}/update-password', [PassController::class, 'updatePassword'])->name('usuarios.update-password')->middleware('auth');

Route::put('/periodo/{id}', [PeriodoController::class, 'update'])->name('periodo.update')->middleware('auth')->middleware('can:admin-access');



Route::get('/pdf/{id}', [PdfController::class, 'generatePDF'])->name('pdf.generate')->middleware('auth')->middleware('can:admin-access');
//Route::get('/pdf/{id}/imprimirNotaConDatos', [PdfController::class, 'imprimirNotaConDatos'])->name('pdf.datos')->middleware('auth');


Route::get('/perfil', [PerfilController::class, 'show'])->name('perfil.show')->middleware('auth');

Route::get('/mostrar',[ClienteController::class, 'mostrarEntreValores'])->name('mostrar.mostrarEntreValores')->middleware('auth');
Route::get('/mostrar2',[PagoController::class, 'mostrarEntreValores'])->name('mostrar.mostrarEntreValores')->middleware('auth');

/**
 * Rutas para crear un nuevo registro de venta
 */





Route::controller(VentaController::class)->group(function () {

    Route::delete('estimate/{id}', 'destroy')->name('estimate.destroy')->middleware('auth')->middleware('can:admin-access');
   //este muestra la vista para crear la venta
    Route::get('form/estimates/page', 'estimatesIndex')->middleware('auth')->name('form/estimates/page')->middleware('can:admin-access');
    Route::get('create/estimate/page', 'createEstimateIndex')->middleware('auth')->name('create/estimate/page');
    Route::get('edit/estimate/{estimate_number}', 'editEstimateIndex')->middleware('auth');
    Route::get('estimate/view/{estimate_number}', 'viewEstimateIndex')->middleware('auth');
    
    Route::post('create/estimate/save', 'createEstimateSaveRecord')->middleware('auth')->name('create/estimate/save')->middleware('can:admin-access');
    Route::post('create/estimate/update', 'EstimateUpdateRecord')->middleware('auth')->name('create/estimate/update');
    Route::post('estimate_add/delete', 'EstimateAddDeleteRecord')->middleware('auth')->name('estimate_add/delete');
    Route::post('estimate/delete', 'EstimateDeleteRecord')->middleware('auth')->name('estimate/delete');
    // ---------------------- payments  ---------------//

    
    
});

Route::get('/create/estimate/prueba/{id}', [PruebaController::class, 'retornarProductos'])->name('prueba');

 Route::get('/verify/{id}', [TarjetaController::class, 'verify'])->name('verify');