<?php
// Verifica se o formulário foi enviado via método POST
if (isset($_POST['titulo'])) {
    // Recebe os dados do formulário
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $arquivo = $_FILES['imagem'];

    // Inicializa o nome do arquivo como vazio
    $nome_do_arquivo = "";

    // Inclui as configurações de mídia (constantes, diretórios, tipos permitidos)
    include_once __DIR__ . "/../config/media.php";

    // Verifica se o tipo de arquivo enviado é permitido
    if (!in_array($arquivo['type'], ALLOWED_FILE_TYPES)) {
        exit("Tipo de arquivo não suportado");
    }
    // Verifica se o tamanho do arquivo não excede o máximo permitido
    if ($arquivo['size'] > MAX_FILE_SIZE) {
        exit("Arquivo muito grande");
    }

    // Define o caminho de destino para o upload do arquivo
    $destino = UPLOAD_DIR . $arquivo['name'];

    // Move o arquivo temporário para o destino final
    if (move_uploaded_file($arquivo['tmp_name'], $destino)) {
        echo "Enviei o arquivo com sucesso!";
        $nome_do_arquivo = $arquivo['name'];
    }

    // Inclui a configuração do banco de dados
    include __DIR__ . '/../config/db.php';

    // Prepara a consulta SQL para inserir os dados na tabela 'noticias'
    $stmt = $pdo->prepare("INSERT INTO noticias (titulo, descricao, imagem) VALUES (:titulo, :descricao, :imagem)");
    // Vincula os parâmetros da consulta às variáveis
    $stmt->bindParam(":titulo", $titulo);
    $stmt->bindParam(":descricao", $descricao);
    $stmt->bindParam(":imagem", $nome_do_arquivo);
    // Executa a consulta
    $stmt->execute();
}
?>

<!-- Formulário para inserir notícia -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Centraliza o formulário na página -->
        <div class="col-md-6">
            <h1 class="text-center mb-4">Inserir Notícia</h1>
            <!-- Início do formulário -->
            <form action="" method="post" enctype="multipart/form-data">
                <!-- Campo para o título da notícia -->
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título da Notícia</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" required>
                </div>
                <!-- Campo para o texto da notícia -->
                <div class="mb-3">
                    <label for="descricao" class="form-label">Texto da Notícia</label>
                    <textarea name="descricao" id="descricao" class="form-control" rows="5" required></textarea>
                </div>
                <!-- Campo para upload da imagem -->
                <div class="mb-3">
                    <label for="imagem" class="form-label">Imagem</label>
                    <input type="file" name="imagem" id="imagem" class="form-control" required>
                </div>
                <!-- Botão para enviar o formulário -->
                <div class="d-grid">
                    <input type="submit" value="Inserir" class="btn btn-primary">
                </div>
            </form>
            <!-- Fim do formulário -->
        </div>
    </div>
</div>
