<?php

use App\Http\Controllers\AdmController;
use App\Http\Controllers\ClienteController;
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


//serviços
Route::post('servico/store',[ServicoController::class, 'Servico']);
Route::post('servico/nome',[ServicoController::class, 'pesquisarPorNome']);
Route::post('servico/descricao',[ServicoController::class, 'pesquisarPoDescricao']);
Route::delete('servico/delete/{id}',[ServicoController::class, 'excluir']);
Route::put('servico/update',[ServicoController::class, 'update']);
route::get('servico/visualizar', [ServicoController::class, 'retornarTodos']);
Route::get('servico/pesquisar/{id}',[ServicoController::class, 'pesquisarPorId']);

Route::put('adm/senha',[AdmController::class,'recuperarSenha']);

