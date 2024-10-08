<?php
// Define o título da página como "Notícia"
$titulo = "Notícia";

// Inclui o arquivo 'header.php'
include "header.php";
?>

<main>
    <?php
    // Inclui o arquivo de configuração de banco de dados 'db.php', que configura a conexão com o banco de dados.
    include __DIR__ . "/config/db.php";

    // Obtém o valor do parâmetro 'idnot' da URL, que corresponde ao ID da notícia a ser exibida
    $idNot = $_GET['idnot'];

    // Prepara uma consulta SQL para selecionar todos os campos da tabela 'noticias' onde o campo 'id_not' corresponde ao ID fornecido
    $sql = "SELECT * from noticias WHERE id_not = :idNot";

    // Prepara a consulta SQL, evitando a injeção de SQL ao usar parâmetros
    $stmt = $pdo->prepare($sql);

    // Vincula o valor de $idNot ao parâmetro ':idNot' na consulta SQL
    $stmt->bindParam(':idNot', $idNot);

    // Executa a consulta preparada
    $stmt->execute();

    // Obtém o resultado da consulta como um array associativo
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    // Se o resultado existir, exibe o título e a descrição da notícia
    if ($resultado) {
        // Exibe o título da notícia dentro de uma tag <h1>
        echo '<h1>';
        echo $resultado['titulo'];
        echo '</h1>';

        // Exibe a descrição da notícia dentro de uma tag <p>
        echo '<p>';
        echo $resultado['descricao'];
        echo '</p>';
    }
    ?>
</main>

<?php
// Inclui o arquivo 'footer.php'
include "footer.php";
?>