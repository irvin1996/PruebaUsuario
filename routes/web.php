<?php


//Este es el que se esta usando
Route::get('/', function () {
      return view('ViajesPositivos.Index');
})->name('indexAdmin');


Route::get('indexDestinos', function () {
    return view('Destinos.Index');
})->name('indexDestinos');


//Empieza el mantenimiento de Usuarios
Route::group(['prefix'=>'usuario'/*,'middleware'=>'auth'*/],function(){

Route::get('Inicio Mantenimieto', 'UsuariosController@getIndexUsuario')->name('usuario.index');

Route::get('Crear Usuario',['uses'=>'UsuariosController@getUsuarioCreate','as'=>'usuario.crear']);/*<- esto es como un link*/
Route::post('crear',['uses'=>'UsuariosController@postUsuarioCreate'])->name('usuario.create');

Route::get('editar/{id}',['uses'=>'UsuariosController@getUsuarioEditar','as'=>'usuario.editar']);/*<- esto es como un link*/
Route::post('edit{id}',['uses'=>'UsuariosController@getUsuarioEdit','as'=>'usuario.edit']);
//Comienza mantenimiento Usuario-Destino
Route::get('Inicio Cliente-Destino', 'UsuariosController@getUsuarioDestino'
)->name('usuario.cliente-destino');

Route::post('crear usuario-destino',['uses'=>'UsuariosController@postUsuarioDestino'])->name('usuario.createUD');

//Finaliza Mantenimiento Usuario-Destino
  });
//Finaliza el mantenimiento de usuarios

//Empieza el mantenimiento de Paises
Route::group(['prefix'=>'paises'/*,'middleware'=>'auth'*/],function(){

Route::get('Inicio Mantenimieto', 'PaisController@getIndexPaises')->name('paises.index');

Route::get('Crear Pais',['uses'=>'PaisController@getPaisCreate','as'=>'paises.crear']);/*<- esto es como un link*/
Route::post('crear',['uses'=>'PaisController@postPaisCreate'])->name('paises.create');

Route::get('editar/{id}',['uses'=>'PaisController@getPaisEditar','as'=>'paises.editar']);/*<- esto es como un link*/
Route::post('edit{id}',['uses'=>'PaisController@getPaisEdit','as'=>'paises.edit']);

/*
Route::post('store-usuario',['uses' => 'UsuariosController@storeUsuario','as' => 'store.usuario']);
Route::post('update-usuario',['uses' => 'UsuariosController@update','as' => 'update.usuario']);*/
  });
//FInaliza el mantenimiento de paises

Route::get('/Usuarios/roles','UsuariosController@byRoles');

//Listado Clientes-Destinos
Route::get('Listado Clientes-Destino',['uses'=>'UsuariosController@getListadoClientesDestino','as'=>'listadoclientdest']);
//Listado Usuarios
Route::get('Listado Usuario',['uses'=>'UsuariosController@getListadoUsuarios','as'=>'listado.usuario']);/*<- esto es como un link*/
//Listado Usuario Pasaporte
Route::get('Listado Pasaporte Usuario',['uses'=>'UsuariosController@getListadoPasaporteUsuarios','as'=>'ListadoUsuPasaporte']);
//Route::post('listado',['uses'=>'UsuariosController@postUsuarioCreate'])->name('usuario.create');
//Finaliza listado de Usuarios

//empieza Destinos

Route::group(['prefix'=>'destino'/*,'middleware'=>'auth'*/],function(){

Route::get('Inicio Destinos', 'DestinoController@getIndexDestino'
)->name('indexDestinos');

Route::get('Create Destinos', 'DestinoController@getDestinosCreate'
)->name('createDesti');

Route::post('crearDestino',['uses'=>'DestinoController@postDestinosCreate'])->name('destino.create');

Route::get('Listado Destinos', 'DestinoController@getListadoDestino'
)->name('ListadoDestinos');
Route::get('Listado Destinos por Fecha', 'DestinoController@getListadoDestinoFechas'
)->name('ListadoDestinosFechas');
Route::get('editar/{id}',['uses'=>'DestinoController@getDestinoEditar','as'=>'destino.editar']);/*<- esto es como un link*/
Route::post('edit{id}',['uses'=>'DestinoController@postDestinoEdit','as'=>'destino.edit']);

});

//Combo pais
Route::get('/viajes/paises','DestinoController@byPaises');
//Combo Destinos
Route::get('/viajes/destinos','DestinoController@byDestinos');
//Finaliza mantenimiento de destinos


Route::get('hola', 'HomeController@index')->name('inicio.Index');

Auth::routes();
