<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo ("boa garoto");
    /*parse_str(file_get_contents("php://input"), $data);
    
    // obter o ID do contato
    $idContato = $data['id'];

    // realizar a exclusão do contato com o ID fornecido
    include("conexao.php");

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
    }*/
} else {
    http_response_code(400);
    echo json_encode(array('message' => 'Método inválido.'));
}
?>
