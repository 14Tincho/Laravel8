<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

##########################
######Crud de Marcas######
##########################
// Mostrar
Route::get('/marcas', 'MarcaController@index');
// Agregar
Route::get('/agregarMarca', 'MarcaController@create');
Route::post('/agregarMarca', 'MarcaController@store');
//Modificar
Route::get('/modificarMarca/{id}', 'MarcaController@edit');
Route::patch('/modificarMarca','MarcaController@update');
//Eliminar
Route::get('/eliminarMarca/{id}', 'MarcaController@confirmarBaja');
Route::delete('/eliminarMarca','MarcaController@destroy');

##########################
####Crud de Categorias####
##########################
// Mostrar
Route::get('/categorias', 'CategoriaController@index');
// Agregar
Route::get('/agregarCategoria', 'CategoriaController@create');
Route::post('/agregarCategoria', 'CategoriaController@store');
// Modificar
Route::get('modificarCategoria/{idCategoria}', 'CategoriaController@edit');
Route::patch('/modificarCategoria','CategoriaController@update');
// Eliminar
Route::get('eliminarCategoria/{idCategoria}', 'CategoriaController@confirmarBaja');
Route::delete('eliminarCategoria', 'CategoriaController@destroy');

##########################
#####Crud de Productos####
##########################
// Mostrar
Route::get('/productos','ProductoController@index');
// Agregar
Route::get('/agregarProducto','ProductoController@create');
Route::post('/agregarProducto', 'ProductoController@store');
// Modificar
Route::get('/modificarProducto/{id}','ProductoController@edit');
Route::patch('/modificarProducto', 'ProductoController@update');
// Eliminar
Route::get('/eliminarProducto/{id}','ProductoController@confirmarBaja');
Route::delete('/eliminarProducto', 'ProductoController@destroy');
