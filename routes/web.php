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
/* Route::get('/administrar_info_eder', function () {
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
})->name('administrar_info_eder'); */

//Ruta para comentarios 
Route::resource('/addComentario', 'ComentarioController');

// rutas pjara la edicion del perfil del usuario
Route::get('/perfilUsuario', 'PerfilUsuarioController@index')->name('perfilUsuario');
Route::get('/datosComboUsuario', 'PerfilUsuarioController@datosUsuarioCombos')->name('datosComboUsuario');
Route::put('/actualizarDatosUsuario', 'PerfilUsuarioController@actualizar');
// final de rutas pjara la edicion del perfil del usuario