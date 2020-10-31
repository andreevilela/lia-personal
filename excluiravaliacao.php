<?php $menu='avaliacao'; include"menu.php"; include_once "validar.php";?>

<!-- Conteúdo -->
<main class="container-fluid">
	<div class="row">
		<div class="col-md-offset-2 col-md-8">
        	<div class="panel panel-default">
            	<div class="panel-body">
                	<ul class="nav nav-tabs">
                    	<li class="active">
                        	<a>Excluir Avaliação</a>
                    	</li>
                	</ul>
    <br>
    
    <?php
	error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
		include "banco.php";
		
		$id = $_GET['id'];
		
		{$sql = "select avaliacao.id, alunos.id, alunos.nome, alunos.data_nascimento, avaliacao.peso, avaliacao.altura, avaliacao.data, avaliacao.biceps, avaliacao.peitoral, avaliacao.cintura, avaliacao.abdome, avaliacao.quadril, avaliacao.coxa, avaliacao.tr, avaliacao.si, avaliacao.se, avaliacao.ab from avaliacao
inner join alunos on avaliacao.fk_aluno = alunos.id where avaliacao.id = '$id'";
                            $querybanco = mysql_query($sql) or die (mysql_error());
                            
                            while($l = mysql_fetch_array($querybanco)){
                                
                                $id_aluno=$l['id'];
								$fk_aluno=$l['nome'];
								$data_nascimento=$l['data_nascimento'];
								$peso=$l['peso'];
								$altura=$l['altura'];
								$date=$l['data'];
								$biceps=$l['biceps'];
								$peitoral=$l['peitoral'];
								$cintura=$l['cintura'];
								$abdome=$l['abdome'];
								$quadril=$l['quadril'];
								$coxa=$l['coxa'];
								$tr=$l['tr'];
								$si=$l['si'];
								$se=$l['se'];
								$ab=$l['ab'];
								
								$data = date("d/m/Y", strtotime($date));
                            }
                        }		
	
	?>
    
        <form class="form-horizontal" role="form" method="post" action="excluidoavaliacao.php" enctype="multipart/form-data">
        	<input type="hidden" name="id" id="id" value="<?php print"$id"; ?>" placeholder="">
                <div class="form-group">
                    <label class="control-label col-sm-2">Aluno</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="aluno" id="aluno" disabled>
                                <?php 
								error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
								include "banco.php";
								
								echo" <option> $fk_aluno - $id_aluno </option> ";
						
								{$sql = "select id, nome from alunos where status = 'Ativo' order by id desc";
								$querybanco = mysql_query($sql) or die (mysql_error());
								
								while($l = mysql_fetch_array($querybanco)){
									
									$cod=$l['id'];
									$nome=$l['nome'];
									
								echo" <option> $nome - $cod </option> ";
									}
								}
								?>
                            </select>
                        </div>
                    <label class="control-label col-sm-2"></label>
                    <div class="col-sm-10">
                        <?php  ?>
                    </div>
                </div>
                <div class="form-group">
                	<label class="control-label col-sm-2">Peso</label>
                        <div class="col-sm-4"> 
                            <input type="number" step=0.01 name="peso" class="form-control" id="peso" disabled value="<?php print"$peso"; ?>" placeholder="">
                        </div>
                	
                    <label class="control-label col-sm-2">Idade</label>
                        <div class="col-sm-4"> 
                            <input type="text" name="idade" class="form-control" id="idade" disabled value="Automático"  placeholder="">
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
                	<label class="control-label col-sm-2">Altura</label>
                        <div class="col-sm-4"> 
                            <input type="number" step=0.01 name="altura" class="form-control" id="altura" disabled value="<?php print"$altura"; ?>" placeholder="">
                        </div>
                	
                    <label class="control-label col-sm-2">Data</label>
                        <div class="col-sm-4"> 
                            <input type="text" name="data" class="form-control" id="data" disabled value="<?php print"$data"; ?>" placeholder="dd/mm/aaaa">
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
                
                <?php
					$sql = mysql_query("select foto, foto2 from avaliacao where id = $id");
					 
					// Exibe as informações de cada usuário
					while ($usuario = mysql_fetch_object($sql)) {
					
					// Exibimos a foto
					echo "
						<label class='control-label col-sm-2'>Fotos</label> <br>
						<div class='img'>
							<img src='fotos/".$usuario->foto."' alt='Foto de exibição' />
						</div>
						<div class='img'>
							<img src='fotos/".$usuario->foto2."' alt='Foto de exibição' />
						</div>
						";
				}
				?>
   <br><br><br><br><br><br><br><br><br><br><br><br><br>
                
   <br>             
                 <ul class="nav nav-tabs">
                    <li class="active">
                        <a>Circunferências</a>
                    </li>
                </ul>
    <br>
    			<div class="form-group">
                	<label class="control-label col-sm-2">Bíceps</label>
                        <div class="col-sm-2"> 
                            <input type="number" step=0.01 name="biceps" class="form-control" id="biceps" disabled value="<?php print"$biceps"; ?>" placeholder="">
                        </div>
                	
                    <label class="control-label col-sm-2">Peitoral</label>
                        <div class="col-sm-2"> 
                            <input type="number" step=0.01 name="peitoral" class="form-control" id="peitoral" disabled value="<?php print"$peitoral"; ?>" placeholder="">
                        </div>
                        
                    <label class="control-label col-sm-2">Cintura</label>
                        <div class="col-sm-2"> 
                            <input type="number" step=0.01 name="cintura" class="form-control" id="cintura" disabled value="<?php print"$cintura"; ?>" placeholder="">
                        </div>
                   <label class="control-label col-sm-2"></label>
                        <div class="col-sm-2">
                            <?php  ?>
                        </div>
                    <label class="control-label col-sm-2"></label>
                        <div class="col-sm-2">
                            <?php  ?>
                        </div>
                    <label class="control-label col-sm-2"></label>
                        <div class="col-sm-2">
                            <?php  ?>
                        </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-2">Abdome</label>
                        <div class="col-sm-2"> 
                            <input type="number" step=0.01 name="abdome" class="form-control" id="abdome" disabled value="<?php print"$abdome"; ?>" placeholder="">
                        </div>
                	
                    <label class="control-label col-sm-2">Quadril</label>
                        <div class="col-sm-2"> 
                            <input type="number" step=0.01 name="quadril" class="form-control" id="quadril" disabled value="<?php print"$quadril"; ?>" placeholder="">
                        </div>
                        
                    <label class="control-label col-sm-2">Coxa</label>
                        <div class="col-sm-2"> 
                            <input type="number" step=0.01 name="coxa" class="form-control" id="coxa" disabled value="<?php print"$coxa"; ?>" placeholder="">
                        </div>
                    <label class="control-label col-sm-2"></label>
                        <div class="col-sm-2">
                            <?php  ?>
                        </div>
                    <label class="control-label col-sm-2"></label>
                        <div class="col-sm-2">
                            <?php  ?>
                        </div>
                    <label class="control-label col-sm-2"></label>
                        <div class="col-sm-2">
                            <?php  ?>
                        </div>
                </div>
                
                <br>             
                 <ul class="nav nav-tabs">
                    <li class="active">
                        <a>Dobras Cultâneas</a>
                    </li>
                </ul>
    <br>
    			<div class="form-group">
                	<label class="control-label col-sm-2">TR</label>
                        <div class="col-sm-4"> 
                            <input type="number" step=0.01 name="tr" class="form-control" id="tr" disabled value="<?php print"$tr"; ?>" placeholder="">
                        </div>
                	
                    <label class="control-label col-sm-2">SI</label>
                        <div class="col-sm-4"> 
                            <input type="number" step=0.01 name="si" class="form-control" id="si" disabled value="<?php print"$si"; ?>" placeholder="">
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
                	<label class="control-label col-sm-2">SE</label>
                        <div class="col-sm-4"> 
                            <input type="number" step=0.01 name="se" class="form-control" id="se" disabled value="<?php print"$se"; ?>" placeholder="">
                        </div>
                	
                    <label class="control-label col-sm-2">AB</label>
                        <div class="col-sm-4"> 
                            <input type="number" step=0.01 name="ab" class="form-control" id="ab" disabled value="<?php print"$ab"; ?>" placeholder="">
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
	<br>
                                
                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default active">Excluir</button>
                            <a href="historico.php"><button type="button" class="btn btn-default active">Cancelar</button></a>
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