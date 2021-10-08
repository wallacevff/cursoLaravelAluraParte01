<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;

class TemporadasController extends Controller
{
    public function index(int $serieId)
    {
        $serie = Serie::find($serieId);
        $temporadas = Serie::find($serieId)->temporadas;
        return view('Temporadas.index', compact('temporadas', 'serie'));
    }
}
