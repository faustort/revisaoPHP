<?php

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
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h1>Inserir notícia</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="titulo">Titulo da Notícia</label>
                <input type="text" name="titulo" id="titulo" class="form-control">
                <label for="descricao">Texto da notícia</label>
                <textarea name="descricao" id="descricao" class="form-control"></textarea>
                <input type="file" name="imagem" class="form-control">
                <input type="submit" value="Inserir" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>