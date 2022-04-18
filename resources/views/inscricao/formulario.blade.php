@extends('layouts.main')

@section('title', 'Inscrição do Candidato')

@section('content')
    <div id="registration-create-container" class="col-md-10 offset-md-1">
        <h1>Inscrição do Candidato</h1>
        <form action="{{url('/api/pessoa_fisica')}}" method="post" id="inscricao-form">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nome">* Nome Completo</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo">
                        <span class="text-danger error-text nome-error"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- Mascarar CPF JS e validar no Front e no Back (LaravelLegends)  -->
                        <label for="cpf">* CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="00000000000">
                        <span class="text-danger error-text cpf-error"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="endereco">* Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Rua, número">
                        <span class="text-danger error-text endereco-error"></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <!-- Fazer select bd Model e Controller-->
                        <label for="estado_id">* Estado</label>
                        <select name="estado_id" id="estado_id" class="form-control">
                            <option value="">Selecione o Estado</option>
                            <option value="1">Santa Catarina</option>
                            <option value="2">Paraná</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <!-- Fazer select bd ajax js Model e Controller -->
                        <label for="cidade_id">* Cidade</label>
                        <select name="cidade_id" id="cidade_id" class="form-control">
                            <option value="">Selecione a Cidade</option>
                            <option value="1">Florianópolis</option>
                            <option value="2">Joinville</option>
                            <option value="3">Blumenau</option>
                            <option value="4">Lages</option>
                            <option value="5">Cascavel</option>
                            <option value="6">Londrina</option>
                            <option value="7">Curitiba</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="endereco">* Cargo</label>
                        <input type="text" class="form-control" id="cargo" name="cargo" value="Desenvolvedor Mobile">
                        <span class="text-danger error-text cargo-error"></span>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-block btn-primary">
                Salvar Inscrição
            </button>
        </form>
    </div>

@endsection()
