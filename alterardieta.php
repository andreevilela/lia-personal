<?php $menu='dieta'; include"menu.php"; include_once "validar.php";?>

<!-- Conteúdo -->
<main class="container-fluid">
	<div class="row">
		<div class="col-md-offset-2 col-md-8">
        	<div class="panel panel-default">
            	<div class="panel-body">
                	<ul class="nav nav-tabs">
                    	<li class="active"> <a>Alterar Dieta</a> </li>
                	</ul>    
<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
include "banco.php";

$cod = $_GET['id'];

$sql = "select dieta.id, alunos.nome, dieta.fk_aluno, dieta.data, dieta.ate, dieta.horario1, dieta.refeicao1, dieta.horario2, dieta.refeicao2, dieta.horario3, dieta.refeicao3, dieta.horario4, dieta.refeicao4, dieta.horario5, dieta.refeicao5, dieta.horario6, dieta.refeicao6, dieta.horario7, dieta.refeicao7, dieta.horario8, dieta.refeicao8, dieta.observacao from dieta inner join alunos on dieta.fk_aluno = alunos.id where dieta.id=$cod";

$querybanco = mysql_query($sql) or die (mysql_error());

$l = mysql_fetch_array($querybanco);

	$alunosid=$l['fk_aluno'];
	$aluno=$l['nome'];
	$date=$l['data'];
	$up=$l['ate'];
	$horario1=$l['horario1'];
	$refeicao1=$l['refeicao1'];
	$horario2=$l['horario2'];
	$refeicao2=$l['refeicao2'];
	$horario3=$l['horario3'];
	$refeicao3=$l['refeicao3'];
	$horario4=$l['horario4'];
	$refeicao4=$l['refeicao4'];
	$horario5=$l['horario5'];
	$refeicao5=$l['refeicao5'];
	$horario6=$l['horario6'];
	$refeicao6=$l['refeicao6'];
	$horario7=$l['horario7'];
	$refeicao7=$l['refeicao7'];
	$horario8=$l['horario8'];
	$refeicao8=$l['refeicao8'];
	$observacao=$l['observacao'];
	
	$data = date("d/m/Y", strtotime($date));
	
	$ate = date("d/m/Y", strtotime($up));
	
