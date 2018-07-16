<?php

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
Route::get('/ventanaeder', 'HomeController@eder')->name('eder');

/* Route::get('/', function () {
    return view('ventanasInicio.ventanaInicial');
})->name('inicio'); */
Route::get('/listaContenidos','InicialConroller@todo');
Route::get('/','InicialConroller@index')->name('inicio');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ruta para llamar a la vista de administrador
// de la informacion de la pagina principal
Route::get('/administrar_info_eder','InformacionEderController@index')->name('administrar_info_eder');
Route::resource('/gestionformacioneder','InformacionEderController');
Route::put('/gestionformacioneder_actulizar','InformacionEderController@actualizar');

Route::put('/gestiontitulos', 'InformacionEderController@actualizartitulos'); // tuta para actualizar el contenido de los titulos


// de esta manera tambian funciona solo que no la uso porque me dapereza crear cada una de las tinas jajajaja
/* Route::post('/gestionformacioneder','InformacionEderController@ingresar'); */