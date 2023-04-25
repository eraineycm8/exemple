<?php

if (!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['id'])){
    die('<h1>Você não pode acessar essa parte do site sem estar logado!</h1><br><p><a href="index.php">Entrar</a></p>');
}
?>
