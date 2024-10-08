<?php
session_start();


$erro = false;
if (isset($_POST['email'])) {
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';

    // aqui eu recebo o e-mail e a senha enviados pelo formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // aqui eu requisito o banco pra encontrar a variável $pdo que foi
    // responsável por instanciar o banco de dados
    include __DIR__ . "/../config/db.php";

    // método simples de comparação de senha
    // 
    $senha = md5(string: $senha . $token);
    // aqui eu preparo a consulta SQL para buscar o usuário no banco
    $stmt = $pdo->prepare("SELECT * from usuarios WHERE email = :email and senha = :senha");
    // aqui eu aumento a segurança da consulta SQL
    // fazendo o bind dos valores que eu quero buscar
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":senha", $senha);

    // aqui eu executo a consulta SQL
    $stmt->execute();
    // aqui eu pego o resultado da consulta SQL
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // aqui eu pergunto houve algum resultado
    if ($row) {
        // se sim
        //echo "usuario cadastrado";
        $_SESSION['logado'] = true;
        header("Location: dashboard.php");
    } else {
        // se não
        $erro = "Usuário não cadastrado";
    }
}


?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel de Controle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h1>Bem vindo, faça login</h1>
                    <form action="" method="post">
                        <?php if($erro) : ?>
                            <div class="alert alert-danger">Usuário não encontrado</div>
                        <?php endif; ?>

                        <input type="hidden" name="function" value="login_de_usuario">
                        <label for="email">Digite seu e-mail</label>
                        <input type="email" name="email" id="email" class="form-control">
                        <label for="senha">Digite sua senha</label>
                        <input type="password" name="senha" id="senha" class="form-control">
                        <input type="submit" value="Entrar" class="btn btn-primary">

                    </form>
                </div>
            </div>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>