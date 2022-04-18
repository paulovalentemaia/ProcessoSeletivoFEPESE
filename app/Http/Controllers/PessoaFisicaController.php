<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Inscricao;
use Illuminate\Http\Request;
use App\Models\PessoaFisica;

use Validator;

class PessoaFisicaController extends Controller
{
    public function __construct()
    {
    }

    public function store(Request $request)
    {
        //dd($request);
        $validator = Validator::make($request->all(),
            [
                'nome' => 'required',
                'cpf' => 'required',
                'endereco' => 'required',
                'cidade_id' => 'required',
                'estado_id' => 'required',
            ]
        );

        if (!$validator->passes()) {
            return response()->json([
                "message" => $validator->errors()->toArray(),
                'status' => false
            ], 200);

        } else {
            $pessoa = new PessoaFisica();
            $pessoa->nome = $request->nome;
            $pessoa->cpf = $request->cpf;
            $pessoa->endereco = $request->endereco;
            $pessoa->cidade_id = $request->cidade_id;
            $pessoa->estado_id = $request->estado_id;

            if (PessoaFisica::where('cpf', $pessoa->cpf)->first()){
                $isInscrito = PessoaFisica::where('cpf', $pessoa->cpf)->select('id')->first()->id;
                $inscrito = Inscricao::where('pessoa_fisica_id', $isInscrito)->select('id')->first()->id;

                return response()->json([
                    "message" => "Já existe uma inscrição para este concurso!", 'inscricao' => $inscrito
                ], 200);
            }else{
                $salvar = PessoaFisica::createPessoaFisica($pessoa);

                $inscricao = new Inscricao();
                $inscricao->pessoa_fisica_id = $salvar;
                $inscricao->cargo = $request->cargo;
                $inscricao->situacao = 'enviado';

                $salvarInscricao = Inscricao::createInscricao($inscricao);

                if ($salvarInscricao) {
                    return response()->json([
                        "message" => "Sua inscrição foi efetuada com sucesso!", 'inscricao' => $salvarInscricao
                    ], 201);
                }
            }

        }
    }

    public function update(Request $request)
    {
        $this->validate(
            $request,
            [
                'id' => 'required',
                'nome' => 'required',
                'cpf' => 'required',
                'endereco' => 'required',
                'cidade_id' => 'required',
                'estado_id' => 'required',
            ]
        );

        $pessoa = PessoaFisica::find($request->id);
        $pessoa->nome = $request->nome;
        $pessoa->cpf = $request->cpf;
        $pessoa->endereco = $request->endereco;
        $pessoa->cidade_id = $request->cidade_id;
        $pessoa->estado_id = $request->estado_id;

        return json_encode(PessoaFisica::updatePessoaFisica($pessoa));
    }

    public function index(Request $request)
    {
        $this->validate(
            $request,
            [
                'nome' => 'nullable'
            ]
        );

        if (null != $request->nome) {
            $result = PessoaFisica::where('nome', $request->nome)->orderBy('nome')->get();
            return json_encode($result);
        }

        return json_encode(PessoaFisica::orderBy('nome')->get());
    }

    public function show(Request $request, $id)
    {
        return json_encode(PessoaFisica::loadPessoaFisicaById($id));
    }


    public function destroy(Request $request, $id)
    {
        $pessoa = PessoaFisica::find($id);

        return json_encode(PessoaFisica::deletePessoaFisica($pessoa));
    }

}
