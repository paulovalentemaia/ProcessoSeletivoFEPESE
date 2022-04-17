<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;

use Validator;

class EstadoController extends Controller
{
    public function index()
    {
        $estados = Estado::get();

        //return json_encode($estados);
        return view('estado.index', ['estados' => $estados]);
    }

    public function cadastrar()
    {
        return view('estado.cadastrar');
    }

    public function store(Request $request)
    {
        //Valida os campos obrigatórios e se já existe o nome do estado salvo
        $validator = Validator::make($request->all(), [
            'nome' => 'required|unique:estado',
            'sigla' => 'required|unique:estado'
        ]);

        if (!$validator->passes()) {
            return response()->json([
                "message" => $validator->errors()->toArray(), 'status' => false
            ], 200);

        } else{
            $estado = new Estado;
            $estado->nome = $request->nome;
            $estado->sigla = $request->sigla;

            $salvar = Estado::createEstado($estado);

            if($salvar) {
                return response()->json([
                    "message" => "Estado salvo com sucesso"
                ], 201);
            }
        }
    }

    public function editar($id){
        $estado = Estado::where('estado_id', $id)->first();

        return view('estado.cadastrar', ['estado' => $estado]);
    }

    public function update($id, Request $request)
    {
        //Valida os campos obrigatórios
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'sigla' => 'required'
        ]);

        if (!$validator->passes()) {
            return response()->json([
                "message" => $validator->errors()->toArray(), 'status' => false
            ], 200);

        } else{
            $estado = Estado::findOrFail($id);

            $estado->nome = $request->nome;
            $estado->sigla = $request->sigla;

            $editar = Estado::updateEstado($estado);

            if($editar) {
                return response()->json([
                    "message" => "Estado atualizado com sucesso"
                ], 201);
            }
        }

    }

    public function destroy($id)
    {
        $estado = Estado::findOrFail($id);

        $deletar = Estado::deleteEstado($estado);

        if($deletar) {
            return response()->json([
                "message" => "Estado deletado com sucesso"
            ], 200);
        }
    }

}

