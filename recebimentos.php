<?php $menu='pagamentos'; include"menu.php"; include_once "validar.php"; include"function.php"?>

<?php 
date_default_timezone_set('America/Sao_Paulo');	
	
$data_hoje = date("Y-m-d");

?>

<!-- Conteúdo -->
<main class="container-fluid">
	<div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="nav nav-tabs">
                        	<li class="active"> <a>Buscar</a> </li>
             				<?php if(isset($_POST['busca']))
                            		{echo"<li class='cinzaEscuro'> <a href='recebimentos.php'>&nbsp;Voltar&nbsp;</a> </li>";}
								  else
								  	{echo"<li class='cinzaEscuro'> <a href='pagamentos.php'>&nbsp;Voltar&nbsp;</a> </li>";}?>
            			</ul>
<br>
        			<form class="form-horizontal" role="form" method="post" action="">
                        <div class="form-group">
                            <div class="col-sm-4"> 
                            	<input type="text" name="busca" class="form-control" id="busca" value="<?php if(isset($_POST['busca'])) echo $_POST['busca']; ?>" onfocus="this.style.backgroundColor='#d6f5d6'" autofocus placeholder="Digite sua busca">
                            </div>
<br>
                        </div>
                   <!-- <div class="form-group">
                            <div class="col-sm-5">
                                <?php //if(isset($_POST['busca'])) validar_busca(); ?>
                            </div>
                		</div> -->
                        <div class="form-group">
                            <div class="col-sm-2"> 
                            	<input type="text" name="filtro1" class="form-control" id="filtro1" value="<?php if(isset($_POST['filtro1'])) echo $_POST['filtro1']; ?>" autofocus placeholder="dd/mm/aaaa">
                            </div>
                            <div class="col-sm-2"> 
                            	<input type="text" name="filtro2" class="form-control" id="filtro2" value="<?php if(isset($_POST['filtro2'])) echo $_POST['filtro2']; ?>" autofocus placeholder="dd/mm/aaaa">
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-default active">Buscar</button>
                            </div>
