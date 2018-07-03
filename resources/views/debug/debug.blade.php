@extends('adminlte::page')
@section('title', 'Debug')
@section('content_header')
    <h1>DEBUG</h1>
@stop
@section('content')
    @foreach($var->roles as $role)

        <h1>Nome da role: {{ $role->nome }}</h1>
        @php($permissoes = $role->permissoes)
        @foreach($permissoes as $permissao)
            <h1>Nome da permissão: {{ $permissao->nome }}</h1>
        @endforeach
        <hr>
    @endforeach

@stop