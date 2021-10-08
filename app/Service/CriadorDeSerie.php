<?php 
namespace App\Service;
use App\Serie;
use App\Temporada;
use App\Episodio;

class CriadorDeSerie
{
    public function criarSerie(
            string $nomeSerie,
            int $qtdTemporadas, 
            int $epPorTemporada) : Serie
    {
        
        
        $serie = Serie::create(['nome' => $nomeSerie]);
        for ($i = 1; $i <= $qtdTemporadas; $i++){
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            for ($j = 1; $j <= $epPorTemporada; $j++){
                $temporada->episodios()->create(['numero' => $i]);
            }
        }

        return $serie;

    }

}
?>

