<?php $menu='galeria'; include"menu.php"; include_once "validar.php";?>

<!-- Conteúdo -->
<main class="container-fluid">
	<div class="row">
		<div class="col-md-offset-2 col-md-8">
        	<div class="panel panel-default">
            	<div class="panel-body">
                	<ul class="nav nav-tabs">
                    	<li class="active">
                        	<a>Alterar Descrição</a>
                    	</li>
                	</ul>
    <br><br>
    
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

$tam = strlen($descricao);
	$max = 12;
	
	if($tam > $max)
		{$texto = substr_replace($descricao, "...", $max, $tam - $max);}
	else
		{($texto=$descricao);}

	// Exibimos a foto
	echo "
		<div class='img'>
			<img src='galeria/".$usuario->foto."' alt='Foto de exibição' />
			<div class='desc'>$texto</div>
			
		</div>";
}

?>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    
        <form class="form-horizontal" role="form" method="post" action="alteradofoto.php" enctype="multipart/form-data">
        	<input type="hidden" name="id" id="id" value="<?php print"$id"; ?>" placeholder="">
              
                <div class="form-group">
                	<label class="control-label col-sm-2">Descrição</label> <br>
                        <div class="col-sm-5"> 
                            <input type="text" name="descricao" class="form-control" id="descricao" autofocus required value="<?php echo"$descricao" ?>" placeholder="Descrição da Foto">
                        </div>
                </div>         
	<br>
                                
                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default active">Alterar</button>
                            <a href="galeria.php"><button type="button" class="btn btn-default active">Cancelar</button></a>
                            </div>
                        </div>
        </form>
        	</div>
        </div>
    </div>
</div>

</main>
<br><br><br>

<?php include "rodape.php"; ?>
</body>
</html>