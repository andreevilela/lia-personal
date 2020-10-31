<?php $menu='alunos'; include"menu.php"; include_once "validar.php";?>

<!-- Conteúdo -->
<main class="container-fluid">
	<div class="row">
		<div class="col-md-offset-2 col-md-8">
        	<div class="panel panel-default">
            	<div class="panel-body">
                	<ul class="nav nav-tabs">
                    	<li class="active">
                        	<a>Excluir Aluno</a>
                    	</li>
                	</ul>
    <br>
    <?php
	error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
		include "banco.php";
		
		$id = $_GET['id'];
		
		{$sql = "select * from alunos where id = '$id'";
                            $querybanco = mysql_query($sql) or die (mysql_error());
                            
                            while($l = mysql_fetch_array($querybanco)){
                                
                                $id=$l['id'];
								$status=$l['status'];
                                $nome=$l['nome'];
								$sexo=$l['sexo'];
								$date_nascimento=$l['data_nascimento'];
								$telefone=$l['telefone'];
								$celular=$l['celular'];
								$observacao=$l['observacao'];
								
								$data_nascimento = date("d/m/Y", strtotime($date_nascimento));
                            }
                        }
	?>
    
        <form class="form-horizontal" role="form" method="post" action="excluidoaluno.php">
        	<input type="hidden" name="id" id="id" value="<?php print"$id"; ?>" placeholder="">
                <div class="form-group">
                    <label class="control-label col-sm-2">Id</label>
                        <div class="col-sm-4">
                            <input type="number" name="id" disabled class="form-control" id="id" value="<?php print "$id"; ?>" placeholder="">
                        </div>
                
                    <label class="control-label col-sm-2">Status</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="status" id="status" disabled>
                            	<?php if($status == 'Ativo') 
										{ print "<option>Ativo</option>
												 <option>Desativo</option>";}
									  else { print "<option>Desativo</option>
												 <option>Ativo</option>";};
								?>  
                            </select>
                        </div>
                	<label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                        	<?php ?>
                        </div>
                	<label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                        	<?php ?>
                        </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Nome</label>
                        <div class="col-sm-10"> 
                            <input type="text" name="nome" class="form-control" id="nome" disabled value="<?php print "$nome"; ?>" required placeholder="">
                        </div>
               		<label class="control-label col-sm-2"></label>
                        <div class="col-sm-10">
                        	<?php ?>
                        </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Sexo</label>
                        <div class="col-sm-4">
                        	<?php if ($sexo == 'Masculino')
								  	{$masculino = checked;}
								  else {$feminino = checked;};
							 ?>
                            <label class="radio-inline"><input type="radio" name="sexo" disabled value="Masculino" <?php print "$masculino"; ?>>Masculino</label>
                            <label class="radio-inline"><input type="radio" name="sexo" disabled value="Feminino" <?php print "$feminino"; ?>>Feminino</label>
                        </div>
                        
                    <label class="control-label col-sm-2">Data de Nascimento</label>
                        <div class="col-sm-4">
                            <input type="text" name="data_nascimento" class="form-control" id="data" disabled value="<?php print "$data_nascimento"; ?>" placeholder="dd/mm/aaaa">
                        </div>
                    <label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                        	<?php  ?>
                        </div>
                    <label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                        	<?php  ?>
                        </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-2">Telefone</label>
                        <div class="col-sm-4">
                            <input type="text" name="telefone" class="form-control" id="telefone" disabled value="<?php print "$telefone"; ?>" placeholder="0000-0000">
                        </div>
                    <label class="control-label col-sm-2">Celular</label>
                        <div class="col-sm-4">
                            <input type="text" name="celular" class="form-control" id="celular" disabled value="<?php print "$celular"; ?>" placeholder="00000-0000">
                        </div>
                    <label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                        	<?php if(isset($_POST['telefone'])) validar_telefone(); ?>
                        </div>
                    <label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                        	<?php if(isset($_POST['celular'])) validar_celular(); ?>
                        </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2">Observação</label>
                        <div class="col-sm-10"> 
                                <textarea class="form-control" rows="5" name="observacao" id="observacao" disabled><?php print "$observacao"; ?></textarea>
                        </div>
                </div>
                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default active">Excluir</button>
                            <a href="alunos.php"><button type="button" class="btn btn-default active">Cancelar</button></a>
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