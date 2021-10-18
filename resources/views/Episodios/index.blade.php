@extends('layout')

@section('cabecalho')
Episodios da temporada {{$temporada->numero}} da série {{$serie->nome}}
@endsection

@section('conteudo')

@csrf

<ul class='list-group'>
    @foreach($episodios as $episodio)
    <li class='list-group-item d-flex f justify-content-between align-items-center'>
        Episódio {{$episodio->numero}}
        <form action="/temporadas/{{$temporada->id}}/episodios/assistir/{{$episodio->id}}" method='post' id='epAssistido-{{$episodio->id}}'>
            @csrf
            <input type="checkbox" onclick="salvaEp({{$episodio->id}}, {{$episodio->temporada_id}})" name="assistido-{{$episodio->id}}" <?= $episodio->assistido == true ? "checked" : "" ?>>
        </form>
    </li>
    @endforeach
</ul>

<!--
<ul class='list-group'>
    @foreach($episodios as $episodio)
    <li class='list-group-item d-flex f justify-content-between align-items-center'>
        Episódio {{$episodio->numero}}
        @csrf
        <input type="checkbox" onclick="salvaEp({{$episodio->id}}, {{$episodio->temporada_id}})" name="assistido-{{$episodio->id}}" <?= $episodio->assistido == true ? "checked" : "" ?>>
        </form>
    </li>
    @endforeach
</ul>
-->
<button class="btn btn-pink mt-2 mb-2">Salvar</button>

@endsection