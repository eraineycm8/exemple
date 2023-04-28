<?php
    $dom = new DOMDocument('1.0','UTF-8');

    //FORMATAR A SAÍDA
    $dom->formatOutput = true;
    $rootNode = $dom->createElement('estados');

    //CRIANDO NÓ UF
    $ufValueNode = $dom->createTextNode('PE');
    $ufNode = $dom->createElement("uf");
    $ufNode->appendChild($ufValueNode);
    
    //CRIANDO NÓ DE NOME do estado
    $nomeNode = $dom->createElement("nome");
    $nomeNode->appendChild($dom->createTextNode('Pernambuco'));
    
    //CRIANDO NÓ DE POPULAÇÃO
    $populacaoNode = $dom->createElement("populacao");
    $populacaoNode->appendChild($dom->createTextNode(9278135));
    


    for ($i=0; $i < 2; $i++) { 

        if ($i==0){
            $estadoNode = $dom->createElement("estado");
            $estadoNode->appendChild($ufNode);
            $estadoNode->appendChild($nomeNode);
            $estadoNode->appendChild($populacaoNode);
        }else{
            
            //CRIANDO NÓ UF
            $ufValueNode = $dom->createTextNode('SP');
            $ufNode = $dom->createElement("uf");
            $ufNode->appendChild($ufValueNode);
            
            //CRIANDO NÓ DE NOME do estado
            $nomeNode = $dom->createElement("nome");
            $nomeNode->appendChild($dom->createTextNode('São Paulo'));
            
            //CRIANDO NÓ DE POPULAÇÃO
            $populacaoNode = $dom->createElement("populacao");
            $populacaoNode->appendChild($dom->createTextNode(45143258));
            
            //CRIANDO NÓ DE AGRUPAMENTO ESTADO que recebe os filhos UF NOME e POPULACAO
            $estadoNode = $dom->createElement("estado");
            $estadoNode->appendChild($ufNode);
            $estadoNode->appendChild($nomeNode);
            $estadoNode->appendChild($populacaoNode);
        }

        $rootNode->appendChild($estadoNode);
    }
    $dom->appendChild($rootNode);

    /*
    $xml = $dom->saveXML();
    echo $xml;
    */

    $dom->save( __DIR__ .'\arq_xmls\ufsGeradas.xml');
    echo "Arquivo gerado com sucesso";
?>