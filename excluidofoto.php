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
  
$id = $id=$_GET['id'];   

// Seleciona todos os usuários
$sql = mysql_query("select foto from galeria where id = $id");
 
// Exibe as informações de cada usuário
while ($usuario = mysql_fetch_object($sql)) {
	
$foto=$usuario->foto;}

$diretorio = "galeria/";

$imagemDeletar = $diretorio . $foto;   

$deleta = unlink($imagemDeletar);    

//if($deleta):

	$sql = "delete from galeria where id = '$id'";
	
	$querybanco = mysql_query($sql) or die ("<script>erroexcluidofoto()</script>" . mysql_error());
	
	mysql_close($conexao);
	
//endif;

if(!mysql_error())
	{echo"<script>excluidofoto()</script>";}

?>

</body>
</html>