?>
    <br>
        <form class="form-horizontal" role="form" method="post" action="alteradodieta.php">
        	<input type="hidden" name="id" id="id" value="<?php print"$cod"; ?>" placeholder="">
                <div class="form-group">
                    <label class="control-label col-sm-2">Aluno</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="aluno" id="aluno" autofocus>
                                <?php include "banco.php";
								
								echo"<option> $aluno - $alunosid </option>";
						
								{$sql = "select id, nome from alunos where status = 'Ativo' order by nome";
								$querybanco = mysql_query($sql) or die (mysql_error());
								
								while($l = mysql_fetch_array($querybanco)){
									
									$id=$l['id'];
									$nome=$l['nome'];
									
								echo" <option> $nome - $id </option> ";
									}
								}
								?>
                            </select>
                        </div>
                    <label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                        	<?php  ?>
                        </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Início</label>
                        <div class="col-sm-4"> 
                            <input type="text" name="data" class="form-control" id="data" value=<?php print"$data"; ?> placeholder="dd/mm/aaaa">
                        </div>
                        
                        <label class="control-label col-sm-2">Fim</label>
                        <div class="col-sm-4"> 
                            <input type="text" name="ate" class="form-control" id="ate" value="<?php print"$ate"; ?>" placeholder="dd/mm/aaaa">
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
                <label class="control-label col-sm-2">Horário</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="horario1" id="horario1">
                                <?php include "banco.php";
								
								echo"<option> $horario1 </option>";
						
								{$sql = "select horario from horario order by horario asc";
								$querybanco = mysql_query($sql) or die (mysql_error());
								
								while($l = mysql_fetch_array($querybanco)){
									
									$horario=$l['horario'];
									
								echo" <option> $horario </option> ";
									}
								}
								?>
                            </select>
                        </div>
                <label class="control-label col-sm-2">Refeição</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="refeicao1" id="refeicao1">
                                <?php include "banco.php";
								
								echo"<option> $refeicao1 </option>";
						
								{$sql = "select refeicao from refeicao order by refeicao asc";
								$querybanco = mysql_query($sql) or die (mysql_error());
								
								while($l = mysql_fetch_array($querybanco)){
									
									$refeicao=$l['refeicao'];
									
								echo" <option> $refeicao </option> ";
									}
								}
								?>
                            </select>
                        </div>        
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2">Horário</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="horario2" id="horario2">
                                <?php include "banco.php";
								
								echo"<option> $horario2 </option>";
						
								{$sql = "select horario from horario order by horario asc";
								$querybanco = mysql_query($sql) or die (mysql_error());
								
								while($l = mysql_fetch_array($querybanco)){
									
									$horario=$l['horario'];
									
								echo" <option> $horario </option> ";
									}
								}
								?>
                            </select>
                        </div>
                <label class="control-label col-sm-2">Refeição</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="refeicao2" id="refeicao2">
                                <?php include "banco.php";
								
								echo"<option> $refeicao2 </option>";
						
								{$sql = "select refeicao from refeicao order by refeicao asc";
								$querybanco = mysql_query($sql) or die (mysql_error());
								
								while($l = mysql_fetch_array($querybanco)){
									
									$refeicao=$l['refeicao'];
									
								echo" <option> $refeicao </option> ";
									}
								}
								?>
                            </select>
                        </div>        
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2">Horário</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="horario3" id="horario3">
                                <?php include "banco.php";
								
								echo"<option> $horario3 </option>";
						
								{$sql = "select horario from horario order by horario asc";
								$querybanco = mysql_query($sql) or die (mysql_error());
								
								while($l = mysql_fetch_array($querybanco)){
									
									$horario=$l['horario'];
									
								echo" <option> $horario </option> ";
									}
								}
								?>
                            </select>
                        </div>
                <label class="control-label col-sm-2">Refeição</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="refeicao3" id="refeicao3">
                                <?php include "banco.php";
								
								echo"<option> $refeicao3 </option>";
						
								{$sql = "select refeicao from refeicao order by refeicao asc";
								$querybanco = mysql_query($sql) or die (mysql_error());
								
								while($l = mysql_fetch_array($querybanco)){
									
									$refeicao=$l['refeicao'];
									
								echo" <option> $refeicao </option> ";
									}
								}
								?>
                            </select>
                        </div>        
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2">Horário</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="horario4" id="horario4">
                                <?php include "banco.php";
								
								echo"<option> $horario4 </option>";
						
								{$sql = "select horario from horario order by horario asc";
								$querybanco = mysql_query($sql) or die (mysql_error());
								
								while($l = mysql_fetch_array($querybanco)){
									
									$horario=$l['horario'];
									
								echo" <option> $horario </option> ";
									}
								}
								?>
                            </select>
                        </div>
                <label class="control-label col-sm-2">Refeição</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="refeicao4" id="refeicao4">
                                <?php include "banco.php";
								
								echo"<option> $refeicao4 </option>";
						
								{$sql = "select refeicao from refeicao order by refeicao asc";
								$querybanco = mysql_query($sql) or die (mysql_error());
								
								while($l = mysql_fetch_array($querybanco)){
									
									$refeicao=$l['refeicao'];
									
								echo" <option> $refeicao </option> ";
									}
								}
								?>
                            </select>
                        </div>        
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2">Horário</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="horario5" id="horario5">
                                <?php include "banco.php";
								
								echo"<option> $horario5 </option>";
						
								{$sql = "select horario from horario order by horario asc";
								$querybanco = mysql_query($sql) or die (mysql_error());
								
								while($l = mysql_fetch_array($querybanco)){
									
									$horario=$l['horario'];
									
								echo" <option> $horario </option> ";
									}
								}
								?>
                            </select>
                        </div>
                <label class="control-label col-sm-2">Refeição</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="refeicao5" id="refeicao5">
                                <?php include "banco.php";
								
								echo"<option> $refeicao5 </option>";
						
								{$sql = "select refeicao from refeicao order by refeicao asc";
								$querybanco = mysql_query($sql) or die (mysql_error());
								
								while($l = mysql_fetch_array($querybanco)){
									
									$refeicao=$l['refeicao'];
									
								echo" <option> $refeicao </option> ";
									}
								}
								?>
                            </select>
                        </div>        
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2">Horário</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="horario6" id="horario6">
                                <?php include "banco.php";
								
								echo"<option> $horario6 </option>";
						
								{$sql = "select horario from horario order by horario asc";
								$querybanco = mysql_query($sql) or die (mysql_error());
								
								while($l = mysql_fetch_array($querybanco)){
									
									$horario=$l['horario'];
									
								echo" <option> $horario </option> ";
									}
								}
								?>
                            </select>
                        </div>
                <label class="control-label col-sm-2">Refeição</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="refeicao6" id="refeicao6">
                                <?php include "banco.php";
								
								echo"<option> $refeicao6 </option>";
						
								{$sql = "select refeicao from refeicao order by refeicao asc";
								$querybanco = mysql_query($sql) or die (mysql_error());
								
								while($l = mysql_fetch_array($querybanco)){
									
									$refeicao=$l['refeicao'];
									
								echo" <option> $refeicao </option> ";
									}
								}
								?>
                            </select>
                        </div>        
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2">Horário</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="horario7" id="horario7">
                                <?php include "banco.php";
								
								echo"<option> $horario7 </option>";
						
								{$sql = "select horario from horario order by horario asc";
								$querybanco = mysql_query($sql) or die (mysql_error());
								
								while($l = mysql_fetch_array($querybanco)){
									
									$horario=$l['horario'];
									
								echo" <option> $horario </option> ";
									}
								}
								?>
                            </select>
                        </div>
                 <label class="control-label col-sm-2">Refeição</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="refeicao7" id="refeicao7">
                                <?php include "banco.php";
								
								echo"<option> $refeicao7 </option>";
						
								{$sql = "select refeicao from refeicao order by refeicao asc";
								$querybanco = mysql_query($sql) or die (mysql_error());
								
								while($l = mysql_fetch_array($querybanco)){
									
									$refeicao=$l['refeicao'];
									
								echo" <option> $refeicao </option> ";
									}
								}
								?>
                            </select>
                        </div>
                 </div>
                 <div class="form-group">
                 <label class="control-label col-sm-2">Horário</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="horario8" id="horario8">
                                <?php include "banco.php";
								
								echo"<option> $horario8 </option>";
						
								{$sql = "select horario from horario order by horario asc";
								$querybanco = mysql_query($sql) or die (mysql_error());
								
								while($l = mysql_fetch_array($querybanco)){
									
									$horario=$l['horario'];
									
								echo" <option> $horario </option> ";
									}
								}
								?>
                            </select>
                        </div>
                 <label class="control-label col-sm-2">Refeição</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="refeicao8" id="refeicao8">
                                <?php include "banco.php";
								
								echo"<option> $refeicao8 </option>";
						
								{$sql = "select refeicao from refeicao order by refeicao asc";
								$querybanco = mysql_query($sql) or die (mysql_error());
								
								while($l = mysql_fetch_array($querybanco)){
									
									$refeicao=$l['refeicao'];
									
								echo" <option> $refeicao </option> ";
									}
								}
								?>
                            </select>
                        </div>
                 </div>
                 
                <!--
                <div class="form-group">
                	<label class="control-label col-sm-2">Opções</label>
                    	<div class="col-sm-10">
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Option 1</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Option 2</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Option 3</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Option 1</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Option 2</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Option 3</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Option 1</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Option 2</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Option 3</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Option 1</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Option 2</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Option 3</label>
                            </div>
                 		</div>
                 </div>
                 -->
                
         		<div class="form-group">
                    <label class="control-label col-sm-2">Observação</label>
                        <div class="col-sm-10"> 
                                <textarea class="form-control" rows="5" name="observacao" id="observacao" > <?php print"$observacao"; ?> </textarea>
                        </div>
                </div>         
                    <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default active">Alterar</button>
                        <a href="dieta.php"><button type="button" class="btn btn-default active">Cancelar</button></a>
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