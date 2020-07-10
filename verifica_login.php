<?php
    if(!$_SESSION['autenticado']){
        $_SESSION['acesso_restrito'] = true;
        header('location: index.php');
        exit();
    }
?>