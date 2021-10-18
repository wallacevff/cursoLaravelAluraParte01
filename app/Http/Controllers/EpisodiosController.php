<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Temporada, Serie, Episodio};

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada)
    {
        $episodios = $temporada->episodios;
        $serie = Serie::find($temporada->serie_id);
        return view('episodios.index', compact('episodios', 'serie', 'temporada'));
    }

    public function assistirEpisodio(Request $request)
    {
        $ep = Episodio::find($request->episodioId);
        // $temp = $ep->temporada_id;
        var_dump($request);

        // var_dump($ep);
        if (!(isset($ep->assistido)) || $ep->assistido == false) {
            $ep->assistido = true;
        } else {
            $ep->assistido = false;
        }
        //  $episodio->assistido = true;
        $ep->save();
        // return redirect("/temporadas/" . $temp . "/episodios");
    }
}
