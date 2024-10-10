<?php

if (isset($_GET['id_not'])) {
    include __DIR__ . "/../config/db.php";
    $id_not = $_GET['id_not'];
    $stmt = $pdo->prepare("SELECT * FROM noticias WHERE id_not = :id_da_noticia");
    $stmt->bindParam(":id_da_noticia", $id_not);
    $stmt->execute();
    $noticia = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['id_not'])) {
    $id_not = $_POST['id_not'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    include __DIR__ . "/../config/db.php";
    $stmt = $pdo->prepare("UPDATE noticias SET titulo = :titulo, descricao = :descricao WHERE id_not = :id_not");
    $stmt->bindParam(":titulo", $titulo);
    $stmt->bindParam(":descricao", $descricao);
    $stmt->bindParam(":id_not", $id_not);
    $stmt->execute();
?>
    <script>
        window.location.href = "dashboard.php?pagina=listar_noticias";
    </script>
<?php
}

?>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h1>Editar Notícia</h1>
            <form action="dashboard.php?pagina=editar_noticia" method="post">
                <input type="hidden" name="id_not" value="<?php echo $noticia['id_not']; ?>">
                <label for="titulo">Digite o título</label>
                <input class="form-control" type="text" id="titulo" name="titulo" value="<?php echo $noticia['titulo']; ?>">
                <label for="descricao">Digite a descrição</label>
                <textarea class="form-control" name="descricao" id="descricao"><?php echo $noticia['descricao']; ?></textarea>
            </form>
        </div>
    </div>
</div>