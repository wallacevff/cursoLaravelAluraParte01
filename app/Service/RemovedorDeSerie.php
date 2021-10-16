<?php

namespace App\Service;

use App\{Serie, Temporada, Episodio};
use Illuminate\Support\Facades\DB;

class RemovedorDeSerie
{
    public function RemoverSerie(int $serieId): Serie
    {
        $serie = null;
        $serieAux = null;
        DB::beginTransaction();
        $serie = Serie::findOrFail($serieId);
        $serieAux = $serie;
        $this->removerTemporadas($serie);
        $serie->delete();
        DB::commit();
        return $serieAux;
    }

    private function removerTemporadas(Serie $serie): void
    {
        $serie->temporadas->each(function (Temporada $temporada) {
            $this->removerEpisodios($temporada);
            $temporada->delete();
        });
    }

    private function removerEpisodios(Temporada $temporada): void
    {
        $temporada->episodios->each(function (Episodio $episodio) {
            $episodio->delete();
        });
    }
}
