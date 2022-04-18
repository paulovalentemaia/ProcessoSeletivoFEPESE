@extends('layouts.main')

@section('title', 'Comprovante de Inscrição')

@section('content')

    <div id="registration-create-container" class="col-md-10 offset-md-1">
        <h1>Comprovante de Inscrição</h1>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nome">Inscrição</label>
                    <input type="text" class="form-control" value="{{ $inscricao->id }}" disabled="disabled">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nome">Situação</label>
                    <input type="text" class="form-control" value="{{ $inscricao->situacao }}" disabled="disabled">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nome"> Data Inscrição</label>
                    <input type="text" class="form-control"
                           value="{{ @date('d/m/Y H:m:s', strtotime($inscricao->created_at)) }}" disabled="disabled">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome"> Nome Completo</label>
                    <input type="text" class="form-control" value="{{ $pessoa['nome'] }}" disabled="disabled">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <!-- Mascarar CPF JS e validar no Front e no Back (LaravelLegends)  -->
                    <label for="cpf"> CPF</label>
                    <input type="text" class="form-control" value="{{ $pessoa['cpf'] }}" disabled="disabled">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="endereco"> Endereço</label>
                    <input type="text" class="form-control" value="{{ $pessoa['endereco'] }}" disabled="disabled">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nome"> Cidade</label>
                    <input type="text" class="form-control" value="{{ $pessoa['cidade_id'] }}" disabled="disabled">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nome"> Estado</label>
                    <input type="text" class="form-control" value="{{ $pessoa['estado_id'] }}" disabled="disabled">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nome">Cargo</label>
                    <input type="text" class="form-control" value="{{ $inscricao->cargo }}" disabled="disabled">
                </div>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-12">
                <div class="m-2">
                    <label class="form-label"><small>Emissão: <?= date('d/m/Y H:i:s') ?></small></label>
                </div>
            </div>
        </div>

        <button class="btn btn-block btn-primary" onclick="print()">
            Imprimir Comprovante
        </button>

    </div>

@endsection
