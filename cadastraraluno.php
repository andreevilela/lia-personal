<?php $menu='alunos'; include"menu.php"; include_once "validar.php"; include"function.php"; include "banco.php"; include "erros.php"?>

<!-- Conteúdo -->
<main class="container-fluid">
	<div class="row">
		<div class="col-md-offset-2 col-md-8">
        	<div class="panel panel-default">
            	<div class="panel-body">
                	<ul class="nav nav-tabs">
                    	<li class="active">
                        	<a>Cadastrar Aluno</a>
                    	</li>
                	</ul>
    <br>
    <?php
		$sql = "SELECT id FROM alunos ORDER BY ID DESC LIMIT 1";
		
		$querybanco = mysql_query($sql) or die (mysql_error());
		
		$l = mysql_fetch_array($querybanco);
		
			$id=$l['id'];
			$id = $id + 1;
	?>
    
        <form class="form-horizontal" role="form" method="post" action="">
                <div class="form-group">
                    <label class="control-label col-sm-2">Id</label>
                        <div class="col-sm-4">
                            <input type="number" name="id" disabled class="form-control" id="id" value="<?php print str_pad($id, 3, '0', STR_PAD_LEFT); ?>" placeholder="">
                        </div>
                
                    <label class="control-label col-sm-2">Status</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="status" id="status" autofocus>
                            	<?php if(isset($_POST['status'])){echo"<option>".$_POST['status']."</option>";}
								else{echo"<option> Selecione </option>";}?>
                                <option>Ativo</option>
                                <option>Desativo</option>
                            </select>
                        </div>
                	<label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                        	<?php ?>
                        </div>
                	<label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                        	<?php if(isset($_POST['status'])) validar_status(); ?>
                        </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Nome</label>
                        <div class="col-sm-10"> 
                            <input type="text" name="nome" class="form-control" id="nome" value="<?php if(isset($_POST['nome'])) echo $_POST['nome']; ?>" placeholder="">
                        </div>
               		<label class="control-label col-sm-2"></label>
                        <div class="col-sm-10">
                        	<?php if(isset($_POST['nome'])) validar_nome(); ?>
                        </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Sexo</label>
                        <div class="col-sm-4">
                            <label class="radio-inline"><input type="radio" name="sexo" value="Masculino">Masculino</label>
                            <label class="radio-inline"><input type="radio" name="sexo" checked value="Feminino">Feminino</label>
                        </div>
                        
                    <label class="control-label col-sm-2">Data de Nascimento</label>
                        <div class="col-sm-4">
                            <input type="text" name="data_nascimento" class="form-control" id="data_nascimento" value="<?php if(isset($_POST['data_nascimento'])) echo $_POST['data_nascimento']; ?>" placeholder="dd/mm/aaaa">
                        </div>
                    <label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                        	<?php if(isset($_POST['data_nascimento'])) validar_data_nascimento(); ?>
                        </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-2">Telefone</label>
                        <div class="col-sm-4">
                            <input type="text" name="telefone" class="form-control" id="telefone" value="<?php if(isset($_POST['telefone'])) echo $_POST['telefone']; ?>" placeholder="0000-0000">
                        </div>
                    <label class="control-label col-sm-2">Celular</label>
                        <div class="col-sm-4">
                            <input type="text" name="celular" class="form-control" id="celular" value="<?php if(isset($_POST['celular'])) echo $_POST['celular']; ?>" placeholder="00000-0000">
                        </div>
                    <label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                        	<?php if(isset($_POST['telefone'])) validar_telefone(); ?>
                        </div>
                    <label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                        	<?php if(isset($_POST['celular'])) validar_celular(); ?>
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
                            <a href="alunos.php"><button type="button" class="btn btn-default active">Cancelar</button></a>
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
	
if((validar_status() == '0') and (validar_nome() == '0') and (validar_data_nascimento() == '0')){

$status=$_POST['status'];
$nome=$_POST['nome'];
$sexo=$_POST['sexo'];
$data_nascimento=$_POST['data_nascimento'];
$telefone=$_POST['telefone'];
$celular=$_POST['celular'];
$observacao=$_POST['observacao'];

$dados = explode("/",$data_nascimento);
$date_nascimento = "{$dados[2]}-{$dados[1]}-{$dados[0]}";

$sql = mysql_query("insert into alunos(status, nome, sexo, data_nascimento, observacao, telefone, celular)
values('$status', '$nome', '$sexo', '$date_nascimento', '$observacao', '$telefone', '$celular')") or die ("<script>erroalunos()</script>" . mysql_error());

if(!mysql_error())
	{echo"<script>submitalunos()</script>";}
	
}

?>
</body>
</html>