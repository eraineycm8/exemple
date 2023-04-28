<?php 
    include_once('conexao.php');

   

    $sql_code = "SELECT * FROM contato;";
    $sql_query = $mysqli->query($sql_code);
    
    if ($sql_query->num_rows >0 ){

        $dom = new DOMDocument('1.0','UTF-8');
        $dom->formatOutput = true;
        $rootNode = $dom->createElement('contatos');

        while ($linha = $sql_query->fetch_assoc()) {


            $nomeNo = $dom->createElement("nome");
            $nomeNo->appendChild($dom->createTextNode($linha['nome']));
        
            $telefoneNo = $dom->createElement("telefone");
            $telefoneNo->appendChild($dom->createTextNode($linha['telefone']));

            $contatoNo = $dom->createElement("contato");
            $contatoNo->appendChild($nomeNo);
            $contatoNo->appendChild($telefoneNo);

            $rootNode->appendChild($contatoNo);

        }
        $dom->appendChild($rootNode);
        $dom->save(__DIR__."\arq_xmls\questaoProva.xml");

        echo  "XML 'questaoProva.xml' gerado!";
    } else {
        echo "Nenhum contato encontrado.";
    }
?>
