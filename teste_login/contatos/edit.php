<?php
    include("..\conexao.php");
    include("..\protected.php");

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $idContato = $_GET["id"];

        // Seleciona o contato com o ID especificado
        $sql_code = "SELECT * FROM contato WHERE idcontato = ?";
        $sttm = $mysqli->prepare($sql_code);
        $sttm->bind_param("i", $idContato);
        $sttm->execute();
        $result = $sttm->get_result();
        $contato = $result->fetch_assoc();

        // Exibe um formulário com os dados do contato para edição
        echo '<form action="edit.php" method="post">';
        echo '<input type="hidden" name="id" value="'.$contato['idcontato'].'">';
        echo '<label for="nome">Nome:</label> <input type="text" name="nome" value="'.$contato['nome'].'"><br>';
        echo '<label for="telefone">Telefone:</label><input type="text" name="telefone" value="'.$contato['telefone'].'"><br>';
        echo '<label for="idade">Idade:</label><input type="text" name="idade" value="'.$contato['idade'].'"><br>';
        echo '<label for="rua"></label><input type="text" name="rua" value="'.$contato['rua'].'"><br>';
        echo '<label for="numero">Número:</label><input type="text" name="numero" value="'.$contato['numero'].'"><br>';
        echo '<label for="bairro">Bairro:</label><input type="text" name="bairro" value="'.$contato['bairro'].'"><br>';
        echo '<label for="cidade">Cidade:</label><input type="text" name="cidade" value="'.$contato['cidade'].'"><br>';
        echo '<label for="estado">Estado:</label><input type="text" name="estado" value="'.$contato['estado'].'"><br>';
        echo '<label for="pais">País: </label><input type="text" name="pais" value="'.$contato['pais'].'"><br>';
        echo '<label for="email">E-mail:</label><input type="text" name="email" value="'.$contato['email'].'"><br>';
//        echo '<input type="submit" value="Salvar">';
        echo '<button type="submit">Salvar</button>';
        echo '<a href="index.php"><button type="button">Cancelar</button></a>';
        echo '</form>';
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idContato = $_POST["id"];
        $nome = $_POST["nome"];
        $telefone = $_POST["telefone"];
        $idade = $_POST["idade"];
        $rua = $_POST["rua"];
        $numero = $_POST["numero"];
        $bairro = $_POST["bairro"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $pais = $_POST["pais"];
        $email = $_POST["email"];

        // Atualiza os dados do contato no banco de dados
        $sql_code = "UPDATE contato SET nome = ?, telefone = ?, idade = ?, rua = ?, numero = ?, bairro = ?, cidade = ?, estado = ?, pais = ?, email = ? WHERE idcontato = ?";
        $sttm = $mysqli->prepare($sql_code);
        $sttm->bind_param("ssssssssssi", $nome, $telefone, $idade, $rua, $numero, $bairro, $cidade, $estado, $pais, $email, $idContato);
        $sttm->execute();

        // Redireciona para a página de exibição do contato atualizado
        header("Location: index.php");
        echo "Sucesso na edição!";
        exit();
    }
?>