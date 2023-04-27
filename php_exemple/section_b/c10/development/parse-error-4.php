<?php
$username = 'Ivy';
$order     = ['pencil', 'pen', 'notebook','tablet'];
?>
<h1>Basket</h1>
<?= $username ?>
<?php foreach ($order as $item) { ?>
    <?= $item ?><br>
<?php } ?>