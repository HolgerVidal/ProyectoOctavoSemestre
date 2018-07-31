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

Route::get('/foros/lista','ForosController@showForos')->name('listaforos');

//Ruta para comentarios  
Route::resource('/addComentario', 'ComentarioController');
Route::get('/consultaComentarioAsc','ComentarioController@consultaAsc');
Route::get('/consultaComentarioDesc','comentarioController@consultaDesc');

//Ruta para Respuesta_de-los_Comentarios 
Route::resource('/addRespuesta', 'Respuesta_comentarioController');
Route::get('/llenarRespuesta','comentarioController@llenarRespuesta'); 


// rutas pjara la edicion del perfil del usuario
Route::get('/perfilUsuario', 'PerfilUsuarioController@index')->name('perfilUsuario');
Route::get('/datosComboUsuario', 'PerfilUsuarioController@datosUsuarioCombos')->name('datosComboUsuario');
Route::put('/actualizarDatosUsuario', 'PerfilUsuarioController@actualizar');
// final de rutas pjara la edicion del perfil del usuario

//no sean hp si no sirve la ruta borrenlan mancos