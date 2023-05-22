<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaunaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PassController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

Route::resource('/sauna', SaunaController::class)->names('sauna')->middleware('auth');
Route::resource('/empleado', EmpleadoController::class)->names('empleado')->middleware('auth');


////////////////////////////esto es practica de cambio de contraseña///////////////////////////////
Route::get('/change-password', function() {
    $user = Auth::user();
        return view('change-password',compact('user'));
})->name('change-password')->middleware('auth');


Route::put('/usuarios/{id}/update-password', [PassController::class, 'updatePassword'])->name('usuarios.update-password')->middleware('auth');