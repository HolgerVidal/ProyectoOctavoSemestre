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

//xxxmaron porno
