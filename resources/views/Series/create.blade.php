 @extends('layout')

 @section('cabecalho')
 Cadastrar Séries
 @endsection

 @section('conteudo')
 <form class="form-group" method='post'>
     <b><label for="nome" class='control-label'>Nome da Série</label></b>
     <input id="serie" class="form-control mb-2" type="text" name="nome">
     <button type='submit' class='btn btn-primary'>Adicionar Série</button>
 </form>
 @endsection