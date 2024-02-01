<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoFormrequest;
use App\Http\Requests\ServicoUpdateFormrequest;
use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function Servico(ServicoFormrequest $request)
    {
        $servico = Servico::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'duracao' => $request->duracao,
            'preco' => $request->preco,

        ]);
        return response()->json([
            'sucess' => true,
            'message' => "Servico Cadastrado com sucesso",
            'data' => $servico
        ]);
    }
    public function pesquisarPorNome(Request $request)
    {
        $servico = Servico::where('nome', 'like', '%' . $request->nome . '%')->get();

        if (count($servico) > 0) {

            return response()->json([
                'status' => true,
                'data' => $servico
            ]);
        }


        return response()->json([
            'status' => false,
            'message' => 'Não há resultados para pesquisa.'
        ]);
    }

    public function pesquisarPoDescricao(Request $request)
    {
        $servico = Servico::where('descricao', 'like', '%' . $request->descricao . '%')->get();

        if (count($servico) > 0) {

            return response()->json([
                'status' => true,
                'data' => $servico
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Não há resultados para pesquisa.'
        ]);
    }
    public function retornarTodos()
    {
        $servico = Servico::all();
        return response()->json([
            'status' => true,
            'data' => $servico
        ]);
    }

    public function pesquisarPorId($id)
    {
        $servico = servico::find($id);
        if ($servico == null) {
            return response()->json([
                'status' => false,
                'message' => "Serviço não encontrado"
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $servico
        ]);
    }

    public function excluir($id)
    {

        $servico = Servico::find($id);

        if (!isset($servico)) {
            return response()->json([
                'status' => false,
                'message' => "Serviço não encontrado"
            ]);
        }

        $servico->delete();

        return response()->json([
            'status' => true,
            'message' => "serviço excluído com sucesso"
        ]);
    }

    public function update(ServicoUpdateFormrequest $request)
    {
        $servico = Servico::find($request->id);

        if (!isset($servico)) {
            return response()->json([
                'status' => false,
                'message' => "Serviço não encontrado"
            ]);
        }

        if (isset($request->nome)) {
            $servico->nome = $request->nome;
        }
        if (isset($request->descricao)) {
            $servico->descricao = $request->descricao;
        }
        if (isset($request->duracao)) {
            $servico->duracao = $request->duracao;
        }
        if (isset($request->preco)) {
            $servico->preco = $request->preco;
        }

        $servico->update();

        return response()->json([
            'status' => false,
            'message' => "Serviço atualizado"
        ]);
    }
}
