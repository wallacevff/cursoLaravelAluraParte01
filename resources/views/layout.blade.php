<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial scale=1.0, maximum-scale-1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controle de Series</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <script src='/js/functions.js'></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark d-flex justify-content-between">
        <a class="navbar-brand" href="{{route('Series-Listar')}}">Home</a>
        @auth
        <a class="navbar-brand text-danger" href="/sair">Sair</a>
        @endauth

        @guest
        <a class="navbar-brand" href="{{route('Entrar')}}">Entrar</a>
        @endguest
    </nav>
    <div class="container">

        <div class="jumbotron">
            <h1>@yield('cabecalho')</h1>
        </div>
        @yield('conteudo')
    </div>
</body>
