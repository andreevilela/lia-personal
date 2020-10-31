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

$id=$_POST['id'];

// Seleciona todos os usuários
	{$sql = mysql_query("select foto from avaliacao where id = $id");
	 
	// Exibe as informações de cada usuário
	while ($usuario = mysql_fetch_object($sql)) {
		
	$foto1=$usuario->foto;}
	
	$diretorio = "fotos/";
	
	$imagemDeletar = $diretorio . $foto1;   
	
	$deleta = unlink($imagemDeletar);}
	
// Seleciona todos os usuários
	{$sql = mysql_query("select foto2 from avaliacao where id = $id");
	 
	// Exibe as informações de cada usuário
	while ($usuario = mysql_fetch_object($sql)) {
		
	$foto2=$usuario->foto2;}
	
	$diretorio = "fotos/";
	
	$imagemDeletar = $diretorio . $foto2;   
	
	$deleta = unlink($imagemDeletar);}

$sql = "delete from avaliacao where id = '$id'";

	$querybanco = mysql_query($sql) or die ("<script>erroexcluidoavaliacao()</script>" . mysql_error());

if(!mysql_error())
	{echo"<script>excluidoavaliacao()</script>";}

?>

</body>
</html>