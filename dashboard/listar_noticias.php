     <div class="row">
         <div class="col-md-12">
             <!-- Título centralizado -->
             <h1 class="text-center">Notícias</h1>
             <?php
                // Inclui as configurações do banco de dados e de mídia
                include __DIR__ . "/../config/db.php";
                include __DIR__ . "/../config/media.php";

                // Prepara e executa a consulta para obter todas as notícias
                $stmt = $pdo->prepare("SELECT * FROM noticias");
                $stmt->execute();
                $noticias = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Verifica se há notícias para exibir
                if ($noticias):
                ?>
                 <!-- Tabela estilizada com Bootstrap -->
                 <table class="table table-striped">
                     <thead>
                         <tr>
                             <!-- Cabeçalho da coluna Título -->
                             <th>Título</th>
                             <!-- Cabeçalho da coluna Descrição -->
                             <th>Descrição</th>
                             <!-- Cabeçalho da coluna Ações com classe para ser a menor -->
                             <th class="text-nowrap" style="width: 1%;">Ações</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php
                            // Loop para percorrer todas as notícias
                            foreach ($noticias as $noticia) :
                            ?>
                             <tr>
                                 <!-- Coluna do Título da notícia -->
                                 <td><?php echo $noticia['titulo']; ?></td>
                                 <!-- Coluna da Descrição da notícia -->
                                 <td>
                                     <?php
                                        // Verifica se existe uma imagem associada à notícia
                                        if (strlen($noticia['imagem']) > 1) {
                                            // Exibe a imagem com classe para torná-la responsiva
                                            echo '<img src="' . BASE_UPLOAD_URL . $noticia['imagem'] . '" class="img-fluid mb-2" alt="Imagem da notícia">';
                                        }
                                        // Exibe a descrição da notícia
                                        echo $noticia['descricao'];
                                        ?>
                                 </td>
                                 <!-- Coluna das Ações com classe para não quebrar linha e ser a menor possível -->
                                 <td class="text-nowrap text-center">
                                     <!-- Botão para editar a notícia -->
                                     <a class="btn btn-sm btn-primary" href="dashboard.php?pagina=editar_noticia&id_not=<?php echo $noticia['id_not']; ?>">
                                         <i class="bi bi-pencil-square"></i>
                                     </a>
                                     <!-- Botão para excluir a notícia -->
                                     <a class="btn btn-sm btn-danger" href="dashboard.php?pagina=excluir_noticia&id_not=<?php echo $noticia['id_not']; ?>">
                                         <i class="bi bi-trash"></i>
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