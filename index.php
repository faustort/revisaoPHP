<?php
$titulo = "Página inicial";
include __DIR__ . "/header.php";
?>
<main>
    <div class="container">
        <div class="row align-center">
            <div class="col-md-6">
                <h1>Você sabe como se tornar um profissional realmente qualificado?</h1>
                <p>Em mundo cada vez mais competitivo se destaca quem tem conhecimento e qualificação acima da média. Além disso, todo mundo sabe que as grandes oportunidades sempre aparecem para os melhores profissionais. No Senac você tem acesso a diversas opções de Cursos Técnicos para garantir o melhor aprendizado e se tornar referência no mercado.</p>
                <p>Os Cursos Técnicos do Senac têm aulas voltadas para um ensino prático, orientadas por professores com muita experiência de mercado e em uma estrutura moderna e equipada. Tudo isso para que você adquira competências e conhecimento naquilo que o mercado realmente busca.</p>
            </div>
            <div class="col-md-6">
                <img src="assets/images/profissional.png" alt="Modelo mulher utilizando um equipamento de saúde em uma paciente" class="img-fluid">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php

                include "config/db.php";
                // AGORA ESSE ARQUIVO CONHECE O BANCO
                // AGORA EU CONHEÇO $pdo
                // $pdo; // eu existo!
                $sql = "SELECT * FROM noticias";
                $resultado = $pdo->query($sql);
                while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    // echo "<h1>" . $row['id_not'] . "</h1>";
                    echo "<h1>" . $row['titulo'] . "</h1>";
                    echo "<p>" . $row['descricao'] . "</p>";
                    
                }

                ?>
            </div>
        </div>
    </div>
</main>

<?php
include __DIR__ . "/footer.php";
?>