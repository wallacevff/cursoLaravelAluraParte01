<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Serie;
use App\Http\Requests\SeriesFormsRequest;
use App\Service\CriadorDeSerie;

class SeriesController extends Controller
{
    public function listarSeries(Request $request){
        //echo $request->url();
        //var_dump($request->query());
        //exit();
        $series = Serie::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');
        //var_dump($series);
    /*
        $html = "<ul>";
        $html .= "</ul>";
        foreach ($series as $serie){
            $html .= "<li>" . $serie . "</li>";
            
        }
        $html .= "</ul>";

        echo $html;
        */
        //return view("series.index", ['series' => $series]);

        return view("series.index", compact('series', 'mensagem'));
    }
    public function create()
    {
        return view('series.create');
    }
    public function Store(SeriesFormsRequest $request, CriadorDeSerie $criadorDeSerie)
    {
        //$nome = $request->get('nome');
        //var_dump($nome);
        //$serie = new Serie();
       // $serie->nome = $nome;
        
       $serie = $criadorDeSerie->criarSerie(
           $request->nome, 
           $request->qtd_temporadas, 
           $request->ep_por_temporada
        );      

       
        $request->session()->flash(
            'mensagem', "Série {$serie->id} e suas temporadas e episódios criados com sucesso: {$serie->nome}"
        );
       // $serie->save();
        //echo "Série id:   {$serie->id}   criada:   {$serie->nome}";
        return redirect()->route('Series-Listar');
        
    }

    public function destroy(Request $request)
    {
        $serie = Serie::findOrFail($request->id);
        $serie->temporadas->each(function (Temporada $temporada){
                $temporada->episodios->each(function(Episodio $episodio){
                        $episodio->delete();
                    }
                );
                $temporada->delete();
            }
        );
        $serie->delete();
        $request->session()->flash(
            'mensagem', "Série {$serie->id} excluída com sucesso: {$serie->nome}"
        );
        Serie::destroy($request->id);
        return redirect()->route('Series-Listar');
    }

    public function editar(Request $request)
    {
        $serie = Serie::findOrFail($request->id);
        return view("series.editar/{{$serie}}");
    }
}

?>