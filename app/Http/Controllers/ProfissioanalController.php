<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfissionalFormRequest;
use App\Models\Profissional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfissioanalController extends Controller
{
    public function store(ProfissionalFormRequest $request)
    {
        $Profissional = Profissional::create([
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
            'salario' => $request->salario,
            'password' => Hash::make($request->password)
        ]);
        return response()->json([
            "success" => true,
            "message" => "Profissional cadrastado com sucesso",
            "data" => $Profissional

        ], 200);
    }
    public function pesquisarPorNome(Request $request)
    {
        $Profissional = Profissional::where('nome', 'like', '%' . $request->nome . '%')->get();
        if (count($Profissional) > 0) {
            return response()->json([
                'status' => true,
                'data' => $Profissional
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Nenhum prossional encontrado"
            ]);
        }
    }

    public function update(Request $request)
    {
        $Profissional = Profissional::find($request->id);

        if (!isset($Profissional)) {
            return response()->json([
                'status' => false,
                'message' => 'Profissional não atualizado'
            ]);
        }

        if (isset($request->nome)) {
            $Profissional->nome = $request->nome;
        }
        if (isset($request->celular)) {
            $Profissional->celular = $request->celular;
        }
        if (isset($request->email)) {
            $Profissional->email = $request->email;
        }
        if (isset($request->cpf)) {
            $Profissional->cpf = $request->cpf;
        }
        if (isset($request->dataNascimento)) {
            $Profissional->dataNascimento = $request->dataNascimento;
        }
        if (isset($request->cidade)) {
            $Profissional->cidade = $request->cidade;
        }
        if (isset($request->estado)) {
            $Profissional->estado = $request->estado;
        }
        if (isset($request->pais)) {
            $Profissional->pais = $request->pais;
        }
        if (isset($request->rua)) {
            $Profissional->rua = $request->rua;
        }
        if (isset($request->numero)) {
            $Profissional->numero = $request->numero;
        }
        if (isset($request->bairro)) {
            $Profissional->bairro = $request->bairro;
        }
        if (isset($request->cep)) {
            $Profissional->cep = $request->cep;
        }
        if (isset($request->complemento)) {
            $Profissional->complemento = $request->complemento;
        }
        if (isset($request->password)) {
            $Profissional->password = $request->password;
        }
        if (isset($request->salario)) {
            $Profissional->salario = $request->salario;
        }

        $Profissional->update();

        return response()->json([
            'status' => true,
            'message' => 'Profissional atualizado.'
        ]);
    }

    public function retornarTodos()
    {
        $Profissional = Profissional::all();
        return response()->json([
            'status' => true,
            'data' => $Profissional
        ]);
    }

    public function pesquisarPorId($id)
    {
        $Profissional = Profissional::find($id);
        if ($Profissional == null) {
            return response()->json([
                'status' => false,
                'message' => "Profissional não encontrado"
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $Profissional
        ]);
    }
    public function redefinirpassword(Request $request)
    {
        $Profissional =  Profissional::where('email', $request->email)->first();

        if (!isset($Profissional)) {
            return response()->json([
                'status' => false,
                'message' => "Profissional não encontrado"
            ]);
        }

        $Profissional->password = Hash::make($Profissional->cpf);
        $Profissional->update();

        return response()->json([
            'status' => false,
            'message' => "Sua password foi atualizada"
        ]);
    }
    public function excluir($id)
    {
        $Profissional = Profissional::find($id);

        if (!isset($Profissional)) {
            return response()->json([
                'status' => false,
                'message' => "Profissional não encontrado"

            ]);
        }

        $Profissional->delete();
        return response()->json([
            'status' => true,
            'message' => "Profissional excluído com sucesso"
        ]);
    }
}
