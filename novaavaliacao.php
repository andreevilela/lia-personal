<?php $menu='avaliacao'; include"menu.php"; include_once "validar.php"; include "function.php"; include"banco.php"; include"erros.php";?>

<!-- Conteúdo -->
<main class="container-fluid">
	<div class="row">
		<div class="col-md-offset-2 col-md-8">
        	<div class="panel panel-default">
            	<div class="panel-body">
                	<ul class="nav nav-tabs">
                    	<li class="active">
                        	<a>Avaliação Física</a>
                    	</li>
                	</ul>
    <br>
        <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
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
                    <div class="col-sm-10">
                        <?php if(isset($_POST['aluno'])) validar_aluno();  ?>
                    </div>
                </div>
                <div class="form-group">
                	<label class="control-label col-sm-2">Peso</label>
                        <div class="col-sm-4"> 
                            <input type="number" step=0.01 name="peso" class="form-control" id="peso" value="<?php if(isset($_POST['peso'])) echo $_POST['peso']; ?>" placeholder="">
                        </div>
                	
                    <label class="control-label col-sm-2">Idade</label>
                        <div class="col-sm-4"> 
                            <input type="text" name="idade" disabled class="form-control" id="idade" value="Automático"  placeholder="">
                        </div>
                    <label class="control-label col-sm-2"></label>
                    <div class="col-sm-4">
                        <?php if(isset($_POST['peso'])) validar_peso(); ?>
                    </div>
                    <label class="control-label col-sm-2"></label>
                    <div class="col-sm-4">
                        <?php  ?>
                    </div>
               </div>
               <div class="form-group">
                	<label class="control-label col-sm-2">Altura</label>
                        <div class="col-sm-4"> 
                            <input type="number" step=0.01 name="altura" class="form-control" id="altura" value="<?php if(isset($_POST['altura'])) echo $_POST['altura']; ?>" placeholder="">
                        </div>
                	
                    <label class="control-label col-sm-2">Data</label>
                        <div class="col-sm-4"> 
                            <input type="text" name="data" class="form-control" id="data" value="<?php if(isset($_POST['data'])) echo $_POST['data']; ?>" placeholder="dd/mm/aaaa">
                        </div>
                    <label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                            <?php if(isset($_POST['altura'])) validar_altura(); ?>
                        </div>
                    <label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                            <?php if(isset($_POST['data'])) validar_data(); ?>
                        </div>
                </div>
                <div class="form-group">
                	<label class="control-label col-sm-2">Fotos</label>
                        <div class="col-sm-4">
                            <input type="file" name="foto1" id="foto1">
                        </div>
				</div>
                <div class="form-group">
                	<label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                            <?php if(isset($_FILES['foto1'])) validar_foto1(); ?>
                        </div>
				</div>
                <div class="form-group">
                	<label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                            <input type="file" name="foto2" id="foto2">
                        </div>
				</div>
                <div class="form-group">
                	<label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                            <?php if(isset($_FILES['foto2'])) validar_foto2(); ?>
                        </div>
				</div>
   <br>             
                 <ul class="nav nav-tabs">
                    <li class="active">
                        <a>Circunferências</a>
                    </li>
                </ul>
    <br>
    			<div class="form-group">
                	<label class="control-label col-sm-2">Bíceps</label>
                        <div class="col-sm-2"> 
                            <input type="number" step=0.01 name="biceps" class="form-control" id="biceps" value="<?php if(isset($_POST['biceps'])) echo $_POST['biceps']; ?>" placeholder="">
                        </div>
                	
                    <label class="control-label col-sm-2">Peitoral</label>
                        <div class="col-sm-2"> 
                            <input type="number" step=0.01 name="peitoral" class="form-control" id="peitoral" value="<?php if(isset($_POST['peitoral'])) echo $_POST['peitoral']; ?>" placeholder="">
                        </div>
                        
                    <label class="control-label col-sm-2">Cintura</label>
                        <div class="col-sm-2"> 
                            <input type="number" step=0.01 name="cintura" class="form-control" id="cintura" value="<?php if(isset($_POST['cintura'])) echo $_POST['cintura']; ?>" placeholder="">
                        </div>
                   <label class="control-label col-sm-2"></label>
                        <div class="col-sm-2">
                            <?php if(isset($_POST['biceps'])) validar_biceps(); ?>
                        </div>
                    <label class="control-label col-sm-2"></label>
                        <div class="col-sm-2">
                            <?php if(isset($_POST['peitoral'])) validar_peitoral(); ?>
                        </div>
                    <label class="control-label col-sm-2"></label>
                        <div class="col-sm-2">
                            <?php if(isset($_POST['cintura'])) validar_cintura(); ?>
                        </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-2">Abdome</label>
                        <div class="col-sm-2"> 
                            <input type="number" step=0.01 name="abdome" class="form-control" id="abdome" value="<?php if(isset($_POST['abdome'])) echo $_POST['abdome']; ?>" placeholder="">
                        </div>
                	
                    <label class="control-label col-sm-2">Quadril</label>
                        <div class="col-sm-2"> 
                            <input type="number" step=0.01 name="quadril" class="form-control" id="quadril" value="<?php if(isset($_POST['quadril'])) echo $_POST['quadril']; ?>" placeholder="">
                        </div>
                        
                    <label class="control-label col-sm-2">Coxa</label>
                        <div class="col-sm-2"> 
                            <input type="number" step=0.01 name="coxa" class="form-control" id="coxa" value="<?php if(isset($_POST['coxa'])) echo $_POST['coxa']; ?>" placeholder="">
                        </div>
                    <label class="control-label col-sm-2"></label>
                        <div class="col-sm-2">
                            <?php if(isset($_POST['abdome'])) validar_abdome(); ?>
                        </div>
                    <label class="control-label col-sm-2"></label>
                        <div class="col-sm-2">
                            <?php if(isset($_POST['quadril'])) validar_quadril(); ?>
                        </div>
                    <label class="control-label col-sm-2"></label>
                        <div class="col-sm-2">
                            <?php if(isset($_POST['coxa'])) validar_coxa(); ?>
                        </div>
                </div>
                
                <br>             
                 <ul class="nav nav-tabs">
                    <li class="active">
                        <a>Dobras Cultâneas</a>
                    </li>
                </ul>
    <br>
    			<div class="form-group">
                	<label class="control-label col-sm-2">TR</label>
                        <div class="col-sm-4"> 
                            <input type="number" step=0.01 name="tr" class="form-control" id="tr" value="<?php if(isset($_POST['tr'])) echo $_POST['tr']; ?>" placeholder="">
                        </div>
                	
                    <label class="control-label col-sm-2">SI</label>
                        <div class="col-sm-4"> 
                            <input type="number" step=0.01 name="si" class="form-control" id="si" value="<?php if(isset($_POST['si'])) echo $_POST['si']; ?>" placeholder="">
                        </div>
                   <label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                            <?php if(isset($_POST['tr'])) validar_tr(); ?>
                        </div>
                    <label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                            <?php if(isset($_POST['si'])) validar_si(); ?>
                        </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-2">SE</label>
                        <div class="col-sm-4"> 
                            <input type="number" step=0.01 name="se" class="form-control" id="se" value="<?php if(isset($_POST['se'])) echo $_POST['se']; ?>" placeholder="">
                        </div>
                	
                    <label class="control-label col-sm-2">AB</label>
                        <div class="col-sm-4"> 
                            <input type="number" step=0.01 name="ab" class="form-control" id="ab" value="<?php if(isset($_POST['ab'])) echo $_POST['ab']; ?>" placeholder="">
                        </div>
                    <label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                            <?php if(isset($_POST['se'])) validar_se(); ?>
                        </div>
                    <label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                            <?php if(isset($_POST['ab'])) validar_ab(); ?>
                        </div>
                </div>
	<br>
                                
                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default active">Salvar</button>
                            <a href="avaliacao.php"><button type="button" class="btn btn-default active">Cancelar</button></a>
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

