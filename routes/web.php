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

Route::get('/', function () {
    return view('ventanasInicio.ventanaInicial');
})->name('inicio');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ruta para llamar a la vista de administrador
// de la informacion de la pagina principal
Route::get('/administrar_info_eder', function () {
    return view('ventanasAdministrador.ventanaInicialAdmin');
})->name('administrar_info_eder');
 
 
 
Route::get('/prueva','PruevaController@showP')->name('prueva');
 
Route::get('/foros/lista','ForosController@showForos')->name('listaforos');
Route::post('/foros/mostrarforo','ForosController@mostrarforo')->name('mostrarforo');

Route::get('/foros/respuestas','RespuestasController@mostrar')->name('respuestas');

//Route::get('/foros/respuestasR','RespuestasController@mostrar')->name('mostrarrespuestas');


//Route::get('/foros/Listado', 'ForosController@showForos');
//Route::delete('/foros/delete', 'ForosController@destroy');
//Route::post('/foros/create', 'ForosController@create'); //si se envia datos utilizar el post post

//Route::post('/foros/busqueda', 'ForosController@buscar');
 
//Route::post('/persona/busquedaportipo', 'HomeController@encontrarPersonaPorTipo')