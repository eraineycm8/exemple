<?php

$usuario = 'root';
$senha = '05120dcm';
$database = 'login';
$host = 'localhost';
$mysqli = new mysqli($host,$usuario,$senha,$database);

if($mysqli->error){
    die("Falha ao conectar ao banco de dados");
}

?>