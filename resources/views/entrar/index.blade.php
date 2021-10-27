@extends('layout')

@section('cabecalho')
Entrar
@endsection

@section('conteudo')
@include('erros', ['errors' => $errors])

<form method="post">
    @csrf
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required class="form-control">
    </div>
    <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" name="password" id="password" required min="1" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary mt-3">
        Entrar
    </button>
    <a href="#" class="btn btn-secondary mt-3">
        Registrar-se
    </a>
</form>
<!--
<table class="table">
    <tr>
        <td><img src="/images/login1.jpg" alt="Fazer o Login" class="center-block" /></td>
        <td>
            <div class="row-loginForm">
                <div class="col-md-12">
                    <h2>Faça o login para acessar as séries.</h2>
                    <hr />
                    <form method="post" class="form-horizontal" role="form">
                        <h4>Informe o nome do usuário e a senha</h4>

                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <div class="col-md-10">
                                <input type="email" name="email" id="email" required class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Senha</label>

                            <div class="col-md-10">
                                <input type="password" name="password" id="password" required min="1" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">
                                Entrar
                            </button>
                            <a href="#" class="btn btn-secondary mt-3">
                                Registrar-se
                            </a>

                        </div>
                </div>
                </form>
            </div>
            </div>
        </td>
    </tr>
</table>

-->
@endsection