//if(($_POST['aluno'] != 'Selecione um aluno') and ($_POST['aluno'] != '')){

if((validar_aluno() == '0') and (validar_peso() == '0') and (validar_altura() == '0') and (validar_data() == '0') and (validar_foto1() == '0') and (validar_foto2() == '0') and (validar_biceps() == '0') and (validar_peitoral() == '0') and (validar_cintura() == '0') and (validar_abdome() == '0') and (validar_quadril() == '0') and (validar_coxa() == '0') and (validar_tr() == '0') and (validar_si() == '0') and (validar_se() == '0') and (validar_ab() == '0')){

$aluno=$_POST['aluno'];
$peso=$_POST['peso'];
$altura=$_POST['altura'];
$data=$_POST['data'];
$biceps=$_POST['biceps'];
$peitoral=$_POST['peitoral'];
$cintura=$_POST['cintura'];
$abdome=$_POST['abdome'];
$quadril=$_POST['quadril'];
$coxa=$_POST['coxa'];
$tr=$_POST['tr'];
$si=$_POST['si'];
$se=$_POST['se'];
$ab=$_POST['ab'];

$id_nome = explode("- ", $aluno);
$id = "{$id_nome[1]}";

/*echo "$id <br>";
echo strlen($id);*/

$dados = explode("/",$data);
$date = "{$dados[2]}-{$dados[1]}-{$dados[0]}";

$foto1 = $_FILES["foto1"];

// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto1["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
	
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto1["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_imagem1 = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem1 = "fotos/" . $nome_imagem1;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto1["tmp_name"], $caminho_imagem1);
				

$foto2 = $_FILES["foto2"];

// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto2["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
	
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto2["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_imagem2 = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem2 = "fotos/" . $nome_imagem2;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto2["tmp_name"], $caminho_imagem2);
		
			// Insere os dados no banco
			//$sql = mysql_query("INSERT INTO usuarios VALUES ('', '".$nome."', '".$email."', '".$nome_imagem."')");			
			

$sql = mysql_query("insert into avaliacao(fk_aluno, peso, altura, data, biceps, peitoral, cintura, abdome, quadril, coxa, tr, si, se, ab, foto, foto2)
values($id, $peso, $altura, '$date', $biceps, $peitoral, $cintura, $abdome, $quadril, $coxa, $tr, $si, $se, $ab, '$nome_imagem1', '$nome_imagem2')") or die ("<script>errosubmitavaliacao()</script>" . mysql_error());

if(!mysql_error())
	{echo"<script>submitavaliacao()</script>";}
		}

?>
</body>
</html>