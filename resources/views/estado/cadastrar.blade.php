@extends('layouts.main')

@section('title', 'Cadastrar Estado')

@section('content')
    <div id="registration-create-container" class="col-md-10 offset-md-1">

        @if(Request::is('*/editar/*'))
            <h1>Atualizar Estado: {{ $estado->estado_id }} - {{$estado->nome}}</h1>
            <form action="{{url('/api/estado')}}/{{ $estado->estado_id }}" method="post" id="estado-form">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nome">* Nome do Estado</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="{{$estado->nome}}">
                            <span class="text-danger error-text nome-error"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sigla">* Sigla do Estado</label>
                            <input type="text" class="form-control" id="sigla" name="sigla"
                                   value="{{$estado->sigla}}">
                            <span class="text-danger error-text sigla-error"></span>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-block btn-primary">
                    Atualizar Estado
                </button>
            </form>

        @else
            <h1>Cadastrar Estado</h1>
            <form action="{{url('/api/estado')}}" method="post" id="estado-form">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nome">* Nome do Estado</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Estado">
                            <span class="text-danger error-text nome-error"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sigla">* Sigla do Estado</label>
                            <input type="text" class="form-control" id="sigla" name="sigla"
                                   placeholder="Sigla do Estado">
                            <span class="text-danger error-text sigla-error"></span>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-block btn-primary">
                    Cadastrar Estado
                </button>
            </form>
        @endif

    </div>
@endsection()


