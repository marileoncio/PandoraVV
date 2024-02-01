<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProfissionalFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:120|min:5|',
            'celular' => 'required|max:11|min:10|',
            'email' => 'required|email|max:120|',
            'cpf' => 'required|max:11|min:11',
            'dataNascimento' => 'required',
            'cidade' => 'required|max:120|',
            'estado' => 'required|max:2|min:2',
            'pais' => 'required|max:80|',
            'rua' => 'required|max:120',
            'numero' => 'required|max:10|',
            'bairro' => 'required|max:100|',
            'cep' => 'required|max:8|min:8|',
            'complemento' => '|max:150|',
            'password' => 'required',
            'salario' => 'required'
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }
    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.max' => 'O campo nome deve conter no máximo 120 caracteres',
            'nome.min' => 'O campo nome deve conter no mínimo 5 caracteres',

            'celular.required' => 'o campo celular é obrigatório',
            'celular.max' => 'celular deve conter no máximo 11 caracteres',
            'celular.min' => 'celular deve conter no mínimo 10 caracteres',

            'email.required' => 'o campo e-mail é obrigatório',
            'email.max' => 'e-mail deve conter no máximo 120 caracteres',

            'cpf.required' => 'o campo cpf é obrigatório',
            'cpf.max' => 'cpf deve conter no máximo 11 caracteres',
            'cpf.min' => 'cpf deve conter no mínimo 11 caracteres',

            'dataNascimento.required' => 'o campo dataNascimento é obrigatório',

            'cidade.required' => 'o campo cidade é obrigatório',
            'cidade.max' => 'cidade deve conter no máximo 120 caracteres',

            'estado.required' => 'o campo estado é obrigatório',
            'estado.max' => 'estado deve conter no máximo 2 caracteres',
            'estado.min' => 'estado deve conter no mínimo 2 caracteres',

            'pais.required' => 'o campo pais é obrigatório',
            'pais.max' => 'pais deve conter no máximo 80 caracteres',

            'rua.required' => 'o campo rua é obrigatório',
            'rua.max' => 'rua deve conter no máximo 120 caracteres',

            'numero.required' => 'o campo numero é obrigatório',
            'numero.max' => 'numero deve conter no máximo 10 caracteres',

            'bairro.required' => 'o campo bairro é obrigatório',
            'bairro.max' => 'bairro deve conter no máximo 100 caracteres',

            'cep.required' => 'o campo cep é obrigatório',
            'cep.max' => 'cep deve conter no máximo 8 caracteres',
            'cep.min' => 'cep deve conter no mínimo 8 caracteres',

            'complemento.max' => 'complemento deve conter no máximo 150 caracteres',

            'password.required' => 'o campo password é obrigatório',

            'salario.required' => 'o campo salário é obrigatório',


        ];
    }
};
