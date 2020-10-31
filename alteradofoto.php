<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Liamar Silva</title>

<!-- Javascript -->
<script type="text/javascript" src="js/function.js"></script>
</head>
<?php include_once "validar.php"; ?>

<body>

<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
include "banco.php";

$id=$_POST['id'];
$descricao=$_POST['descricao'];

$sql = "update galeria set
		descricao='$descricao' 
	where id = '$id'";

	$querybanco = mysql_query($sql) or die ("<script>erroalteradofoto()</script>" . mysql_error());

if(!mysql_error())
	{echo"<script>alteradofoto()</script>";}

?>

</body>
</html>