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
$aluno=$_POST['aluno'];
$data=$_POST['data'];
$ate=$_POST['ate'];
$horario1=$_POST['horario1'];
$refeicao1=$_POST['refeicao1'];
$horario2=$_POST['horario2'];
$refeicao2=$_POST['refeicao2'];
$horario3=$_POST['horario3'];
$refeicao3=$_POST['refeicao3'];
$horario4=$_POST['horario4'];
$refeicao4=$_POST['refeicao4'];
$horario5=$_POST['horario5'];
$refeicao5=$_POST['refeicao5'];
$horario6=$_POST['horario6'];
$refeicao6=$_POST['refeicao6'];
$horario7=$_POST['horario7'];
$refeicao7=$_POST['refeicao7'];
$horario8=$_POST['horario8'];
$refeicao8=$_POST['refeicao8'];
$observacao=$_POST['observacao'];

$id_nome = explode("- ", $aluno);
$fk_aluno = "{$id_nome[1]}";

/*echo "$id <br>";
echo strlen($id);*/

$dados = explode("/",$data);
$date = "{$dados[2]}-{$dados[1]}-{$dados[0]}";

$dados = explode("/",$ate);
$up = "{$dados[2]}-{$dados[1]}-{$dados[0]}";

$sql = mysql_query("update dieta set fk_aluno='$fk_aluno', data='$date', ate='$up', horario1='$horario1', refeicao1='$refeicao1', horario2='$horario2', refeicao2='$refeicao2', horario3='$horario3', refeicao3='$refeicao3', horario4='$horario4', refeicao4='$refeicao4', horario5='$horario5', refeicao5='$refeicao5', horario6='$horario6', refeicao6='$refeicao6', horario7='$horario7', refeicao7='$refeicao7', horario8='$horario8', refeicao8='$refeicao8', observacao='$observacao' where id = $id") or die ("<script>erroalteradodieta()</script>" . mysql_error());

if(!mysql_error())
	{echo"<script>alteradodieta()</script>";}

?>

</body>
</html>