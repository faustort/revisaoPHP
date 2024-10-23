<?php
// Inicia a sessão para armazenar informações entre as páginas
session_start();

// Verifica se o usuário está logado
if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) {
    // Usuário está logado, pode acessar a página
} else {
    // Redireciona para a página de login se não estiver logado
    header("Location: index.php");
    exit(); // Encerra o script após o redirecionamento
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Configurações de metadados da página -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Importa o CSS do Bootstrap para estilos prontos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Importa ícones do Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body>
    <?php
    // Inclui o arquivo de cabeçalho
    include __DIR__ . "/header.php";
    ?>

    <!-- Container centralizado -->
    <div class="container">
        <?php
        // Obtém a página solicitada via GET, se não houver, fica vazia
        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : '';

        // Seleciona a página a ser incluída com base no valor de $pagina
        switch ($pagina) {
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
                // Mensagem padrão quando nenhuma página é selecionada
                echo '<h2 class="welcome-text">Use o menu para navegar</h2>';
                break;
        }
        ?>
    </div>

    <?php
    // Inclui o arquivo de rodapé
    include __DIR__ . "/footer.php";
    ?>

    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>