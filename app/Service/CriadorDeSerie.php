<?php

namespace App\Service;

use App\Serie;
use App\Temporada;
use App\Episodio;
use CreateEpisodiosTable;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{
    public function criarSerie(
        string $nomeSerie,
        int $qtdTemporadas,
        int $epPorTemporada
    ): Serie {

        DB::beginTransaction();
        $serie = Serie::create(['nome' => $nomeSerie]);
        $this->createTemporadas($qtdTemporadas, $epPorTemporada, $serie);
        DB::commit();
        return $serie;
    }

    private function createTemporadas(int $temporadas, int $epPorTemporada, Serie $serie): void
    {

        for ($i = 1; $i <= $temporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            $this->createEpisodios($epPorTemporada, $temporada);
        }
    }

    private function createEpisodios(int $epPorTemporada, Temporada $temporada): void
    {
        for ($i = 1; $i <= $epPorTemporada; $i++) {
            $temporada->episodios()->create(['numero' => $i]);
        }
        /*
        static $i = 1;
        if ($i > 1) {
            $temporada->episodios()->create(['numero' => $i]);
            $i++;
            $this->createEpisodios($i, $temporada);
        } else {
            $temporada->episodios()->create(['numero' => $i]);
        }
        */
    }
}
