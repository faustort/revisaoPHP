<?php
// Define o título da página como "Notícias do meu site"
$titulo = "Notícias do meu site";

// Inclui o arquivo 'header.php', que provavelmente contém o cabeçalho HTML da página (tags <head>, menu de navegação, etc.)
include "header.php";
?>
<main>
    <div class="container">
        <!-- Cabeçalho principal da seção de notícias -->
        <h1>Notícias</h1>
        <div class="container">
            <?php
            // Inclui o arquivo de configuração de banco de dados 'db.php', que estabelece a conexão com o banco
            include __DIR__ . "/config/db.php";

            // Define uma consulta SQL para selecionar todos os registros da tabela 'noticias'
            $sql = "SELECT * FROM noticias";

            // Executa a consulta diretamente e armazena o resultado na variável $resultado
            $resultado = $pdo->query($sql);

            // Loop para percorrer todas as linhas retornadas pela consulta
            while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                // Armazena o ID da notícia atual em uma variável
                $id = $row['id_not'];

                // Cria uma div para cada notícia
                echo '<div>';

                // Cria um link para a página de detalhes da notícia, passando o ID como parâmetro na URL
                echo "<a href='noticia.php?idnot=$id'>";

                // Exibe o título da notícia dentro do link
                echo $row['titulo'];

                // Fecha a tag de link
                echo '</a>';

                // Fecha a div da notícia
                echo '</div>';
            }
            ?>
        </div>
    </div>
</main>

<?php
// Inclui o arquivo 'footer.php', que contém o rodapé da página (informações de copyright, links de rodapé, etc.)
include "footer.php";
?>