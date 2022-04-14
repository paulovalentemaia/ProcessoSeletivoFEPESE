@extends('layouts.main')

@section('title', 'Pesquisar Inscrição')

@section('content')
    <div id="registration-create-container" class="col-md-10 offset-md-1">
        <h1>Estado</h1>
        @foreach($estados as $estado)
            <p>{{$estado->nome}} - {{$estado->sigla }}</p>
        @endforeach

    </div>

@endsection()
