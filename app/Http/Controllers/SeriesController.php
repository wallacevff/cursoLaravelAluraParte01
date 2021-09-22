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
        $series = [
            'Grey\'s Anatomy',
            'Lost',
            'Agents of SHIELD'
        ];
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

        return view("series.index", compact('series'));
    }
    public function create()
    {
        return view('series.create');
    }
    public function Store(Request $request)
    {
        $nome = $request->get('nome');
        //var_dump($nome);
        $serie = new Serie();
        $serie->nome = $nome;
        $serie->save();
    }
}

?>