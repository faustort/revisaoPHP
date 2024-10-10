<?php

// perguntar se o usário postou alguma coisa?
// ele fez alguma requisição via método post?
if (isset($_POST['titulo'])) {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $arquivo = $_FILES['imagem'];

    // Caso alguém queira depurar $_FILES
    // echo '<pre>';
    // print_r($arquivo);
    // echo '</pre>';

    $nome_do_arquivo= "";
    
    include_once __DIR__ . "/../config/media.php";
    
    if(!in_array($arquivo['type'], ALLOWED_FILE_TYPES)){
        exit("Tipo de arquivo não suportado");
    }
    if($arquivo['size'] > MAX_FILE_SIZE){
        exit("Arquivo muito grande");
    }

    $destino = UPLOAD_DIR . $arquivo['name'];

    if(move_uploaded_file($arquivo['tmp_name'], $destino)){
        echo "Enviei o arquivo com sucesso!";
        $nome_do_arquivo = $arquivo['name'];
    }

    // eu preciso do banco!!!
    include __DIR__ . '/../config/db.php';

    // agora eu tenho a PDO
    $stmt = $pdo->prepare("INSERT INTO noticias (titulo,descricao,imagem) VALUES (:titulo, :descricao, :imagem)");
    $stmt->bindParam(":titulo", $titulo);
    $stmt->bindParam(":descricao", $descricao);
    $stmt->bindParam(":imagem", $nome_do_arquivo);
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