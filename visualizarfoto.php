<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="imagens/icone.png">

    <title>Liamar Silva</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet" type="text/css">
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>

  </head>

<body>

<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
include "banco.php";

$id=$_GET['id'];

/*
echo "$id";

{$sql = "select foto from avaliacao where id = $id";
$querybanco = mysql_query($sql) or die (mysql_error());

	while($l = mysql_fetch_array($querybanco)){
									
	$foto=$l['foto'];
	
	echo"$foto";
	}
}*/

// Seleciona todos os usuários
$sql = mysql_query("select foto, descricao from galeria where id = $id");
 
// Exibe as informações de cada usuário
while ($usuario = mysql_fetch_object($sql)) {
	
$descricao=$usuario->descricao;

	// Exibimos a foto
	echo "
	<div class='foto'>
		<img src='galeria/".$usuario->foto."' alt='Foto da galeria'/>
		<div class='ft'>$descricao</div>
	</div>";
}

?>

</body>
</html>