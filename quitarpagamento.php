<?php $menu='pagamentos'; include"menu.php"; include_once "validar.php"; include"function.php"; include "banco.php"; include "erros.php"?>

    <?php
	error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
	$id = $_GET['id'];

	echo"<script> var id = '$id'; submitquitarpagamento()</script>";

?>
</body>
</html>