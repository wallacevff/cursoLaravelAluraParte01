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
     <b><label for="nome" class='control-label'>Nome da Série</label></b>
     <input id="serie" class="form-control mb-2" type="text" name="nome">
     <button type='submit' class='btn btn-primary'>Adicionar Série</button>
 </form>
 @endsection