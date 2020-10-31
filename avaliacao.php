<?php $menu='avaliacao'; include"menu.php"; include_once "validar.php"; include"function.php";?>

<!-- Conteúdo -->
<main class="container-fluid">
	<div class="row">
		<div class="col-md-offset-2 col-md-8">
        	<div class="panel panel-default">
            	<div class="panel-body">
              	<ul class="nav nav-tabs">
                	<li class="active"> <a>Buscar</a> </li>
                    <?php if(isset($_POST['busca']))
							echo"<li class='cinzaEscuro'> <a href='avaliacao.php'>&nbsp;Voltar&nbsp;</a> </li>"
;						  else
						    {echo"<li class='cinzaEscuro'> <a href='novaavaliacao.php'>&nbsp;Nova&nbsp;</a> </li>";} ?>                	
              	</ul>
<br>
        <form class="form-horizontal" role="form" method="post" action="">
        		<div class="form-group">
                        <div class="col-sm-5">
                            <select class="form-control" name="busca" id="busca" autofocus>
                                <?php
								error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
								include "banco.php";
								
								echo" <option> Selecione para buscar </option> ";
						
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
                        <div class="col-sm-2">
                        <button type="submit" class="btn btn-default active">Buscar</button>
                        </div>
                </div>     
                <div class="form-group">
                        <div class="col-sm-5">
                        	<?php if(isset($_POST['busca'])) validar_busca(); ?>
                        </div>
                </div>
		</form>
	<br>                    
                    <ul class="nav nav-tabs">
                    <li class="active">
                        <?php if(isset($_POST['busca'])) 
								{$aluno=$_POST['busca'];
								$id_nome = explode("- ", $aluno);
								$cod = "{$id_nome[1]}";
								echo "<a>{$id_nome[0]}</a>";} 
							  else 
								{echo"<a>Últimas Avaliações</a>";} 
							  echo"<li class='cinzaEscuro'>
								   	<a href='exportaravaliacao.php?id=$cod'>Exportar</a>
								   </li>"?>
                    </li>
                </ul>
                            
                     <div style="overflow-x:auto;" class="relatorio">
                	<table class="pequena">
                        <tr>
                          <th>Data</th>
                          <th>Nome</th>
                          <th>SM</th> 
                          <th>%G</th>
                          <th>GT</th>
                          <th>MM</th>
                          <th>Fotos</th>
                        </tr>
                        <div id="buscar">
                        <?php
						
						if(isset($_POST['busca']))
							{$comando = "where avaliacao.fk_aluno ='$cod' order by id desc";}
						else 
							{$comando = "order by id desc limit 10";}
							
                        include "banco.php";
                        
                            {$sql = "select avaliacao.id, alunos.nome, avaliacao.peso, avaliacao.altura, avaliacao.data, avaliacao.biceps, avaliacao.peitoral, avaliacao.cintura, avaliacao.abdome, avaliacao.quadril, avaliacao.coxa, avaliacao.tr, avaliacao.si, avaliacao.se, avaliacao.ab from avaliacao
inner join alunos on avaliacao.fk_aluno = alunos.id $comando";
                            $querybanco = mysql_query($sql) or die (mysql_error());
                            
                            while($l = mysql_fetch_array($querybanco)){
                                
								$id=$l['id'];
                                $fk_aluno=$l['nome'];
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
								
								$sm = ($biceps + $peitoral + $cintura +$abdome + $quadril + $coxa);
								
								$g = ($tr + $si + $se + $ab) * 0.153 + 5.783;
								$gt = $g * ($peso/100);
								$mm = $peso - $gt;
                              
    				echo"<tr>
                            <td> $data </td>
							<td> $fk_aluno </td>
							<td> $sm </td>
							<td> $g </td>
							<td> $gt </td>
							<td> $mm </td>
							<td> <a href='visualizarfotos.php?id=$id'><span id='azul' class='glyphicon glyphicon-eye-open'></span></a> </td>
                        </tr>";
                            }
                        }
                        ?>
                        </div>
                  	</table>
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