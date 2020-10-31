<?php $menu='alunos'; include"menu.php"; include_once "validar.php"; include"function.php"?>

<!-- Conteúdo -->
<main class="container-fluid">
	<div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="nav nav-tabs">
                        	<li class="active"> <a>Buscar</a> </li>
             				<li class="cinzaEscuro">
                				<?php if(isset($_POST['busca']))
							echo"<li class='cinzaEscuro'> <a href='alunos.php'>&nbsp;Voltar&nbsp;</a> </li>"
;						  else
						    {echo"<li class='cinzaEscuro'> <a href='cadastraraluno.php'>Cadastrar</a> </li>";} ?> 
                            </li>
            			</ul>
<br>
        			<form class="form-horizontal" role="form" method="post" action="">
                        <div class="form-group">
                            <div class="col-sm-4"> 
                            	<input type="text" name="busca" class="form-control" id="busca" value="<?php if(isset($_POST['busca'])) echo $_POST['busca']; ?>" autofocus placeholder="Digite sua busca">
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-default active">Buscar</button>
                            </div>
<br>
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
								{echo "<a>Resultado da Busca</a>";} 
							  else 
								{echo"<a>Últimos Alunos</a>
								<li class='cinzaEscuro'>
								   	<a href='exportaralunos.php'>Exportar</a>
								</li>";};?>
                    </li>
                	</ul>
                    
                    <div style="overflow-x:auto;" class="relatorio">
                	<table class="pequena">
                        <tr>
                          <th>Id</th>
                          <th>Status</th>
                          <th>Nome</th>
                          <th>Sexo</th>
                          <th>Data de Nascimento</th>
                          <th>Telefone</th>
                          <th>Celular</th>
                          <th>Observação</th>
                          <th>Alterar</th>
                          <th>Excluir</th>
                          
                        </tr>
                        <div id="buscar">
                        <?php
						error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
						
						$aluno=$_POST['busca'];
						
						if((isset($_POST['busca'])) && (!empty($_POST['busca'])))
							{$comando = "where nome like '%".$aluno."%' order by id desc";}
						else 
							{$comando = "order by id desc limit 10";}
						
                        include "banco.php";
						
                            {$sql = "select * from alunos $comando";
                            $querybanco = mysql_query($sql) or die (mysql_error());
                            
                            while($l = mysql_fetch_array($querybanco)){
                                
                                $id=$l['id'];
								$status=$l['status'];
                                $nome=$l['nome'];
								$sexo=$l['sexo'];
								$date_nascimento=$l['data_nascimento'];
								$telefone=$l['telefone'];
								$celular=$l['celular'];
								$observacao=$l['observacao'];
								
								$data_nascimento = date("d/m/Y", strtotime($date_nascimento));
                                
                        echo" 
                        <tr>
                            <td> $id </td>
							<td> $status </td>
                            <td> $nome </td>
							<td> $sexo </td>
							<td> $data_nascimento </td>
							<td> $telefone </td>
							<td> $celular </td>
							<td> $observacao </td>
							<td> <a href='alteraraluno.php?id=$id'><span id='amarelo' class='glyphicon glyphicon-pencil'></span></a> </td>
							<td> <a href='excluiraluno.php?id=$id'><span id='vermelho' class='glyphicon glyphicon-trash'></span></a> </td>
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