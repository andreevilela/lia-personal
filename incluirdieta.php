<?php $menu='dieta'; include"menu.php"; include_once "validar.php"; include"function.php"; include "banco.php"; include "erros.php";?>

<!-- Conteúdo -->
<main class="container-fluid">
	<div class="row">
		<div class="col-md-offset-2 col-md-8">
        	<div class="panel panel-default">
            	<div class="panel-body">
                	<ul class="nav nav-tabs">
                    	<li class="active"> <a>Incluir Dieta</a> </li>
                    	<li class="cinzaEscuro"> <a href="horario.php">Horário</a> </li>
                    	<li class="cinzaEscuro"> <a href="refeicao.php">Refeição</a> </li>
                	</ul>
    <br>
        <form class="form-horizontal" role="form" method="post" action="">
                <div class="form-group">
                    <label class="control-label col-sm-2">Aluno</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="aluno" id="aluno" autofocus>
                                <?php 
								if(isset($_POST['aluno'])){echo"<option>".$_POST['aluno']."</option>";}
								else{echo"<option> Selecione um aluno </option>";}
						
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
                        	<?php if(isset($_POST['aluno'])) validar_aluno(); ?>
                        </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Início</label>
                        <div class="col-sm-4"> 
                            <input type="text" name="data" class="form-control" id="data" value="<?php if(isset($_POST['data'])) echo $_POST['data']; ?>" placeholder="dd/mm/aaaa">
                        </div>
                        
                        <label class="control-label col-sm-2">Fim</label>
                        <div class="col-sm-4"> 
                            <input type="text" name="ate" class="form-control" id="ate" value="<?php if(isset($_POST['ate'])) echo $_POST['ate']; ?>" placeholder="dd/mm/aaaa">
                        </div>
                        <label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                        	<?php if(isset($_POST['data'])) validar_data()?>
                        </div>
                         <label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                        	<?php if(isset($_POST['data'])) validar_ate()?>
                        </div>
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2">Horário</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="horario1" id="horario1">
                                <?php						
								{$sql = "select horario from horario order by id";
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
                                <?php						
								{$sql = "select refeicao from refeicao order by id";
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
                                <?php						
								{$sql = "select horario from horario order by id";
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
                                <?php						
								{$sql = "select refeicao from refeicao order by id";
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
                                <?php
								{$sql = "select horario from horario order by id";
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
                                <?php
								{$sql = "select refeicao from refeicao order by id";
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
                                <?php
								{$sql = "select horario from horario order by id";
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
                                <?php
								{$sql = "select refeicao from refeicao order by id";
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
                                <?php
								{$sql = "select horario from horario order by id";
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
                                <?php
								{$sql = "select refeicao from refeicao order by id";
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
                                <?php
								{$sql = "select horario from horario order by id";
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
                                <?php
								{$sql = "select refeicao from refeicao order by id";
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
                                <?php
								{$sql = "select horario from horario order by id";
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
                                <?php
								{$sql = "select refeicao from refeicao order by id";
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
                                <?php
								{$sql = "select horario from horario order by id";
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
                                <?php
								{$sql = "select refeicao from refeicao order by id";
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
                    <label class="control-label col-sm-2">Observação</label>
                        <div class="col-sm-10"> 
                                <textarea class="form-control" rows="5" name="observacao" id="observacao"><?php if(isset($_POST['observacao'])) echo $_POST['observacao']; ?></textarea>
                        </div>
                </div>         
                    <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default active">Salvar</button>
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
<?php

//if(($_POST['aluno'] != 'Selecione um aluno') and ($_POST['aluno'] != '') and ($_POST['data'] != '') and ($_POST['ate'] != '')){
	
if((validar_aluno() == '0') and (validar_data() == '0') and (validar_ate() == '0')){

$aluno=$_POST['aluno'];
$data=$_POST['data'];
$ate=$_POST['ate'];
$horario1=$_POST['horario1'];
$refeicao1=$_POST['refeicao1'];
$horario2=$_POST['horario2'];
$refeicao2=$_POST['refeicao2'];
$horario3=$_POST['horario3'];
$refeicao3=$_POST['refeicao3'];
$horario4=$_POST['horario4'];
$refeicao4=$_POST['refeicao4'];
$horario5=$_POST['horario5'];
$refeicao5=$_POST['refeicao5'];
$horario6=$_POST['horario6'];
$refeicao6=$_POST['refeicao6'];
$horario7=$_POST['horario7'];
$refeicao7=$_POST['refeicao7'];
$horario8=$_POST['horario8'];
$refeicao8=$_POST['refeicao8'];
$observacao=$_POST['observacao'];

$id_aluno = explode("- ", $aluno);
$id_aluno = "{$id_aluno[1]}";

/*echo "$id <br>";
echo strlen($id);*/

$dados = explode("/",$data);
$date = "{$dados[2]}-{$dados[1]}-{$dados[0]}";

$dados = explode("/",$ate);
$up = "{$dados[2]}-{$dados[1]}-{$dados[0]}";

$sql = mysql_query("insert into dieta(fk_aluno, data, ate, horario1, refeicao1, horario2, refeicao2, horario3, refeicao3, horario4, refeicao4, horario5, refeicao5, horario6, refeicao6, horario7, refeicao7, horario8, refeicao8, observacao)
values($id_aluno, '$date', '$up', '$horario1', '$refeicao1', '$horario2', '$refeicao2', '$horario3', '$refeicao3', '$horario4', '$refeicao4', '$horario5', '$refeicao5', '$horario6', '$refeicao6', '$horario7', '$refeicao7', '$horario8', '$refeicao8', '$observacao')") or die ("<script>errosubmitdieta()</script>" . mysql_error());

if(!mysql_error())
	{echo"<script>submitdieta()</script>";}
}
?>
</body>
</html>