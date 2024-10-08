<?php
session_start();

if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) {
    //
} else {
    ///echo "HACKER DO MAL";
    header("Location: index.php");
}

// perguntar se o usário postou alguma coisa?
// ele fez alguma requisição via método post?
if (isset($_POST['titulo'])) {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];

    // eu preciso do banco!!!
    include __DIR__ . '/../config/db.php';

    // agora eu tenho a PDO
    $stmt = $pdo->prepare("INSERT INTO noticias (titulo,descricao) VALUES (:titulo, :descricao)");
    $stmt->bindParam(":titulo", $titulo);
    $stmt->bindParam(":descricao", $descricao);
    $stmt->execute();
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h1>Inserir notícia</h1>
                <form action="" method="post">
                    <label for="titulo">Titulo da Notícia</label>
                    <input type="text" name="titulo" id="titulo" class="form-control">
                    <label for="descricao">Texto da notícia</label>
                    <textarea name="descricao" id="descricao" class="form-control"></textarea>
                    <input type="submit" value="Inserir" class="btn btn-primary">
                </form>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>