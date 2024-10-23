<!-- Menu de Navegação utilizando Bootstrap -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <!-- Logo ou nome do site -->
        <a class="navbar-brand" href="dashboard.php">Dashboard</a>
        <!-- Botão para exibir menu em telas pequenas -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Itens do menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Item de menu -->
                <li class="nav-item">
                    <a class="nav-link" href="?pagina=inserir_noticia">Inserir Notícia</a>
                </li>
                <!-- Item de menu -->
                <li class="nav-item">
                    <a class="nav-link" href="?pagina=listar_noticias">Listar Notícias</a>
                </li>
                <!-- Você pode adicionar mais itens aqui -->
            </ul>
        </div>
    </div>
</nav>