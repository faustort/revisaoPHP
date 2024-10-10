<?php

if (isset($_GET['id_not'])) {

    include __DIR__ . "/../config/db.php";

    $id_not = $_GET['id_not'];

    $stmt = $pdo->prepare("DELETE FROM noticias WHERE id_not = :id_da_noticia");
    $stmt->bindParam(":id_da_noticia", $id_not);
    $stmt->execute();

    // header("Location: dashboard.php?pagina=listar_noticias");
    echo '<a href="dashboard.php?pagina=listar_noticias">Notícia excluída com sucesso, voltar</a>';
}

?>
<script>
    window.location.href = "dashboard.php?pagina=listar_noticias";
</script>