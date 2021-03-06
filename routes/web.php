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


//TODO:holaestas son mis rutas --maron vera---///////////////////////////////////////

Route::get('/foroslista','ForosController@showForos')->name('listaforos');
Route::get('/foroslistaAdmin','ForosController@showForosAdmin')->name('listaforosAdmin');

Route::post('/forosmostrarforo','ForosController@mostrarforo')->name('mostrarforo');
Route::post('/forosmostrarfororespuestas','RespuestasController@mostrar')->name('mostrarrespuestas');

Route::get('/forosmisforos','ForosController@mostrarMisForos')->name('misforos');
Route::post('/forosmisforoscrear','ForosController@crear')->name('crearforo');
Route::post('/forosmisforosdelete','ForosController@destroyMisforos')->name('eliminarMiForo');
Route::post('/forosdelete','ForosController@destroyForo')->name('eliminarforo');
//Route::post('/foros/delete','ForosController@destroyForo')->name('eliminarForo');

Route::resource('/forosrespuestas','RespuestasController');
Route::post('/forosrespuestas/elininar','RespuestasController@eliminar');




////////////////////////////////////////////////////////////////////////////////////


// de esta manera tambian funciona solo que no la uso porque me dapereza crear cada una de las tinas jajajaja
/* Route::post('/gestionformacioneder','InformacionEderController@ingresar'); */
/* Route::get('/administrar_info_eder', function () {
    return view('ventanasAdministrador.ventanaInicialAdmin');
})->name('administrar_info_eder');
 
*/ 
 


// rutas pjara la edicion del perfil del usuario
Route::get('/perfilUsuario', 'PerfilUsuarioController@index')->name('perfilUsuario');
Route::get('/datosComboUsuario', 'PerfilUsuarioController@datosUsuarioCombos')->name('datosComboUsuario');
Route::put('/actualizarDatosUsuario', 'PerfilUsuarioController@actualizar');

// final de rutas pjara la edicion del perfil del usuario

//no sean hp si no sirve la ruta borrenlan mancos


// final de rutas pjara la edicion del perfil del usuario

