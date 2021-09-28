@extends('layout')

@section('cabecalho')
Séries
@endsection

@section('conteudo')
@if(!empty($mensagem))
<div class="alert alert-success">
    {{$mensagem}}
</div>
@endif

<a href='/series/create' class="btn btn-dark mb-2">Adicionar</a>
<table class="table">
    <thead class='table-brwon'>
        <tr>
            <th>Nome</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        <?php foreach($series as $serie): ?>
        <tr>
            <td>{{$serie->nome}}</td>
            <td><a href='#' class='btn btn-secondary'>Editar</td>
            <td><a href='#' class='btn btn-brown'>Excluir</td>
        </tr>
        <?php endforeach; ?>

    <tbody>
</table>

@endsection