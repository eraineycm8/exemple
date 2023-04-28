<?php
    echo '
        <!DOCTYPE html>
        <html>
        <head>
            <title>Exemplo Combo UF boa</title>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="index.js"></script>
        </head>
        <body>
            <select id="uf">';


    $xml = simplexml_load_file('..\arq_xmls\uf.xml');

    echo '<option value="  "></option>';
    foreach ($xml->estado as  $estado) {
        echo '<option value="'.$estado->nome.'">'.$estado->uf.'</option>';
    }

/*
		<option value="SP">São Paulo</option>
		<option value="PE">PE</option>
		<option value="BA">BA</option>
*/
?>
	</select>

	<input type="text" id="estado" readonly>

	<button id="btn-confirma">Confirma</button>

	<script></script>
</body>
</html>
