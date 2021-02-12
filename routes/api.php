<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AlunoControlador;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/usuarios', 'UsuarioControlador@index');
Route::post('/usuarios', 'UsuarioControlador@store');
Route::get('/admins', 'UsuarioControlador@indexAdmin');
Route::get('/biblioteca', 'UsuarioControlador@indexBiblioteca');
Route::delete('usuarios/{perfil}/{id}', 'UsuarioControlador@destroy');
Route::get('usuarios/{perfil}/{id}', 'UsuarioControlador@show');
Route::put('usuarios/{perfil}/{id}', "UsuarioControlador@update");

Route::get('/perfils', 'PerfilControlador@indexJson');
Route::get('/autores', 'AutorControlador@indexJson');

Route::resource('/obras', 'ObraControlador');

Route::resource('/cadastro', 'CadastroControlador');

Route::get('emprestimo/aluno/{cpf}', 'ServicosControlador@buscarAluno');
Route::get('emprestimo/obra/{cod}', 'ServicosControlador@buscarObra');
Route::get('emprestimo/{cpf}', 'ServicosControlador@buscarEmprestimos');
Route::get('renovar/{aluno}/{obra}', 'ServicosControlador@renovarEmprestimo');
Route::post('devolver/{aluno}/{obra}', 'ServicosControlador@devolverEmprestimo');
Route::post('emprestimo', 'ServicosControlador@store');
Route::get('aluno/{id}', 'ServicosControlador@buscarNomeAluno');
Route::get('obra/{id}', 'ServicosControlador@buscarNomeObra');
Route::get('historico/{id}', 'AlunoControlador@getHistorico');
Route::get('abrir_obra/{id}', 'AlunoControlador@abrirObra');
Route::post('renovar', 'AlunoControlador@reservarObra');
