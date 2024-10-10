<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Notícias</h1>
            <?php

            include __DIR__ . "/../config/db.php";
            include __DIR__ . "/../config/media.php";

            $stmt = $pdo->prepare("SELECT * FROM noticias");
            $stmt->execute();
            $noticias = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($noticias):
            ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($noticias as $noticia) :
                        ?>
                            <tr>
                                <td><?php
                                    echo $noticia['titulo'];
                                    ?></td>
                                <td><?php
                                    if (strlen($noticia['imagem'] > 1)) {
                                        echo '<img src="' . BASE_UPLOAD_URL . $noticia['imagem'] . '" >';
                                    }
                                    echo $noticia['descricao'];
                                    ?></td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="dashboard.php?pagina=editar_noticia&id_not=<?php echo $noticia['id_not']; ?>"><i class="bi bi-pencil-square"></i> </a>
                                    <a class="btn btn-sm btn-danger" href="dashboard.php?pagina=excluir_noticia&id_not=<?php echo $noticia['id_not']; ?>"><i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            <?php
            endif;
            ?>

        </div>
    </div>
</div>