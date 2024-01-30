<?php

use App\Http\Controllers\AdmController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Controllers\ServicoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//cliente
Route::post('cliente/store',[ClienteController::class,'store']);
Route::put('cliente/senha',[ClienteController::class,'recuperarSenha']);
Route::post('cliente/nome',[ClienteController::class,'pesquisarPorNome']);
Route::post('cliente/email',[ClienteController::class,'pesquisarPorEmail']);
Route::get('cliente/find/{id}',[ClienteController::class,'pesquisarPorId']);
Route::put('cliente/update',[ClienteController::class,'update']);
Route::get('cliente/all',[ClienteController::class,'retornarTodos']);
Route::delete('cliente/excluir/{id}',[ClienteController::class,'excluir']);

//serviços
Route::post('servico/store',[ServicoController::class, 'Servico']);
Route::post('servico/nome',[ServicoController::class, 'pesquisarPorNome']);
Route::post('servico/descricao',[ServicoController::class, 'pesquisarPorDescricao']);
Route::delete('servico/delete/{id}',[ServicoController::class, 'excluir']);
Route::put('servico/update',[ServicoController::class, 'update']);
route::get('servico/visualizar', [ServicoController::class, 'retornarTodos']);
Route::get('servico/pesquisar/{id}',[ServicoController::class, 'pesquisarPorId']);

//adm
Route::delete('adm/delete/{id}', [ADMController::class, 'excluir']);
Route::put('adm/update', [ADMController::class, 'update']);
Route::post('adm/nome', [ADMController::class, 'pesquisarPorNome']);
Route::put('adm/senha',[AdmController::class,'recuperarSenha']);
Route::put('adm/store',[AdmController::class,'store']);

//profissional
Route::post('profissional/store',[ProfissionalController::class,'store']);
Route::post('profissional/nome',[ProfissionalController::class,'pesquisarPorNome']);
Route::get('profissional/all',[ProfissionalController::class,'retornarTodos']);
Route::get('profissional/find/{id}',[ProfissionalController::class,'pesquisarPorId']);
Route::put('profissional/update', [ProfissionalController::class, 'update']);
Route::delete('profissional/excluir/{id}', [ProfissionalController::class, 'excluir']);
Route::put('profissional/senha',[ProfissionalController::class,'recuperarSenha']);





