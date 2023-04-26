<?php
    include("..\conexao.php");
    include('..\protected.php');


    echo ("<h1>contatos</h1>");
    echo ("<br><a href='insert.php'><button>NOVO</button></a>");

    $sql_code = "SELECT * FROM contato;";
    $sql_query = $mysqli->query($sql_code) or die("Falha na instrução sql".$mysqli->error);

    $sql_query->num_rows;
    
    if ($sql_query->num_rows >0 ){

        echo "<table>";
        echo "<tr><th>Funções</th><th>Nome</th><th>Telefone</th></tr>";
        //echo "<tr><th>Funções</th><th>Nome</th><th>Telefone</th><th>Idade</th><th>Rua</th><th>Número</th><th>Bairro</th><th>Cidade</th><th>Estado</th><th>País</th><th>Email</th></tr>";
        while ($linha = $sql_query->fetch_assoc()) {
            // echo "<tr><td>" . $linha["idcontato"] . "</td><td>" . $linha["nome"] . "</td><td>" . $linha["telefone"] . "</td><td>" . $linha["idade"] . "</td><td>" . $linha["rua"] . "</td><td>" . $linha["numero"] . "</td><td>" . $linha["bairro"] . "</td><td>" . $linha["cidade"] . "</td><td>" . $linha["estado"] . "</td><td>" . $linha["pais"] . "</td><td>" . $linha["email"] . "</td></tr>";
            echo "<tr><td>"  . '<a href="edit.php?id='.$linha["idcontato"].'"><button>Editar</button></a><a href="delete.php?id='.$linha["idcontato"].'"><button>Excluir</button></a>' . "</td><td>" . $linha["nome"] . "</td><td>" . $linha["telefone"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum registro encontrado.";
    }
?>

