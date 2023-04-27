<carro>
    <id>1</id>
    <marca>Fiat</marca>
    <modelo>Uno</modelo>
    <ano>2022</ano>
    <cor>Branco</cor>
    <preco>40000</preco>
</carro>
<br><hr>
<?php
    //Pode ser recebendo uma string pronta do xml e transformar no msm objeto xml como se fosse um arquivo
    /*
    $stringXML = '<?xml version="1.0" encoding="UTF-8"?>
                    <carros>
                    <carro>
                        <id>1</id>
                        <marca>Fiat</marca>
                        <modelo>Uno</modelo>
                        <ano>2022</ano>
                        <cor>Branco</cor>
                        <preco>40000</preco>
                    </carro>
                </carros>';
    $xml = simplexml_load_string($string)
    */

    //leitura do arquivo, e gerando o objeto xml
    $xml = simplexml_load_file('arquivo.xml');

    //percorrer todos os registros  'carro'
    foreach ($xml->carro as $carro) {
        echo "ID do Carro: " . $carro->id . "<br>";
        echo "Marca: " . $carro->marca . "<br>";
        echo "Modelo: " . $carro->modelo . "<br>";
        echo "Ano: " . $carro->ano . "<br>";
        echo "Cor: " . $carro->cor . "<br>";
        echo "Preço: " . $carro->preco . "<br>";
        echo "<hr><br>";
    }
?>