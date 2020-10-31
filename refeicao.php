﻿<!DOCTYPE html>
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
            	<li class=""><a href="avaliacao.php">Avaliação</a></li>
                <li class=""><a href="historico.php">Histórico</a></li>
                <li class="ativa"><a href="dieta.php">Dieta</a></li>
                <li class=""><a href="alunos.php">Alunos</a></li>
                <li class=""><a href="galeria.php">Galeria</a></li>
			</ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
            </ul>
	</div> 
</nav>

<?php include_once "validar.php"; include"function.php"; include "banco.php"; include "erros.php"; ?>

<!-- Conteúdo -->
<main class="container-fluid">
	<div class="row">
		<div class="col-md-offset-2 col-md-8">
        	<div class="panel panel-default">
            	<div class="panel-body">
              		<ul class="nav nav-tabs">
                		<li class="active"> <a>Nova Refeição</a> </li>
                		<li class="cinzaEscuro">
                        	<a href="incluirdieta.php">&nbsp;Voltar&nbsp;</a>
                		</li>
              		</ul>
<br>                    
        <form class="form-horizontal" role="form" method="post" action="">
        		<div class="form-group">
                        <div class="col-sm-4">
                            <input type="text" name="refeicao" class="form-control" id="refeicao" value="<?php if(isset($_POST['refeicao'])) echo $_POST['refeicao']; ?>" autofocus placeholder="Digite a nova refeição">
                        </div>
                        <div class="col-sm-2">
                        <button type="submit" class="btn btn-default active">Salvar</button>
                        </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-5">
                        <?php if(isset($_POST['refeicao'])) validar_refeicao(); ?>
                    </div>
                </div>

		</form>
	<br>                    
                    <ul class="nav nav-tabs">
                    <li class="active">
                        <a>Refeições</a>
                    </li>
                </ul>
                            
                     <div style="overflow-x:auto;" class="relatorio">
                	<table>
                        <tr>
                          <th>Id</th>
                          <th>Refeição</th>
                          <th>Alterar</th>
                          <th>Excluir</th>
                        </tr>
                        <div id="buscar">
                        <?php                        
                            {$sql = "select * from refeicao order by id desc limit 10";
                            $querybanco = mysql_query($sql) or die (mysql_error());
                            
                            while($l = mysql_fetch_array($querybanco)){
                            
								$id=$l['id'];
								$refeicao=$l['refeicao'];
                              
                        echo" 
                        <tr>
                          <td>$id</td>
                          <td>$refeicao</td>
                          <td> <a href='alterarrefeicao.php?id=$id'><span id='amarelo' class='glyphicon glyphicon-pencil'></span></a> </td>
						  <td> <a href='excluirrefeicao.php?id=$id'><span id='vermelho' class='glyphicon glyphicon-trash'></span></a> </td>
                        </tr>";
                            }
                        }
                        ?>
                        </div>
                  	</table>
                </div>
        	</div>
    	</div>
	</div>
</div>
</main>
<br><br><br>

<?php include "rodape.php"; ?>
<?php
if(validar_refeicao() == '0'){

$refeicao=$_POST['refeicao'];

$sql = mysql_query("insert into refeicao(refeicao)
values('$refeicao')") or die ("<script>errosubmitrefeicao()</script>" . mysql_error());

if(!mysql_error())
	{echo"<script>submitrefeicao()</script>";}
	
}

?>
</body>
</html>