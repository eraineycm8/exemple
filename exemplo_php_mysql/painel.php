<?php
include('protected.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>
    <h1>Bem vindo ao painel</h1>
    <h3><?php echo $_SESSION['nome'];  ?></h3>
    <br><br>
    <div>
        <button><a href="contatos/index.php">Listar Contatos</a></button>
    </div>
    <p>
        <a href="logout.php">Sair</a>
    </p>
</body>
</html>