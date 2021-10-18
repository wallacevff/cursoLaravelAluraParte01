<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Temporada, Serie};

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada)
    {
        $episodios = $temporada->episodios;
        $serie = Serie::find($temporada->serie_id);
        return view('episodios.index', compact('episodios', 'serie', 'temporada'));
    }
}
