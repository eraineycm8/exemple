<!DOCTYPE html>
<html>
<head>
	<title>Estado Selecionado</title>
</head>
<body>
	<?php


        $isFound = false;
		if(isset($_GET['uf'])){
            $uf = $_GET['uf'];
            $xml = simplexml_load_file('..\arq_xmls\uf.xml');
            foreach ($xml->estado as $estado) {
                if ($uf == $estado->uf){
                    echo '<h1>O estado selecionado foi:</h1><br><br>';
                    echo ("<h3> A UF procurada: ".$uf."</h3>");
                    echo ("<p>Pertence ao estado: ".$estado->nome."</p>");
                    $isFound = true;
                }
            }
		}
        if (!$isFound){
            echo '<h1>Nenhum estado selecionado!</h1><br><br>';
        }
	?>
</body>
</html>
