@extends('layouts.main')

@section('title', 'Pesquisar Inscrição')

@section('content')
    <div id="registration-create-container" class="col-md-10 offset-md-1">
        <h1>Pesquisar Inscrição</h1>
        <form action="/" method="get">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- Fazer Definir Unique CPF DB -->
                        <label for="cpf">Pesquisar por CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="00000000000">
                    </div>
                </div>
            </div>

            <input type="submit" class="btn btn-primary" value="Pesquisar Inscrição">
        </form>
    </div>

@endsection()
