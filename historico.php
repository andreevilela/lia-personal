<?php $menu='historico'; include"menu.php"; include_once "validar.php"; include"function.php";?>

<!-- Conteúdo -->
<main class="container-fluid">
	<div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                    	<ul class="nav nav-tabs">
                            <li class="active">
                                <a>Buscar</a>
                                <?php if(isset($_POST['busca']))
										echo"<li class='cinzaEscuro'> <a href='historico.php'>&nbsp;Voltar&nbsp;</a> </li>";?>
                            </li>
                        </ul>
    <br>
        <form class="form-horizontal" role="form" method="post" action="">
        		<div class="form-group">
                        <div class="col-sm-3">
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
										{echo"<a>Últimos Históricos</a>";} 
									  echo"<li class='cinzaEscuro'>
									       	<a href='exportarhistorico.php?id=$cod'>Exportar</a>
										   </li>"?>
                        	</li>
            			</ul>
                     <div style="overflow-x:auto;" class="relatorio">
                	<table class="media">
                        <tr>
                          <th>Data</th>
                          <th>Nome</th>
                          <th>Idade</th>
                          <th>Peso</th>
                          <th>Altura</th>
                          <th>Bíceps</th>
                          <th>Peitoral</th>
                          <th>Cintura</th>
                          <th>Abdome</th>
                          <th>Quadril</th>
                          <th>Coxa</th>
                          <th>TR</th>
                          <th>SI</th>
                          <th>SE</th>
                          <th>AB</th>
                          <th>Alterar</th>
                          <th>Excluir</th>
                        </tr>
                        <div id="buscar">
                        <?php 
						if(isset($_POST['busca']))
							{$comando = "where avaliacao.fk_aluno ='$cod' order by id desc";}
						else 
							{$comando = "order by id desc limit 10";}
                        
                            {$sql = "select avaliacao.id, alunos.nome, alunos.data_nascimento, avaliacao.peso, avaliacao.altura, avaliacao.data, avaliacao.biceps, avaliacao.peitoral, avaliacao.cintura, avaliacao.abdome, avaliacao.quadril, avaliacao.coxa, avaliacao.tr, avaliacao.si, avaliacao.se, avaliacao.ab from avaliacao
inner join alunos on avaliacao.fk_aluno = alunos.id $comando";
                            $querybanco = mysql_query($sql) or die (mysql_error());
                            
                            while($l = mysql_fetch_array($querybanco)){
                                
								$id=$l['id'];
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
								
								$dat = new DateTime( "$data_nascimento" ); // data de nascimento
								$interval = $dat->diff( new DateTime( "$date" ) ); // data definida

								$idade = $interval->format( '%Y' ); // anos
								        
                        echo" 
                        <tr>
                            <td> $data </td>
							<td> $fk_aluno </td>
							<td> $idade </td>
                            <td> $peso </td>
							<td> $altura </td>
							<td> $biceps </td>
							<td> $peitoral </td>
							<td> $cintura </td>
							<td> $abdome </td>
							<td> $quadril </td>
							<td> $coxa </td>
							<td> $tr </td>
							<td> $si </td>
							<td> $se </td>
							<td> $ab </td>
							<td> <a href='alteraravaliacao.php?id=$id'><span id='amarelo' class='glyphicon glyphicon-pencil'></span></a> </td>
							<td> <a href='excluiravaliacao.php?id=$id'><span id='vermelho' class='glyphicon glyphicon-trash'></span></a> </td>
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