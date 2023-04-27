<?php
    include("..\conexao.php");
    include('..\protected.php');


    echo ("<h1>contatos</h1>");
    echo ("<br><a href='insert.php'><button>NOVO</button></a><a href='..\painel.php'><button>VOLTAR</button></a>");

    $sql_code = "SELECT * FROM contato;";
    $sql_query = $mysqli->query($sql_code) or die("Falha na instrução sql".$mysqli->error);

    $sql_query->num_rows;
    
    if ($sql_query->num_rows >0 ){

        echo "<table>";
        echo "<tr><th>Funções</th><th>Nome</th><th>Telefone</th></tr>";
        while ($linha = $sql_query->fetch_assoc()) {
            echo "<tr><td>"  . '<a href="edit.php?id='.$linha["idcontato"].'"><button>Editar</button></a><a href="confirm_delete.php?id='.$linha["idcontato"].'"><button>Excluir</button></a>' . "</td><td>" . $linha["nome"] . "</td><td>" . $linha["telefone"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum registro encontrado.";
    }
?>

