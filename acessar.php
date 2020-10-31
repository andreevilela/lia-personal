<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Liamar Silva</title>

<!-- Javascript -->
<script type="text/javascript" src="js/function.js"></script>
</head>

<body>

<?php
include "banco.php";
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$usuario=$_POST['usuario'];
$senha=$_POST['senha'];
$cod = md5($senha);
//echo $cod;

	$sql="select * from acesso where usuario='$usuario' and senha='$cod'";
	
	$querybanco = mysql_query($sql) or die ("<script>erroacessar()</script>" . mysql_error());
	
	$linha=mysql_num_rows($querybanco);
    
	if ($linha == 0)
		{echo "<script>erroacessarlinha()</script>";}
	else 
		{session_start();
		$_SESSION["usuario"]=$usuario;
		$_SESSION["senha"]=$cod;
		{echo"<script>validar()</script>";}}
?>

</body>
</html>