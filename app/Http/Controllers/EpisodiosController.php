<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Temporada, Serie, Episodio};

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada, Request $request)
    {
        $episodios = $temporada->episodios;
        $serie = Serie::find($temporada->serie_id);
        $mensagem = $request->session()->get('mensagem');
        return view('episodios.index', compact('episodios', 'serie', 'temporada', 'mensagem'));
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

    public function assistir(Temporada $temporada, Request $request)
    {
        $episodiosAssistidos = isset($request->episodios) ? $request->episodios : array();

        $temporada->episodios->each(function (Episodio $episodio)
        use ($episodiosAssistidos) {
            $episodio->assistido = in_array(
                $episodio->id,
                $episodiosAssistidos
            );
        });
        $temporada->push();
        $request->session()->flash('mensagem', 'Episodios marcados como assistidos');
        return redirect()->back();
    }
}
