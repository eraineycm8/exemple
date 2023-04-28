<?php 
    include_once('conexao.php');

   

    $sql_code = "SELECT * FROM contato;";
    $sql_query = $mysqli->query($sql_code);
    
    if ($sql_query->num_rows >0 ){

        header('Content-type: text/xml');
        $stringXML = "";
        $contatosXML = new SimpleXMLElement("<teste></teste>");



        while ($linha = $sql_query->fetch_assoc()) {


            $contatosXML = $contatosXML->addChild('contato');
            $contatosXML->addChild('nome', $linha['nome']);
            $contatosXML->addChild('telefone', $linha['telefone']);
            ob_clean();
            echo $contatosXML->asXML();
            //$stringXML = $stringXML . $contatosXML->asXML();
        }
        echo  $stringXML;
    } else {
        echo "Nenhum registro encontrado.";
    }
?>
