<?php

use App\Http\Controllers\AdmController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\ProfissioanalController;
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
Route::post('cliente/store', [ClienteController::class, 'store']);
Route::put('cliente/senha', [ClienteController::class, 'redefinirpassword']);
Route::post('cliente/nome', [ClienteController::class, 'pesquisarPorNome']);
Route::post('cliente/email', [ClienteController::class, 'pesquisarPorEmail']);
Route::get('cliente/find/{id}', [ClienteController::class, 'pesquisarPorId']);
Route::put('cliente/update', [ClienteController::class, 'update']);
Route::get('cliente/all', [ClienteController::class, 'retornarTodos']);
Route::delete('cliente/excluir/{id}', [ClienteController::class, 'excluir']);

//serviços
Route::post('servico/store', [ServicoController::class, 'Servico']);
Route::post('servico/nome', [ServicoController::class, 'pesquisarPorNome']);
Route::post('servico/descricao', [ServicoController::class, 'pesquisarPorDescricao']);
Route::delete('servico/excluir/{id}', [ServicoController::class, 'excluir']);
Route::put('servico/update', [ServicoController::class, 'update']);
route::get('servico/visualizar', [ServicoController::class, 'retornarTodos']);
Route::get('servico/pesquisar/{id}', [ServicoController::class, 'pesquisarPorId']);

//adm
Route::delete('adm/delete/{id}', [ADMController::class, 'excluir']);
Route::put('adm/update', [ADMController::class, 'update']);
Route::post('adm/nome', [ADMController::class, 'pesquisarPorNome']);
Route::put('adm/senha', [AdmController::class, 'redefinirpassword']);
Route::post('adm/store', [AdmController::class, 'store']);

//profissional
Route::post('profissional/store', [ProfissioanalController::class, 'store']);
Route::post('profissional/nome', [ProfissioanalController::class, 'pesquisarPorNome']);
Route::get('profissional/all', [ProfissioanalController::class, 'retornarTodos']);
Route::get('profissional/find/{id}', [ProfissioanalController::class, 'pesquisarPorId']);
Route::put('profissional/update', [ProfissioanalController::class, 'update']);
Route::delete('profissional/excluir/{id}', [ProfissioanalController::class, 'excluir']);
Route::put('profissional/senha', [ProfissioanalController::class, 'redefinirpassword']);

//agenda
Route::post('agenda/agendamento', [AgendaController::class, "criarAgenda"]);
Route::post('agenda/criarhorario', [AgendaController::class, "criarHorarioProfissional"]);
Route::post('agenda/pesquisahorario', [AgendaController::class, 'pesquisarPorDataDoProfissional']);
Route::get('agenda/retornaTodos', [AgendaController::class, 'retornarTudo']);
Route::delete('agenda/delete/{id}', [AgendaController::class, 'excluiAgenda']);
Route::put('agenda/update', [AgendaController::class, 'updateAgenda']);

//pagamento
Route::put('editar/pagamento', [PagamentoController::class,  'updatepagamento']);
Route::post('cadastro/pagamento', [PagamentoController::class, 'cadastroTipoPagamento']);
Route::post('pesquisar/nome/pagamento', [PagamentoController::class, 'pesquisarPorTipoPagamento']);
Route::delete('delete/pagamento/{id}', [PagamentoController::class, 'deletarPagamento']);
Route::get('visualizar/pagamento', [PagamentoController::class, 'visualizarCadastroTipoPagamento']);
Route::get('visualizar/pagamento/habilitado', [PagamentoController::class, 'visualizarCadastroPagamentoHabilitado']);
Route::get('visualizar/pagamento/desabilitado', [PagamentoController::class, 'visualizarCadastroPagamentoDesabilitado']);
