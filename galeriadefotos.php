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
	<header class="container-fluid"> 
	<div class="row" id="grad">
    	<section>
        	<div class="col-md-9 col-sm- col-xs-12">
            	<h1 class="textoSombra negrito"> Liamar Silva </h1> 
        	</div>
            <div class="col-md-12 col-sm- col-xs-12 text-center">
                <h1 class="textoSombra negrito"> Galeria de Fotos </h1> <br><br> 
        	</div>
		</section>
    </div>
</header>

<!-- Conteúdo -->
<main class="container-fluid">

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
$sql = mysql_query("select id, foto, descricao from galeria order by id desc");
 
// Exibe as informações de cada usuário
while ($usuario = mysql_fetch_object($sql)) {
	
	$id=$usuario->id;
	$descricao=$usuario->descricao;
	
	$tam = strlen($descricao);
	$max = 12;
	
	if($tam > $max)
		{$texto = substr_replace($descricao, "...", $max, $tam - $max);}
	else
		{($texto=$descricao);}
	
	// Exibimos a foto
	//echo "<img src='fotos/".$usuario->foto."' alt='Foto de exibição' /><br /> <br>";
	//echo "<img src='fotos/".$usuario->foto2."' alt='Foto de exibição' /><br />";
	echo"
	<div class='img'>
		<a href='visualizarfoto.php?id=$id'>
			<img src='galeria/".$usuario->foto."' alt='Foto da galeria' width='300' height='200'/>
		</a>
		<div class='desc'>$texto</div>
	</div>";
}

?>

</main>
<br><br><br>

<!-- Rodapé -->
<footer class="container-fluid ativa">
	<div class="row"> 
    	<div class="col-md-12 text-center">
        	<p style="padding-top:10px"> Todos os direitos reservados </p>
        </div>
    </div> 
</footer>
</body>
</html>