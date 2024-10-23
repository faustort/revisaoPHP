<?php
// Verifica se o parâmetro 'id_not' foi passado via GET para editar a notícia
if (isset($_GET['id_not'])) {
    // Inclui a configuração do banco de dados
    include __DIR__ . "/../config/db.php";
    // Recebe o ID da notícia
    $id_not = $_GET['id_not'];
    // Prepara a consulta para selecionar a notícia
    $stmt = $pdo->prepare("SELECT * FROM noticias WHERE id_not = :id_da_noticia");
    $stmt->bindParam(":id_da_noticia", $id_not);
    $stmt->execute();
    // Obtém os dados da notícia
    $noticia = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Verifica se o formulário foi submetido via POST para atualizar a notícia
if (isset($_POST['id_not'])) {
    // Recebe os dados do formulário
    $id_not = $_POST['id_not'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    // Inclui a configuração do banco de dados
    include __DIR__ . "/../config/db.php";
    // Prepara a consulta para atualizar a notícia
    $stmt = $pdo->prepare("UPDATE noticias SET titulo = :titulo, descricao = :descricao WHERE id_not = :id_not");
    $stmt->bindParam(":titulo", $titulo);
    $stmt->bindParam(":descricao", $descricao);
    $stmt->bindParam(":id_not", $id_not);
    $stmt->execute();
?>
    <!-- Redireciona para a página de listagem após a atualização -->
    <script>
        window.location.href = "dashboard.php?pagina=listar_noticias";
    </script>
<?php
}
?>

<!-- Formulário de edição de notícia -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Centraliza o formulário na página -->
        <div class="col-md-6">
            <h1 class="text-center mb-4">Editar Notícia</h1>
            <!-- Início do formulário -->
            <form action="dashboard.php?pagina=editar_noticia" method="post">
                <!-- Campo oculto para o ID da notícia -->
                <input type="hidden" name="id_not" value="<?php echo $noticia['id_not']; ?>">
                <!-- Campo para o título da notícia -->
                <div class="mb-3">
                    <label for="titulo" class="form-label">Digite o título</label>
                    <input class="form-control" type="text" id="titulo" name="titulo" value="<?php echo $noticia['titulo']; ?>" required>
                </div>
                <!-- Campo para a descrição da notícia -->
                <div class="mb-3">
                    <label for="descricao" class="form-label">Digite a descrição</label>
                    <textarea class="form-control" name="descricao" id="descricao" rows="5" required><?php echo $noticia['descricao']; ?></textarea>
                </div>
                <!-- Botão para salvar as alterações -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </div>
            </form>
            <!-- Fim do formulário -->
        </div>
    </div>
</div>