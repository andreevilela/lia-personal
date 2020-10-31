<?php $menu='dieta'; include"menu.php"; include_once "validar.php"; include"function.php"?>

<!-- Conteúdo -->
<main class="container-fluid">
	<div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="nav nav-tabs">
                            <li class="active"> <a>Buscar</a> </li>
                            <?php if(isset($_POST['busca']))
									echo"<li class='cinzaEscuro'> <a href='dieta.php'>&nbsp;Voltar&nbsp;</a> </li>"
;						  		  else
						    		{echo"<li class='cinzaEscuro'> <a href='incluirdieta.php'>&nbsp;Incluir&nbsp;</a> </li>";} ?>
                        </ul>
            <br>
            
            <form class="form-horizontal" role="form" method="post" action="">
                                <div class="form-group">
                                <div class="col-sm-5">
                                    <select class="form-control" name="busca" id="buscar" autofocus>
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
								{echo"<a>Últimas Dietas</a>";} 
							  echo"<li class='cinzaEscuro'>
								   	<a href='exportardietas.php?id=$cod'>Exportar</a>
								   </li>"?>
                            </li>
                        </ul>
                        
                 <div style="overflow-x:auto;" class="relatorio">
                            <table class="pequena">
                                <tr>
                                  <th>Aluno</th>
                                  <th>Início</th>
                                  <th>Fim</th>
                                  <th>Observação</th>
                                  <th>Dieta</th>
                                </tr>
                                <div id="buscar">
                                <?php
								
								if(isset($_POST['busca']))
									{$comando = "where dieta.fk_aluno ='$cod' order by id desc";}
								else 
									{$comando = "order by id desc limit 10";}
								
                                include "banco.php";
                                
                                    {$sql = "select dieta.id, alunos.nome, dieta.fk_aluno, dieta.data, dieta.ate, dieta.horario1, dieta.refeicao1, dieta.horario2, dieta.refeicao2, dieta.horario3, dieta.refeicao3, dieta.horario4, dieta.refeicao4, dieta.horario5, dieta.refeicao5, dieta.horario6, dieta.refeicao6, dieta.horario7, dieta.refeicao7, dieta.horario8, dieta.refeicao8, dieta.observacao from dieta
									inner join alunos on dieta.fk_aluno = alunos.id 
									$comando";
                                    $querybanco = mysql_query($sql) or die (mysql_error());
                                    
                                    while($l = mysql_fetch_array($querybanco)){
                                        
                                        $id=$l['id'];
                                        $aluno=$l['nome'];
                                        $date=$l['data'];
                                        $up=$l['ate'];
                                        
                                        $observacao=$l['observacao'];
                                        
                                        $data = date("d/m/Y", strtotime($date));
                                        
                                        $ate = date("d/m/Y", strtotime($up));
                                        
                                echo" 
                                <tr>
                                    <td> $aluno </td>
                                    <td> $data </td>
                                    <td> $ate </td>
                                   
                                    <td> $observacao </td>
									<td> <a href='visualizardieta.php?id=$id'><span id='azul' class='glyphicon glyphicon-eye-open'></span></a> </td>
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