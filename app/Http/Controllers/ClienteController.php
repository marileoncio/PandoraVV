<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteFormrequest;
use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function store(ClienteFormrequest $request)
    {
        $cliente = Clientes::create([
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
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            "success" => true,
            "message" => "Cliente Cadrastado com sucesso",
            "data" => $cliente

        ], 200);
    }
    public function redefinirpassword(Request $request)
    {
        $Cliente = Clientes::where('email', $request->email)->first();
        $Cliente = Clientes::where('cpf', $request->cpf)->first();


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
            'message' => "Sua password foi atualizada"
        ]);
    }

    public function pesquisarPorNome(Request $request)
    {
        $cliente = Clientes::where('nome', 'like', '%' . $request->nome . '%')->get();
        if (count($cliente) > 0) {
            return response()->json([
                'status' => true,
                'data' => $cliente
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Nenhum cliente encontrado"
            ]);
        }
    }

    public function pesquisarEmail(Request $request)
    {
        $cliente = Clientes::where('email', 'like', '%' . $request->email . '%')->get();
        if (count($cliente) > 0) {
            return response()->json([
                'status' => true,
                'data' => $cliente
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Nenhum e-mail encontrado"
            ]);
        }
    }

    public function retornarTodos()
    {
        $cliente = Clientes::all();
        return response()->json([
            'status' => true,
            'data' => $cliente
        ]);
    }

    public function pesquisarPorId($id)
    {
        $cliente = Clientes::find($id);
        if ($cliente == null) {
            return response()->json([
                'status' => false,
                'message' => "Cliente não encontrado"
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $cliente
        ]);
    }



    public function update(Request $request)
    {
        $cliente = Clientes::find($request->id);

        if (!isset($cliente)) {
            return response()->json([
                'status' => false,
                'message' => 'Cliente não atualizado'
            ]);
        }


        if (isset($request->nome)) {
            $cliente->nome = $request->nome;
        }
        if (isset($request->celular)) {
            $cliente->celular = $request->celular;
        }
        if (isset($request->email)) {
            $cliente->email = $request->email;
        }
        if (isset($request->cpf)) {
            $cliente->cpf = $request->cpf;
        }
        if (isset($request->dataNascimento)) {
            $cliente->dataNascimento = $request->dataNascimento;
        }
        if (isset($request->cidade)) {
            $cliente->cidade = $request->cidade;
        }
        if (isset($request->estado)) {
            $cliente->estado = $request->estado;
        }
        if (isset($request->pais)) {
            $cliente->pais = $request->pais;
        }
        if (isset($request->rua)) {
            $cliente->rua = $request->rua;
        }
        if (isset($request->numero)) {
            $cliente->numero = $request->numero;
        }
        if (isset($request->bairro)) {
            $cliente->bairro = $request->bairro;
        }
        if (isset($request->cep)) {
            $cliente->cep = $request->cep;
        }
        if (isset($request->complemento)) {
            $cliente->complemento = $request->complemento;
        }
        if (isset($request->password)) {
            $cliente->password = $request->password;
        }

        $cliente->update();
        return response()->json([
            'status' => true,
            'message' => 'Cliente atualizado.'
        ]);
    }

    public function excluir($id)
    {
        $cliente = Clientes::find($id);

        if (!isset($cliente)) {
            return response()->json([
                'status' => false,
                'message' => "Cliente não encontrado"

            ]);
        }

        $cliente->delete();
        return response()->json([
            'status' => true,
            'message' => "Cliente excluído com sucesso"
        ]);
    }
}
