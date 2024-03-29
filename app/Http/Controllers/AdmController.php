<?php

namespace App\Http\Controllers;

use App\Http\Requests\ADMFormrequest;
use App\Http\Requests\ADMUpdateFormrequest;
use App\Models\ADM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdmController extends Controller
{
    public function store(ADMFormrequest $request)
    {
        $ADM = ADM::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            "success" => true,
            "message" => "ADM Cadrastado com sucesso",
            "data" => $ADM

        ], 200);
    }
    public function redefinirpassword(Request $request)
    {
        $ADM = ADM::where('email', $request->email)->first();
        $ADM = ADM::where('cpf', $request->cpf)->first();

        if (!isset($ADM)) {
            return response()->json([
                'status' => false,
                'message' => "ADM não encontrado!"
            ]);
        }

        $ADM->password = Hash::make($ADM->cpf);
        $ADM->update();

        return response()->json([
            'status' => true,
            'message' => "Sua password foi atualizada"
        ]);
    }

    public function excluir($id)
    {
        $ADM  = ADM::find($id);
        if (!isset($ADM)) {
            return response()->json([
                'status' => false,
                'message' => "ADM não encontrado"
            ]);
        }
        $ADM->delete();

        return response()->json([
            'status' => false,
            'message' => 'ADM excluido com sucesso'
        ]);
    }


    public function pesquisarPorNome(Request $request)
    {
        $ADM =  ADM::where('nome', 'like', '%' . $request->nome . '%')->get();
        if (count($ADM) > 0) {
            return response()->json([
                'status' => true,
                'data' => $ADM
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'não há resultados para pesquisa.'
        ]);
    }


    public function update(ADMUpdateFormrequest $request)
    {
        $ADM  = ADM::find($request->id);

        if (!isset($ADM)) {
            return response()->json([
                'status' => false,
                'message' => "ADM não encontrado"
            ]);
        }

        if (isset($request->nome)) {
            $ADM->nome = $request->nome;
        }
        if (isset($request->celular)) {
            $ADM->celular = $request->celular;
        }
        if (isset($request->email)) {
            $ADM->email = $request->email;
        }
        if (isset($request->cpf)) {
            $ADM->cpf = $request->cpf;
        }
        if (isset($request->dataNascimento)) {
            $ADM->dataNascimento = $request->dataNascimento;
        }
        if (isset($request->cidade)) {
            $ADM->cidade = $request->cidade;
        }
        if (isset($request->estado)) {
            $ADM->estado = $request->estado;
        }
        if (isset($request->pais)) {
            $ADM->pais = $request->pais;
        }
        if (isset($request->rua)) {
            $ADM->rua = $request->rua;
        }
        if (isset($request->numero)) {
            $ADM->numero = $request->numero;
        }
        if (isset($request->bairro)) {
            $ADM->bairro = $request->bairro;
        }
        if (isset($request->cep)) {
            $ADM->cep = $request->cep;
        }
        if (isset($request->complemento)) {
            $ADM->complemento = $request->complemento;
        }
        if (isset($request->password)) {
            $ADM->password = $request->password;
        }

        $ADM->update();

        return response()->json([
            'status' => false,
            'message' => "ADM atualizado"
        ]);
    }
}
