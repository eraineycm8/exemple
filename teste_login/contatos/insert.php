<?php
    include("..\conexao.php");
    include("..\protected.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        // Obtém os dados do formulário
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
        
        // Prepara a instrução SQL usando prepared statement
        $stmt = $mysqli->prepare("INSERT INTO contato (nome, telefone, idade, rua, numero, bairro, cidade, estado, pais, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssss", $nome, $telefone, $idade, $rua, $numero, $bairro, $cidade, $estado, $pais, $email);

        // Executa a instrução SQL e verifica se ocorreu algum erro
        if ($stmt->execute()) {
            echo "Contato adicionado com sucesso!";
        } else {
            echo "Erro ao adicionar contato: " . $stmt->error;
        }

        // Fecha o statement e a conexão com o banco de dados
        $stmt->close();
        $mysqli->close();        
    }



?>

<!DOCTYPE html>
<html>
<head>
    <title>Inserir Novo Contato</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#formulario').on('submit', function(e) {
                e.preventDefault();
                var form = $(this);
                var nome = $('#nome').val();
                var telefone = $('#telefone').val();
                var idade = $('#idade').val();
                var rua = $('#rua').val();
                var numero = $('#numero').val();
                var bairro = $('#bairro').val();
                var cidade = $('#cidade').val();
                var estado = $('#estado').val();
                var pais = $('#pais').val();
                var email = $('#email').val();
                $.ajax({
                    url: 'insert.php',
                    type: 'POST',
                    data: {
                        nome: nome,
                        telefone: telefone,
                        idade: idade,
                        rua: rua,
                        numero: numero,
                        bairro: bairro,
                        cidade: cidade,
                        estado: estado,
                        pais: pais,
                        email: email
                    },
                    success: function(response) {
                        // Exibe uma mensagem de sucesso ou erro
                        alert(response);
                        // Redireciona para outra página após o sucesso
                        window.location.href = 'index.php';
                    },
                    error: function(xhr, status, error) {
                        alert(xhr.responseText);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <h1>Novo Contato</h1>
    <form id="formulario">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone"><br>
        <label for="idade">Idade:</label>
        <input type="text" id="idade" name="idade"><br>
        <label for="rua">Rua:</label>
        <input type="text" id="rua" name="rua"><br>
        <label for="numero">Número:</label>
        <input type="text" id="numero" name="numero"><br>
        <label for="bairro">Bairro:</label>
        <input type="text" id="bairro" name="bairro"><br>
        <label for="cidade">Cidade:</label>
        <input type="text" id="cidade" name="cidade"><br>
        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado"><br>
        <label for="pais">País:</label>
        <input type="text" id="pais" name="pais"><br>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email"><br>
        <input type="submit" value="Salvar">
        <a href="index.php"><button type="button">CANCELAR</button></a>
    </form>
</body>
</html>
