<?php $menu='galeria'; include"menu.php"; include_once "validar.php"; include"function.php"?>

<!-- Conteúdo -->
<main class="container-fluid">
	<div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                    	<ul class="nav nav-tabs">
                            <li class="active">
                                <a>Buscar</a>
                            </li>
                            <?php if(isset($_POST['busca']))
							echo"<li class='cinzaEscuro'> <a href='galeria.php'>&nbsp;Voltar&nbsp;</a> </li>"
;						  else
						    {echo"<li class='cinzaEscuro'>
                            	<a href='inserirfotos.php'>Inserir</a>
                            </li>
                            <li class='cinzaEscuro'>
                            	<a href='galeriadefotos.php'>Galeria</a>
                            </li>";} ?>
                		</ul>
    <br>
        			<form class="form-horizontal" role="form" method="post" action="">
                        <div class="form-group">
                            <div class="col-sm-3"> 
                            	<input type="text" name="busca" class="form-control" id="busca" value="<?php if(isset($_POST['busca'])) echo $_POST['busca']; ?>" autofocus placeholder="Digite sua busca">
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-default active">Buscar</button>
                            </div>
<br>
                            <div class="col-sm-12">
                            	<?php  ?>
                        	</div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-5">
                                <?php if(isset($_POST['busca'])) validar_busca(); ?>
                            </div>
                		</div>
                	</form>
	<br> 
                        
                        <ul class="nav nav-tabs">
             				<li class="active">
                				<?php if(isset($_POST['busca'])) 
										{echo "<a>Resultado da Busca</a>";} 
							  		  else 
										{echo"<a>Últimas Fotos</a>";};?>
                        	</li>
            			</ul>

<br><br>

<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
include "banco.php";

$descricao=$_POST['busca'];
						
if(isset($_POST['busca']))
	{$comando = "where descricao like '%".$descricao."%' order by id desc";}
else 
	{$comando = "order by id desc limit 24";}

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
$sql = mysql_query("select * from galeria $comando");
 
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
		<div class='text-center'>
			<a href='alterarfoto.php?id=$id'><span id='amarelo' class='glyphicon glyphicon-pencil'></span></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href='excluirfoto.php?id=$id'><span id='vermelho' class='glyphicon glyphicon-trash'></span></a>
		</div>
	</div>";
}

?>

				</div> <br>
			</div>
		</div>
	</div>
</main>
<br><br><br>

<?php include "rodape.php"; ?>
</body>
</html>