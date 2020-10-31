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
$status=$_POST['status'];
$nome=$_POST['nome'];
$sexo=$_POST['sexo'];
$data_nascimento=$_POST['data_nascimento'];
$telefone=$_POST['telefone'];
$celular=$_POST['celular'];
$observacao=$_POST['observacao'];

$dados = explode("/",$data_nascimento);
$date_nascimento = "{$dados[2]}-{$dados[1]}-{$dados[0]}";

$sql = "update alunos set
		status='$status',
		nome='$nome',
		sexo='$sexo',
		data_nascimento='$date_nascimento',
		observacao='$observacao',
		telefone='$telefone',
		celular='$celular'
	where id = '$id'";

	$querybanco = mysql_query($sql) or die ("<script>erroalteradoaluno()</script>" . mysql_error());

if(!mysql_error())
	{echo"<script>alteradoaluno()</script>";}

?>

</body>
</html>