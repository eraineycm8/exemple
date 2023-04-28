<?php

    $xml = simplexml_load_file(__DIR__."\arq_xmls\carros.xml");
    //echo $xml->carro[225]->modelo;

    foreach ($xml->carro as $carro) {
        echo "ID do Carro: " . $carro->id . "<br>";
        echo "Marca: " . $carro->marca . "<br>";
        echo "Modelo: " . $carro->modelo . "<br>";
        echo "Ano: " . $carro->ano . "<br>";
        echo "Cor: " . $carro->cor . "<br>";
        echo "Preço: " . $carro->preco . "<br>";
        echo "<hr><br>";
    }

