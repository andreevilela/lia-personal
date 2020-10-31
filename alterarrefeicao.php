<?php $menu='dieta'; include"menu.php"; include_once "validar.php";?>

<!-- Conteúdo -->
<main class="container-fluid">
	<div class="row">
		<div class="col-md-offset-2 col-md-8">
        	<div class="panel panel-default">
            	<div class="panel-body">
              	<ul class="nav nav-tabs">
                	<li class="active"> <a>Alterar Refeição</a> </li>
              	</ul>
<br>

<?php
	error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
		include "banco.php";
		
		$id = $_GET['id'];
		
		{$sql = "select * from refeicao where id = '$id'";
                            $querybanco = mysql_query($sql) or die (mysql_error());
                            
                            while($l = mysql_fetch_array($querybanco)){
                                
                                $id=$l['id'];
								$refeicao=$l['refeicao'];
                            }
                        }
	?>

        <form class="form-horizontal" role="form" method="post" action="alteradorefeicao.php">
        	<input type="hidden" name="id" id="id" value="<?php print"$id"; ?>" placeholder="">
        		<div class="form-group">
                        <div class="col-sm-4">
                            <input type="text" name="refeicao" class="form-control" id="refeicao" autofocus required value="<?php print"$refeicao"; ?>" placeholder="">
                        </div>
                </div>
<br>
                <div class="form-group"> 
                    <div class="col-sm-4">
                    <button type="submit" class="btn btn-default active">Alterar</button>
                    <a href="refeicao.php"><button type="button" class="btn btn-default active">Cancelar</button></a>
                    </div>
                 </div>
		</form>
        	</div>
    	</div>
	</div>
</div>
</main>
<br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php include "rodape.php"; ?>
</body>
</html>