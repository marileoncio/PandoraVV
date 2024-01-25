<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteFormrequest;
use App\Models\ClienteModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function store(ClienteFormrequest $request)
    {
        $cliente = ClienteModel::create([
            'nome' => $request->nome,
            'celular' => $request->celular,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'dataNascimento' => $request->dataNascimento,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'pais' => $request->pais,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cep' => $request->cep,
            'complemento' => $request->complemento,
            'senha' => Hash::make($request->senha)
        ]);

        return response()->json([
            "success" => true,
            "message" => "Cliente Cadrastado com sucesso",
            "data" => $cliente

        ], 200);
    }
    public function redefinirSenha(Request $request)
    {
        $Cliente = ClienteModel::where('email', $request->email)->first();
        
        if (!isset($Cliente)) {
            return response()->json([
                'status' => false,
                'message' => "Cliente não encontrado!"
            ]);
        }

        $Cliente->password = Hash::make($Cliente->cpf);
        $Cliente->update();    

        return response()->json([
            'status' => false,
            'message' => "Sua senha foi atualizada"
        ]);
    }
}
