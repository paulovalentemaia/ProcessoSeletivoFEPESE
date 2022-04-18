<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Estado;
use App\Models\PessoaFisica;
use Illuminate\Http\Request;
use App\Models\Inscricao;

class InscricaoController extends Controller
{
    public function __construct(){}

    public function pesquisar()
    {
        return view('inscricao.pesquisar');
    }

    public function formulario()
    {
        return view('inscricao.formulario');
    }

    public function comprovante($id)
    {
        $inscricao = Inscricao::findOrFail($id);
        $pessoa = PessoaFisica::where('id', $inscricao->pessoa_fisica_id)->first()->toArray();

        $pessoa['estado_id'] = Estado::where('estado_id', $pessoa['estado_id'])->select('nome')->first()->nome;

        return view('inscricao.comprovante', ['inscricao' => $inscricao, 'pessoa' => $pessoa]);
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
			    'pessoa_fisica_id' => 'required',
			    'cargo' => 'required',
			    'situacao' => 'required'
            ]
        );

	    $inscricao = new Inscricao();
	    $inscricao->pessoa_fisica_id = $request->pessoa_fisica_id;
	    $inscricao->cargo = $request->cargo;
	    $inscricao->situacao = $request->situacao;

        return json_encode(Inscricao::createInscricao($inscricao));
    }

    public function update(Request $request)
    {
        $this->validate(
            $request,
            [
            	'id' => 'required',
			    'pessoa_fisica_id' => 'required',
			    'cargo' => 'required',
			    'situacao' => 'required',
            ]
        );

	    $inscricao = Inscricao::find($request->id);
	    $inscricao->pessoa_fisica_id = $request->pessoa_fisica_id;
	    $inscricao->cargo = $request->cargo;
	    $inscricao->situacao = $request->situacao;

	    return json_encode(Inscricao::updateInscricao($inscricao));
    }

    public function index(Request $request)
    {
    	$this->validate(
            $request,
            [
			    'cargo' => 'nullable'
            ]
        );

        if(null != $request->cargo){
        	$result = Inscricao::where('cargo', $request->cargo)->orderBy('cargo')->get();
        	return json_encode($result);
        }

        return json_encode(Inscricao::orderBy('cargo')->get());
    }

    public function show(Request $request, $id)
    {
        return json_encode(Inscricao::loadInscricaoById($id));
    }

    public function destroy(Request $request, $id)
    {
        $inscricao = Inscricao::find($id);

        return json_encode(Inscricao::deleteInscricao($inscricao));
    }

}
