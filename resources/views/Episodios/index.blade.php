@extends('layout')

@section('cabecalho')
Episodios da temporada {{$temporada->numero}} da série {{$serie->nome}}
@endsection

@section('conteudo')
@includeWhen(!empty($mensagem), 'mensagem', ['mensagem'=>$mensagem])

<!--
<ul class='list-group'>
    @foreach($episodios as $episodio)
    <li class='list-group-item d-flex f justify-content-between align-items-center'>
        Episódio {{$episodio->numero}}
        <input type="checkbox" onclick="salvaEp({{$episodio->id}}, {{$episodio->temporada_id}})" name="assistido-{{$episodio->id}}" <?= $episodio->assistido == true ? "checked" : "" ?>>
        @csrf
    </li>
    @endforeach
</ul>
-->
<form action="/temporadas/{{$temporada->id}}/episodios/assistir/" method='post' id='epAssistido'>
    @csrf
    <ul class='list-group'>
        @foreach($episodios as $episodio)
        <li class='list-group-item d-flex f justify-content-between align-items-center'>
            Episódio {{$episodio->numero}}
            @csrf
            <input type="checkbox" name="episodios[]" value="{{$episodio->id}}" {{$episodio->assistido ? 'checked' : ''}}>
        </li>
        @endforeach
    </ul>
    <button class="btn btn-pink mt-2 mb-2">Salvar</button>
</form>




@endsection