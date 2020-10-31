<?php $menu='pagamentos'; include"menu.php"; include_once "validar.php"; include"function.php"; include "banco.php"; include "erros.php"?>

<?php

$get = $_GET['minhaVariavel'];

{$sql = "select * from pagamentos where pagamentos.id=$get";
                            	$querybanco = mysql_query($sql) or die (mysql_error());
                            
                            	while($l = mysql_fetch_array($querybanco)){
                                
                                $id=$l['id'];
								$id_aluno=$l['fk_aluno'];
								$vencimento=$l['vencimento'];
								$status=$l['status'];
								$observacao=$l['observacao'];
								$pagamento=$l['pagamento'];
									}
								}
							
date_default_timezone_set('America/Sao_Paulo');	

$status = 1;								
$pagamento = date("Y-m-d");

//echo "$id_aluno $vencimento $status $observacao $pagamento";

$sql = "update pagamentos set
		fk_aluno='$id_aluno',
		vencimento='$vencimento',
		status='$status',
		pagamento='$pagamento',
		observacao='$observacao'
	where id = '$id'";

	$querybanco = mysql_query($sql) or die ("<script>erroquitar()</script>" . mysql_error());

if(!mysql_error())
	{echo"<script>quitado()</script>";
	 echo"<script> var id = '$id_aluno'; incluirpagamento()</script>";}

?>
</body>
</html>