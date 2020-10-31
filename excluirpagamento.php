<?php $menu='pagamentos'; include"menu.php"; include_once "validar.php"; include"function.php"; include "banco.php"; include "erros.php";

error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
$cod = $_GET['id'];

								{$sql = "select pagamentos.id, alunos.nome, pagamentos.fk_aluno, pagamentos.vencimento, pagamentos.status, pagamentos.observacao, pagamentos.pagamento from pagamentos inner join alunos on pagamentos.fk_aluno = alunos.id where pagamentos.id=$cod";
                            	$querybanco = mysql_query($sql) or die (mysql_error());
                            
                            	while($l = mysql_fetch_array($querybanco)){
                                
                                $id=$l['id'];
                                $nome=$l['nome'];
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

<!-- Conteúdo -->
<main class="container-fluid">
	<div class="row">
		<div class="col-md-offset-2 col-md-8">
        	<div class="panel panel-default">
            	<div class="panel-body">
                	<ul class="nav nav-tabs">
                    	<li class="active"><a>Excluir Pagamento</a></li>
                	</ul>
    <br>
        <form class="form-horizontal" role="form" method="post" action="excluidopagamento.php">
        	<input type="hidden" name="id" id="id" value="<?php print"$id"; ?>" placeholder="">
                <div class="form-group">
                    <label class="control-label col-sm-2">Aluno</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="aluno" id="aluno" disabled>
                               <?php echo" <option> $nome - $alunosid </option> ";?> 
                            </select>
                        </div>
                	<label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                        	<?php  ?>
                        </div>
                </div>
                <div class="form-group">
                	<label class="control-label col-sm-2">Vencimento</label>
                		<div class="col-sm-4"> 
                			<input type="text" name="vencimento" class="form-control" id="vencimento" value="<?php print"$vencimento"; ?>" placeholder="dd/mm/aaaa" disabled>
                    	</div>
                    <label class="control-label col-sm-2">Status</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="status" id="status" disabled>
                            	<?php if($status==0)
									  	{echo"<option> Receber </option>";}
									else
										{echo"<option> Pago - $pagamento </option>";}?>
                            </select>
                        </div>
                	<label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                        </div>
                    <label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                        </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Observação</label>
                        <div class="col-sm-10"> 
                                <textarea class="form-control" rows="5" name="observacao" id="observacao" disabled><?php print"$observacao"; ?></textarea>
                        </div>
                </div>
                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default active">Excluir</button>
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

</body>
</html>