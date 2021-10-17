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
                        <input type="text" class="form-control" value="{{ $serie->nome }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }})">
                                <i class="fas fa-check"></i>
                            </button>
                            @csrf
                        </div>
                    </div>
                </td>
                <td><button class="btn btn-secondary" onclick="toggleInput({{ $serie->id }})"><i class="fas fa-edit"></button></td>
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