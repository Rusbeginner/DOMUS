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
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();



Route::resource('tipolubricantes', App\Http\Controllers\TipolubricanteController::class);
Route::resource('lubricantes', App\Http\Controllers\LubricanteController::class);
Route::resource('tipoequipos', App\Http\Controllers\TipoequipoController::class);
Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('chofers', App\Http\Controllers\ChoferController::class);
Route::resource('combustibles', App\Http\Controllers\CombustibleController::class);
Route::resource('tarjetamagneticas', App\Http\Controllers\TarjetamagneticaController::class);

//Reportes con tarejetas magneticas
Route::get('downloadtarjetas', 'App\Http\Controllers\TarjetamagneticaController@obtenertarjavencer')->name('tarjetasmag.vencer');


Route::resource('vehiculos', App\Http\Controllers\VehiculoController::class);
//reportes relacionados con vehiculos
Route::get('vehsinlubricantes', 'App\Http\Controllers\VehiculoController@obtenervehsinlubricantes')->name('vehiculos.vehsinlubricantes');
Route::get('vehsincombustible', 'App\Http\Controllers\VehiculoController@obtenervehsincombustible')->name('vehiculos.vehsincombustible');

Route::resource('ctrlicenciaoperativas', App\Http\Controllers\CtrlicenciaoperativaController::class);

Route::get('download_pdf', 'App\Http\Controllers\CtrlicenciaoperativaController@guardar_pdf')->name('ctrlicenciaoperativas.guardar_pdf');
Route::get('ver_pdf', 'App\Http\Controllers\CtrlicenciaoperativaController@ver_pdf')->name('ctrlicenciaoperativas.ver_pdf');

Route::resource('aslubricantes', App\Http\Controllers\AslubricanteController::class);
Route::resource('ctrlcombustibles', App\Http\Controllers\CtrlcombustibleController::class);

Route::resource('ctrlicenciaconducs', App\Http\Controllers\CtrlicenciaconducController::class);
Route::get('downloadcond_pdf', 'App\Http\Controllers\CtrlicenciaconducController@guardar_pdf')->name('ctrlicenciacond.guardar_pdf');

Route::resource('ctrlicenciacircs', App\Http\Controllers\CtrlicenciacircController::class);
Route::get('downloadcirc_pdf', 'App\Http\Controllers\CtrlicenciacircController@guardar_pdf')->name('ctrlicenciacirc.guardar_pdf');