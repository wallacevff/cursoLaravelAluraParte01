 @extends('layout')

 @section('cabecalho')
 Cadastrar Séries
 @endsection

 @section('conteudo')
 @if ($errors->any())
 <div class="alert alert-danger">
     <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}
         </li>
         @endforeach
     </ul>
 </div>
 @endif

 <form class="form-group" method='post'>
     @csrf
     <div class='row mb-2'>
         <div class="col col-8">
             <b><label for="nome" class='control-label'>Nome da Série</label></b>
             <input id="serie" class="form-control" type="text" name="nome">
             
         </div>
         <div class="col col-2">
             <b><label for="qtd_temporadas" class='control-label'>Nro. de temporadas</label></b>
             <input id="qtd_temporadas" class="form-control" type="number" name="qtd_temporadas">
         </div>
         <div class="col col-2">
             <b><label for="ep_por_temporada" class='control-label'>Ep. por temporada</label></b>
             <input id="ep_por_temporada" class="form-control" type="number" name="ep_por_temporada">
         </div>
     </div>
     <button type='submit' class='btn btn-primary'>Adicionar Série</button>
     
 </form>
 @endsection