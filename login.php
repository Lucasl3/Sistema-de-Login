<?php
    session_start();
    include_once ('conexao.php');

    if(empty($_POST['email']) || empty($_POST['password'])){
        $_SESSION['inputs'] = true;
        header('location: index.php');
        exit;
    }

    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['password']);

    $query = "select id_login, email from login where email = '$email' and senha = md5('$senha')";
    // lembrar de botar o md5 na senha
    $result = mysqli_query($conexao, $query);

    $row = mysqli_num_rows($result);

    echo $senha;

    if($row == 1){
        echo 'valido';
        $_SESSION['autenticado'] = true;
        $_SESSION['email'] = $email;
        header('location: home.php');
    } else{
        echo 'invalido';
        $_SESSION['nao_autenticado'] = true;
        header('location: index.php');
    }
?>