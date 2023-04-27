<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Deletar contato</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="delete.js"></script>
</head>
<body>
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

    if ($result->num_rows>0){

        $contato = $result->fetch_assoc();

        echo '<h2>Excluir contato</h2>';
        echo '<p>Tem certeza que deseja excluir o contato abaixo?</p>';
        echo '<form id="formDelete" onsubmit="enviarDados(); return false;">';
        echo '<input type="hidden" id="id" name="id" value="'.$contato['idcontato'].'">';
        echo '<label for="nome">Nome:</label> <input type="text" name="nome" value="'.$contato['nome'].'" disabled><br>';
        echo '<label for="telefone">Telefone:</label><input type="text" name="telefone" value="'.$contato['telefone'].'"disabled><br>';
        echo '<label for="idade">Idade:</label><input type="text" name="idade" value="'.$contato['idade'].'"disabled><br>';
        echo '<button type="button" >Excluir</button>';
        echo '<a href="index.php"><button type="button">Cancelar</button></a>'; // SUPER IMPORTANTE NOTAR QUE O TYPE="BUTTON" É CRUCIAL PARA FUNCIONAR COMO CANCELAR PQ SE NÃO POR ESTAR DENTRO DE UM FORM ELE PASSA A SER INTERPRETADO COMO SUBMIT
        echo '<button type="button" onclick="enviarDados()">Teste</button>';
        echo '</form>';
        
    }
}else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "kkkkkk claro né?";
}else if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    echo "opaaaaaaaaa";
    die("morreu");
        // obter o ID do contato
        $idContato = $data['id'];

    // realizar a exclusão do contato com o ID fornecido
    
    $sql_code = "DELETE FROM contato WHERE idcontato = ?";
    $sttm = $mysqli->prepare($sql_code);
    $sttm->bind_param("i", $idContato);
    $sttm->execute();

    // retornar uma resposta para o cliente
    header('Content-Type: application/json');
    if ($sttm->affected_rows > 0) {
        http_response_code(200);
        echo json_encode(array('message' => 'Contato excluído com sucesso.'));
    } else {
        http_response_code(404);
        echo json_encode(array('message' => 'Contato não encontrado.'));
    }
} else {
    http_response_code(400);
    echo json_encode(array('message' => 'Método inválido.'));
}
?>
</body>
</html>
