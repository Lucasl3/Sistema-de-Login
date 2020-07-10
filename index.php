<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="container-login">
        <form id="login" method="post" action="login.php">
            <header>
                <h1>Login</h1>
            </header>
            <?php if(isset($_SESSION['nao_autenticado'])): ?>
                <div class="login-error">Email ou senha inválidos!<br>Tente novamente!</div>
            <?php endif; 
                unset($_SESSION['nao_autenticado']);
            ?>

            <?php if(isset($_SESSION['inputs'])): ?>
                <div class="login-error">Campos obrigatórios faltam ser preenchidos</div>
            <?php endif; 
                unset($_SESSION['inputs']);
            ?>

            <?php if(isset($_SESSION['acesso_restrito'])): ?>
                <div class="login-error">Faça o login para acessar essa página!</div>
            <?php endif; 
                unset($_SESSION['acesso_restrito']);
            ?>

            <div class="box">
                <input type="text" class="input-custom font" name="email" id="email" placeholder="* Email" autocomplete="off">
            </div>

            <div class="box">
                <input type="password" class="input-custom font" name="password" id="password" placeholder="* Senha" autocomplete="off">
            </div>
            <div class="box">
                <button type="submit" class="btn-custom font">Entrar</button>
            </div>

            <div id="rodape" class="font">Não tem uma conta? <a href="create_account.php">Criar conta</a></div>
        </form>
    </div>
</body>
</html>