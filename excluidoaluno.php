<!doctype html>
<html>
<head>
<title>Liamar Silva</title>

<!-- Javascript -->
<script type="text/javascript" src="js/function.js"></script>
</head>
<?php include_once "validar.php"; ?>

<body>

<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
include "banco.php";
  
$id = $id=$_POST['id'];

	$sql = "delete from alunos where id = '$id'";
	
	$querybanco = mysql_query($sql) or die ("<script>erroexcluidoaluno()</script>" . mysql_error());
	
if(!mysql_error())
	{echo"<script>excluidoaluno()</script>";}

?>

</body>
</html>