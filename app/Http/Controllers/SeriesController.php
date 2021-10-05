<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Serie;

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
    public function Store(Request $request)
    {
        //$nome = $request->get('nome');
        //var_dump($nome);
        //$serie = new Serie();
       // $serie->nome = $nome;

       $request->validate([
           'nome' => 'required|min:2'
       ]);

        $serie = Serie::create($request->all());
        $request->session()->flash(
            'mensagem', "Série {$serie->id} criada com sucesso: {$serie->nome}"
        );
       // $serie->save();
        //echo "Série id:   {$serie->id}   criada:   {$serie->nome}";
        return redirect()->route('Series-Listar');
        
    }

    public function destroy(Request $request)
    {
        $serie = Serie::findOrFail($request->id);
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