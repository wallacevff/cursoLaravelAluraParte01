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

<a href="{{route('Series-Adicionar')}}" class="btn btn-dark mb-2">Adicionar</a>
<table class="table">
    <thead class='table-brwon'>
        <tr>
            <th>Nome</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($series as $serie) : ?>
            <tr>
                <td>
                    <span id="nome-serie-{{ $serie->id }}">{{$serie->nome}}</span>
                    <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
                        <input type="text" class="form-control"
                    </div>
                </td>
                <td><a href='/series/editar/{{$serie->id}}' class='btn btn-secondary'><i class="fas fa-edit"></i></td>
                <td><a href='/series/{{$serie->id}}/temporadas' class='btn btn-info'><i class="fas fa-external-link-alt"></i></a>
                <td>
                    <form method="post" action="/series/{{$serie->id}}" onsubmit="return confirm('Tem certeza que deseja remover {{addslashes($serie->nome)}}?')">
                        @csrf
                        @method('DELETE')
                        <button class='btn btn-danger'><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
                <!-- <td><button class='btn btn-brown' action="excluir" method="get">Excluir</button></td> -->
            </tr>
        <?php endforeach; ?>

    <tbody>
</table>

@endsection