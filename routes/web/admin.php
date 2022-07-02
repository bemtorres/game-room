<?php

use Illuminate\Support\Facades\Route;

// Route::middleware('auth.admininstrador')->prefix('admin')->namespace('Admin')->group( function () {
// });
Route::middleware('usuario')->group( function () {
  // Route::get('home','Admin\AdminController@index')->name('admin.home');

  // Route::get('tiendas','Admin\TiendaController@index')->name('admin.tienda.index');
  // Route::get('tiendas/create','Admin\TiendaController@create')->name('admin.tienda.create');
  // Route::post('tiendas','Admin\TiendaController@store')->name('admin.tienda.store');
  // Route::get('tiendas/{codigo}','Admin\TiendaController@show')->name('admin.tienda.show');
  // Route::get('tiendas/{codigo}/edit','Admin\TiendaController@edit')->name('admin.tienda.edit');

  // Route::get('tienda/{codigo}/productos','Admin\ProductoController@index')->name('admin.producto.index');
  // Route::get('tienda/{codigo}/productos/create','Admin\ProductoController@create')->name('admin.producto.create');
  // Route::post('tienda/{codigo}/productos','Admin\ProductoController@store')->name('admin.producto.store');

  // Route::get('tienda/{codigo}/productos/{id_producto}','Admin\ProductoController@show')->name('admin.producto.show');
  // Route::get('tienda/{codigo}/productos/{id_producto}/edit','Admin\ProductoController@edit')->name('admin.producto.edit');

  // Route::put('tienda/{codigo}/productos/{id_producto}/edit','Admin\ProductoController@update')->name('admin.producto.update');//vista
  // // Route::get('tienda/{codigo}/productos/{id_producto}/edit','Admin\ProductoController@update')->name('admin.producto.update');//editar

  // Route::get('tienda/{codigo}/productos/{id_producto}/version','Admin\ProductoController@version')->name('admin.producto.version');
  // // Route::post('tienda/{codigo}/productos/{id_producto}/version','Admin\ProductoVersionController@store')->name('admin.producto.version.store');

  // // Route::put('tienda/{codigo}/productos/{id_producto}/version/{id}','Admin\ProductoVersionController@update')->name('admin.producto.version.update');
  // // Route::post('tienda/{codigo}/productos/{id_producto}/version/{id}','Admin\ProductoVersionController@show')->name('admin.producto.version.show');

  // // Route::put('tienda/{codigo}/productos','Admin\ProductoController@delete')->name('admin.producto.delete');



  // Route::get('tienda/{codigo}/categorias','Admin\CategoriaController@index')->name('admin.categoria.index');
  // Route::post('tienda/{codigo}/categorias','Admin\CategoriaController@store')->name('admin.categoria.store');
  // Route::post('tienda/{codigo}/subcategorias','Admin\SubCategoriaController@store')->name('admin.subcategoria.store');


  // Route::post('tienda/{codigo}/subcategorias','Admin\SubCategoriaController@store')->name('admin.subcategoria.store');

  // Route::get('tienda/{codigo}/web_creator','Web\WebController@webCreator')->name('admin.web_creator');
});