<br>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-5">
                                <?php if(isset($_POST['busca'])) validar_filtro(); 
									  if(isset($_POST['filtro1'])) validar_filtro1();
									  if(isset($_POST['filtro2'])) validar_filtro2();  
								?>
                            </div>
                		</div>
                	</form>
                    
    <br>                    
                    <ul class="nav nav-tabs">
                    <li class="active">
                        <?php 
						error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
						
						$aluno=$_POST['busca'];
						$filtro1=$_POST['filtro1'];
						$filtro2=$_POST['filtro2'];
						
						$busca=$aluno.'_'.$filtro1.'_'.$filtro2;
						
						if(isset($_POST['busca'])) 
								{echo "<a>Resultado da Busca</a>
								<li class='cinzaEscuro'>
								   	<a href='#'>Exportar</a>
								</li>";} 
							  else 
								{echo"<a>Recebimentos do Dia</a>
								<li class='cinzaEscuro'>
								   	<a href='#'>Exportar</a>
								</li>";};?>
                    </li>
                	</ul>
                    
                    <div style="overflow-x:auto;" class="relatorio">
                	<table class="pequena">
                        <tr>
                          <th>Nome</th>
                          <th>Pagamento</th>
                          <th>Status</th>
                          <th>Observação</th>
                          <th>Ver</th>
                          <th>Quitar</th>
                          
                        </tr>
                        <div id="buscar">
                        <?php
						error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
						
						$aluno=$_POST['busca'];
						$filtro1=$_POST['filtro1'];
						$filtro2=$_POST['filtro2'];
						
						$filtro1 = explode("/",$filtro1);
						$filtro1 = "{$filtro1[2]}-{$filtro1[1]}-{$filtro1[0]}";
						$filtro2 = explode("/",$filtro2);
						$filtro2 = "{$filtro2[2]}-{$filtro2[1]}-{$filtro2[0]}";
						
						
						if((isset($_POST['busca'])) && (!empty($_POST['busca'])) && (!empty($_POST['filtro1'])) && (!empty($_POST['filtro2'])))
							{$comando = "where alunos.status ='Ativo' and pagamentos.status = 1 and nome like '%".$aluno."%' and pagamento between '$filtro1' and '$filtro2' order by pagamentos.pagamento";}
						else if((isset($_POST['busca'])) && (!empty($_POST['filtro1'])) && (!empty($_POST['filtro2'])))
							{$comando = "where alunos.status ='Ativo' and pagamentos.status = 1 and pagamento between '$filtro1' and '$filtro2' order by pagamentos.pagamento";}
						else if((isset($_POST['busca'])) && (!empty($_POST['busca'])) && (!empty($_POST['filtro1'])))
							{$comando = "where alunos.status ='Ativo' and pagamentos.status = 1 and pagamento = '$filtro1' order by pagamentos.pagamento";}	
						else if((isset($_POST['busca'])) && (!empty($_POST['filtro1'])))
							{$comando = "where alunos.status ='Ativo' and pagamentos.status = 1 and pagamento = '$filtro1' order by pagamentos.pagamento";}
						else if((isset($_POST['busca'])) && (!empty($_POST['busca'])))
							{$comando = "where alunos.status ='Ativo' and pagamentos.status = 1 and nome like '%".$aluno."%' order by pagamento desc";}
						
						else 
							{$comando = "where alunos.status ='Ativo' and pagamentos.status = 1 and pagamentos.pagamento = '$data_hoje' order by pagamentos.pagamento";}
						
						//echo $comando;
                        include "banco.php";
						
						$contv = 0;
						$contvc = 0;
						$contp = 0;
						
                            {$sql = "select pagamentos.id, alunos.nome, pagamentos.vencimento, pagamentos.status, pagamentos.observacao, pagamentos.pagamento from pagamentos inner join alunos on pagamentos.fk_aluno = alunos.id $comando";
                            $querybanco = mysql_query($sql) or die (mysql_error());
                            
                            while($l = mysql_fetch_array($querybanco)){
                                
                                $id=$l['id'];
                                $nome=$l['nome'];
								$vencimento=$l['vencimento'];
								$status=$l['status'];
								$observacao=$l['observacao'];
								$pagamento=$l['pagamento'];
								
								$pag = date("d/m/Y", strtotime($pagamento));
							
								if (($status == 0) && ($data_hoje > $vencimento))
									{$contvc++; $status = "<span id='vermelho'class='glyphicon glyphicon-warning-sign'></span>"; $quitar = "<a href='quitarpagamento.php?id=$id'><span id='verde' class='glyphicon glyphicon-ok'></span></a>";}
								else if ($status == 0)
									{$contv++; $status = "<span id='azul' class='glyphicon glyphicon-warning-sign'></span>"; $quitar = "<a href='quitarpagamento.php?id=$id'><span id='verde' class='glyphicon glyphicon-ok'></span></a>";}
								else if($status == 1)
									{$contp++; $status = "<span id='verde' class='glyphicon glyphicon glyphicon-ok-circle'></span>"; $quitar = "<a href='recibo.php?id=$id'><span id='amarelo' class='glyphicon glyphicon-download-alt'></span></a>";};
									
                        echo" 
                        <tr>
                            <td> $nome </td>
							<td> $pag </td>
							<td> $status </td>
							<td> $observacao </td>
							<td> <a href='verpagamento.php?id=$id'><span id='azul' class='glyphicon glyphicon-eye-open'></span></a> </td>
							<td> $quitar </td>
                        </tr>";
                            }
                        }
                        ?>
                        </div>
                  	</table>
<br>
                    <?php
						$tot=$contv+$contvc+$contp;
						if($tot >= 1){
							$tot=$contv+$contvc+$contp;
							$estv=$contv/$tot*100;
							$estvc=$contvc/$tot*100;
							$estp=$contp/$tot*100;
							
							$estv=number_format($estv,0)."%";
							$estvc=number_format($estvc,0)."%";
							$estp=number_format($estp,0)."%";
							$esttot='100%';
						}
						else{
							$estv='0%';
							$estvc='0%';
							$estp='0%';
							$esttot='0%';
						};
						echo "&nbsp;&nbsp;&nbsp;&nbsp;<span id='vermelho'class='glyphicon glyphicon-warning-sign'> $contvc </span> &nbsp;&nbsp;&nbsp;&nbsp; <span id='azul' class='glyphicon glyphicon-warning-sign'> $contv </span>  &nbsp;&nbsp;&nbsp;&nbsp; <span id='verde' class='glyphicon glyphicon-ok-circle'> $contp </span> &nbsp;&nbsp;&nbsp;&nbsp; <span id='amarelo' class='glyphicon glyphicon glyphicon-list-alt'> $tot </span>";
						echo "<br><br>";
						echo "&nbsp;&nbsp;&nbsp;&nbsp;<span id='vermelho'class='glyphicon glyphicon-warning-sign'> $estvc </span> &nbsp;&nbsp;&nbsp;&nbsp; <span id='azul' class='glyphicon glyphicon-warning-sign'> $estv </span>  &nbsp;&nbsp;&nbsp;&nbsp; <span id='verde' class='glyphicon glyphicon-ok-circle'> $estp </span> &nbsp;&nbsp;&nbsp;&nbsp; <span id='amarelo' class='glyphicon glyphicon glyphicon-list-alt'> $esttot </span>";

					?>
                </div>
                </div>
                </div>
            </div>
            </div>
</main>
<br><br><br>

<?php include "rodape.php"; ?>
</body>
</html>