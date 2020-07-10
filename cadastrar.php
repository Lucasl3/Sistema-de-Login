<?php
    session_start();
    include_once ("conexao.php");
    
    function valida_email($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $password = mysqli_real_escape_string($conexao, MD5($_POST['password']));

    $sql = "select count(*) as total from login where email = '$email'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);

    if(empty($_POST['email']) || empty($_POST['password']) || empty($_POST['nome'])){
        $_SESSION['input_cadastro'] = true;
        header('location: create_account.php');
        exit();
    } else if(!valida_email($_POST['email'])){
        $_SESSION['email_invalido'] = true;
        header('location: create_account.php');
        exit();
    } else if(strlen($_POST['password']) < 6){
        $_SESSION['senha_invalida'] = true;
        header('location: create_account.php');
        exit();
    } else{
        if($row['total'] == 1){
            $_SESSION['usuario_existe'] = true;
            header('location: create_account.php');
            exit();
        }
    
        $sql = "insert into login (nome, email, senha, data_cadastro) values ('$nome', '$email', '$password', NOW())";
    
        if($conexao->query($sql) === TRUE){
            $_SESSION['status_cadastro'] = true;
        }
    
        $conexao->close();
    
        header('location: create_account.php');
        
    }

?>