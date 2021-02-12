<?php

use App\User;
use App\Admin;
use App\Biblioteca;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index') -> name('home');
Route::get('/admin', 'AdminController@index') -> name('admin.dashbord'); 
Route::get('/biblioteca', 'BibliotecaControlador@index') -> name('home.bb');
Route::get('/biblioteca/login', 'Auth\BibliotecaLoginControlador@index') -> name('bb.login');
Route::post('/biblioteca/login', 'Auth\BibliotecaLoginControlador@login') -> name('bb.login.submit');

Route::get('/admin/login', 'Auth\AdminLoginController@index') -> name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login') -> name('admin.login.submit');

Route::get('/usuarios', 'UsuarioControlador@indexView');

Route::get('/obras', 'ObraControlador@indexView');
Route::get('/cadastros', 'CadastroControlador@indexView');

Route::get('/servicos', 'ServicosControlador@index');
Route::get('/historico', 'HomeController@indexHistorico');
Route::get('/renovar', 'HomeController@indexRenovar');
Route::get('/reserva', 'HomeController@indexReserva');