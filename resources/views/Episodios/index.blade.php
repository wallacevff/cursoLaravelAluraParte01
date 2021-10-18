@extends('layout')

@section('cabecalho')
Episodios da temporada {{$temporada->numero}} da série {{$serie->nome}}
@endsection

@section('conteudo')
<form action="/temporadas/{{$temporada->id}}/episodios/assistir" method='post' id='epAssistido'>
    @csrf
    <ul class='list-group'>
        @foreach($episodios as $episodio)
        <li class='list-group-item d-flex f justify-content-between align-items-center'>
            Episódio {{$episodio->numero}}
            <input type="checkbox" onclick="salvaEp()" name="episodios[]" value='{{$episodio->id}}'>
        </li>

        @endforeach
    </ul>
    <button class="btn btn-pink mt-2 mb-2">Salvar</button>
</form>
@endsection