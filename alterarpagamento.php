<?php $menu='pagamentos'; include"menu.php"; include_once "validar.php"; include"function.php"; include "banco.php"; include "erros.php"?>

<!-- Conteúdo -->
<main class="container-fluid">
	<div class="row">
		<div class="col-md-offset-2 col-md-8">
        	<div class="panel panel-default">
            	<div class="panel-body">
                	<ul class="nav nav-tabs">
                    	<li class="active">
                        	<a>Alterar Pagamento</a>
                    	</li>
                	</ul>
    <br>
    <?php
	error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
	$cod = $_GET['id'];

								{$sql = "select pagamentos.id, alunos.nome, pagamentos.fk_aluno, pagamentos.vencimento, pagamentos.status, pagamentos.observacao, pagamentos.pagamento from pagamentos inner join alunos on pagamentos.fk_aluno = alunos.id where pagamentos.id=$cod";
                            	$querybanco = mysql_query($sql) or die (mysql_error());
                            
                            	while($l = mysql_fetch_array($querybanco)){
                                
                                $id=$l['id'];
                                $aluno=$l['nome'];
								$alunosid=$l['fk_aluno'];
								$vencimento=$l['vencimento'];
								$status=$l['status'];
								$observacao=$l['observacao'];
								$pagamento=$l['pagamento'];
								
								$vencimento = date("d/m/Y", strtotime($vencimento));
								$pagamento = date("d/m/Y", strtotime($pagamento));
									}
								}
?>
    
        <form class="form-horizontal" role="form" method="post" action="">
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
                        	<?php if(isset($_POST['aluno'])) validar_aluno(); ?>
                        </div>
                </div>
                <div class="form-group">
                	<label class="control-label col-sm-2">Vencimento</label>
                		<div class="col-sm-4"> 
                			<input type="text" name="vencimento" class="form-control" id="vencimento" value="<?php if(isset($_POST['vencimento'])) echo $_POST['vencimento']; else echo $vencimento; ?>" placeholder="dd/mm/aaaa">
                    	</div>
                    <label class="control-label col-sm-2">Status</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="status" id="status" autofocus>
                            	<?php if($status == 0) 
										{ print "<option>Receber</option>
												 <option>Pago</option>";}
									  else { print "<option>Pago</option>
												 <option>Receber</option>";};
								?>  
                            </select>
                        </div>
                	<label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                            <?php if(isset($_POST['vencimento'])) validar_vencimento(); ?>
                        </div>
                    <label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                            <?php if(isset($_POST['status'])) validar_status(); ?>
                        </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Observação</label>
                        <div class="col-sm-10"> 
                                <textarea class="form-control" rows="5" name="observacao" id="observacao"><?php if(isset($_POST['observacao'])) echo $_POST['observacao']; else echo $observacao; ?></textarea>
                        </div>
                </div>
                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default active">Alterar</button>
                            <a href="pagamentos.php"><button type="button" class="btn btn-default active">Cancelar</button></a>
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
//if(($_POST['status'] != 'Selecione') and ($_POST['status'] != '') and ($_POST['nome'] != '') and //($_POST['data_nascimento'] != '')){
	
if(isset($_POST['aluno']) and (validar_aluno() == '0') and (validar_vencimento() == '0') and (validar_status() == '0')){

$id=$_POST['id'];
$aluno=$_POST['aluno'];
$vencimento=$_POST['vencimento'];
$status=$_POST['status'];
$observacao=$_POST['observacao'];

$id_aluno = explode("- ", $aluno);
$id_aluno = "{$id_aluno[1]}";

$dados = explode("/",$vencimento);
$vencimento = "{$dados[2]}-{$dados[1]}-{$dados[0]}";

date_default_timezone_set('America/Sao_Paulo');	

if($status == 'Receber'){$status = 0; $pagamento = '';}
else {$status = 1; $pagamento = date("Y-m-d"); }

$sql = "update pagamentos set
		fk_aluno='$id_aluno',
		vencimento='$vencimento',
		status='$status',
		pagamento='$pagamento',
		observacao='$observacao'
	where id = '$id'";

	$querybanco = mysql_query($sql) or die ("<script>erroalteradopagamento()</script>" . mysql_error());

if(!mysql_error())
	{echo"<script>alteradopagamento()</script>";}

	
}

?>
</body>
</html>