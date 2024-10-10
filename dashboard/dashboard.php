<?php
session_start();

if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) {
    //
} else {
    ///echo "HACKER DO MAL";
    header("Location: index.php");
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body>
    <?php

    include __DIR__ . "/header.php";

    ?>

    <?php
    $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : '';

    // if ($pagina == "inserir_noticia") {
    //     include __DIR__ . "/inserir_noticia.php";
    // }
    
    switch($pagina){
        case "inserir_noticia":
            include __DIR__ . "/inserir_noticia.php";
            break;
        case "listar_noticias":
            include __DIR__ . "/listar_noticias.php";
            break;
        case "excluir_noticia":
            include __DIR__ . "/excluir_noticia.php";
            break;
        case "editar_noticia":
            include __DIR__ . "/editar_noticia.php";
            break;
        default:
            echo 'Use o menu para navegar';
            break;
    }

    ?>

    <?php
    include __DIR__ . "/footer.php";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>