<?php

if (!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['id'])){
    header("Location: http://localhost/exemple/teste_login/index.php");
    die('<h1>Você não pode acessar essa parte do site sem estar logado!</h1><br><p><a href=" http://localhost/exemple/teste_login/index.php">Entrar</a></p>');
}
?>
