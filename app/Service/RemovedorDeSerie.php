<?php
namespace App\Service;
use App\{Serie, Temporada, Episodio};

class RemovedorDeSerie{
    public function RemoverSerie(int $serieId): Serie {
        $serie = Serie::findOrFail($serieId);
        $serieAux = $serie;
        $serie->temporadas->each(function (Temporada $temporada) {
            $temporada->episodios->each(function (Episodio $episodio){
                $episodio->delete();
        });
        $temporada->delete();
    });
        $serie->delete();
        return $serieAux;
    }
    
}
 
?>