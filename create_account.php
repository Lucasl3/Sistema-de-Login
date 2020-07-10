<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="style.css">

    <script src="script.js"></script>
</head>
<body>
    <div id="container-login">
        <form id="create-account" method="post" action="cadastrar.php">
            <header>
                <h2>Crie sua conta</h2>
            </header>

            <?php if(isset($_SESSION['email_invalido'])): ?>
                <div class="login-error">Digite um email válido!</div>
            <?php endif; 
                unset($_SESSION['email_invalido']);
            ?>

            <?php if(isset($_SESSION['senha_invalida'])): ?>
                <div class="login-error">Sua senha deve ter 6 dígitos ou mais!</div>
            <?php endif; 
                unset($_SESSION['senha_invalida']);
            ?>

            <?php if(isset($_SESSION['input_cadastro'])): ?>
                <div class="login-error">Campos obrigatórios faltam ser preenchidos!</div>
            <?php endif; 
                unset($_SESSION['input_cadastro']);
            ?>

            <?php if(isset($_SESSION['usuario_existe'])): ?>
                <div class="login-existe">Esse email já está sendo utilizado!<br>Digite outro.</div>
            <?php endif; 
                unset($_SESSION['usuario_existe']);
            ?>

            <?php if(isset($_SESSION['status_cadastro'])): ?>    
                <div class="login-success">Conta criada com successo!<br>Volte para a tela de login para entrar.</div>
            <?php endif; 
                unset($_SESSION['status_cadastro']);
            ?>

            <div class="input-box font">
                <p>Nome</p>
                <input type="text" name="nome" class="input-custom custom-box" placeholder="* Seu nome completo">
            </div>
            <div class="input-box font">
                <p>E-mail</p>
                <input type="text" id="email2" name="email" class="input-custom custom-box" placeholder="* exemplo@exemplo.com">
            </div>
            <div class="input-box">
                <p class="font">Senha</p>
                <input type="password" id="senha2" name="password" class="input-custom custom-box" placeholder="******">
                <p class="information font">No mínimo 6 dígitos</p>
            </div>
            <div class="box">
                <button type="submit" name="criar" class="btn-custom font">Criar conta</button>
            </div>
            <div id="rodape" class="font">Já tem uma conta? <a href="index.php">Fazer login</a></div>
        </form>
    </div>
</body>
</html>