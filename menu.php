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

  <body class="fundo">
<!-- Cabeçalho -->
<header class="container-fluid"> 
	<div class="row">
    	<section class="col-md-12">
        	<h1 class="textoSombra negrito"> Liamar Silva </h1> 
        </section>
    </div>
</header>

<!-- Navegação -->
<nav class="navbar navbar-defaut"> 
	<div class="container-fluid">
    	<div class="navbar-header">
        	<a class="navbar-brand" href="index.php">Home</a>
		</div>
            <ul class="nav navbar-nav">
            	<li class="<?php if($menu == 'avaliacao'){echo "ativa";};?>"><a href="avaliacao.php">Avaliações</a></li>
                <!-- <li class="dropdown <?php // if($menu == 'avaliacao'){echo ativa;};?>">
                	<a class="dropdown-toggle" data-toggle="dropdown" href="avaliacao.php">Avaliação
                    <span class="caret"></span></a>
                	<ul class="dropdown-menu">
                		<li><a href="#">Page 1-1</a></li>
                		<li><a href="#">Page 1-2</a></li>
                		<li><a href="#">Page 1-3</a></li>
                	</ul>
                </li> -->
                <li class="<?php if($menu == 'historico'){echo"ativa";};?>"><a href="historico.php">Históricos</a></li>
                <li class="<?php if($menu == 'dieta'){echo"ativa";};?>"><a href="dieta.php">Dietas</a></li>
                <li class="<?php if($menu == 'alunos'){echo"ativa";};?>"><a href="alunos.php">Alunos</a></li>
                <li class="<?php if($menu == 'pagamentos'){echo"ativa";};?>"><a href="pagamentos.php">Pagamentos</a></li>
                <li class="<?php if($menu == 'galeria'){echo"ativa";};?>"><a href="galeria.php">Galeria</a></li>
			</ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
            </ul>
	</div> 
</nav>