<?php
include('..\conexao.php');
include('..\protected.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'])&& is_numeric($_POST['id'])){
        $idContato = $_POST['id'];
        $sql_code = "DELETE FROM contato WHERE idcontato = ?";
        $sttm = $mysqli->prepare($sql_code);
        $sttm->bind_param("i", $idContato);
        $sttm->execute();
        if ($sttm->affected_rows>0){
            echo true;    
        }
        echo false;
    }

}else {
    http_response_code(400);
    echo json_encode(array('message' => 'Método inválido.'));
}
?>