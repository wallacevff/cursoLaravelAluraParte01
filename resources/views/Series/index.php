<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial scale=1.0, maximum-scale-1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Controle de Series</title>
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    </head>
<body>   
    <div class="container">
    <div class="jumbotron">
        <h1>Séries</h1>
    </div>
    <a href='#' class="btn btn-dark mb-2" type="button">Adicionar</a>
        <ul class="list-group">
            <?php foreach($series as $serie): ?>
            <li class="list-group-item"><?= $serie; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>