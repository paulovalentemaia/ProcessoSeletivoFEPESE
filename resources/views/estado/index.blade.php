@extends('layouts.main')

@section('title', 'Pesquisar Inscrição')

@section('content')
    <div id="registration-create-container" class="col-md-10 offset-md-1">
        <h1>Estado</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Estado</th>
                <th scope="col">Sigla</th>
                <th scope="col">Editar</th>
                <th scope="col">Deletar</th>
            </tr>
            </thead>
            <tbody>

            @foreach($estados as $estado)
                <tr>
                    <th scope="row">{{$estado->estado_id}}</th>
                    <td>{{$estado->nome}}</td>
                    <td>{{$estado->sigla }}</td>
                    <td>
                        <a href="/estado/editar/{{$estado->estado_id}}" class="btn btn-info">Editar</a>
                    </td>
                    <td>
                        <form action="{{url('/api/estado/deletar')}}/{{$estado->estado_id}}" method="post" id="estado-delete">
                            @csrf
                            @method('patch')
                            <button class="btn btn-danger">Deletar</button>
                        </form>

                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection()
