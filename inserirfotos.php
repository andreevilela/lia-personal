<?php $menu='galeria'; include"menu.php"; include_once "validar.php"; include"function.php"; include"banco.php"; include"erros.php"; ?>

<!-- Conteúdo -->
<main class="container-fluid">
	<div class="row">
		<div class="col-md-offset-2 col-md-8">
        	<div class="panel panel-default">
            	<div class="panel-body">
                	<ul class="nav nav-tabs">
                    	<li class="active">
                        	<a>Inserir Fotos</a>
                    	</li>
                	</ul>
    <br>
        <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
              
                <div class="form-group">
                	<label class="control-label col-sm-2">Fotos</label> <br>
                        <div class="col-sm-4">
                            <input type="file" name="foto1" id="foto1" autofocus>
                        </div>
				</div>
                <?php if(isset($_FILES['foto1'])) echo'
                <div class="form-group">
                	<label class="control-label col-sm-2">&nbsp;</label> <br>
                        <div class="col-sm-4">'?>
                            <?php if(isset($_FILES['foto1'])) validar_foto1(); ?>
                        <?php if(isset($_FILES['foto1'])) echo'</div>
				</div>'?>
                <div class="form-group">
                	<label class="control-label col-sm-2"></label>
                        <div class="col-sm-5"> 
                            <input type="text" name="descricao1" class="form-control" id="descricao1" value="<?php if(isset($_POST['descricao1'])) echo $_POST['descricao1']; ?>" placeholder="Descrição da Foto">
                        </div>
                </div>
                <div class="form-group">
                	<label class="control-label col-sm-2"></label>
                        <div class="col-sm-5"> 
                        	<?php if(isset($_POST['descricao1'])) validar_descricao1(); ?>
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
                        <div class="col-sm-5"> 
                            <input type="text" name="descricao2" class="form-control" id="descricao2" value="<?php if(isset($_POST['descricao2'])) echo $_POST['descricao2']; ?>" placeholder="Descrição da Foto">
                        </div>
                </div> <br>
                <div class="form-group">
                	<label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                            <input type="file" name="foto3" id="foto3">
                        </div>
                </div>
                <div class="form-group">
                	<label class="control-label col-sm-2"></label>
                        <div class="col-sm-5"> 
                            <input type="text" name="descricao3" class="form-control" id="descricao3" value="<?php if(isset($_POST['descricao3'])) echo $_POST['descricao3']; ?>" placeholder="Descrição da Foto">
                        </div>
                </div> <br>
                <div class="form-group">
                	<label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                            <input type="file" name="foto4" id="foto4">
                        </div>
                </div>
                <div class="form-group">
                	<label class="control-label col-sm-2"></label>
                        <div class="col-sm-5"> 
                            <input type="text" name="descricao4" class="form-control" id="descricao4" value="<?php if(isset($_POST['descricao4'])) echo $_POST['descricao4']; ?>" placeholder="Descrição da Foto">
                        </div>
                </div> <br>
                <div class="form-group">
                	<label class="control-label col-sm-2"></label>
                        <div class="col-sm-4">
                            <input type="file" name="foto5" id="foto5">
                        </div>
                </div>
                <div class="form-group">
                	<label class="control-label col-sm-2"></label>
                        <div class="col-sm-5"> 
                            <input type="text" name="descricao5" class="form-control" id="descricao5" value="<?php if(isset($_POST['descricao5'])) echo $_POST['descricao5']; ?>" placeholder="Descrição da Foto">
                        </div>
                </div>
	<br>
                                
                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default active">Salvar</button>
                            <a href="galeria.php"><button type="button" class="btn btn-default active">Cancelar</button></a>
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

if((validar_foto1() == '0') and (validar_descricao1() == '0')){
	
$descricao1=$_POST['descricao1'];
$descricao2=$_POST['descricao2'];
$descricao3=$_POST['descricao3'];
$descricao4=$_POST['descricao4'];
$descricao5=$_POST['descricao5'];

date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');

$data = date("Y-m-d");


$foto1 = $_FILES["foto1"];

if( !empty( $foto1['name'] ) ) {

// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto1["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
		
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto1["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_imagem1 = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem1 = "galeria/" . $nome_imagem1;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto1["tmp_name"], $caminho_imagem1);
		
			// Insere os dados no banco
			//$sql = mysql_query("INSERT INTO usuarios VALUES ('', '".$nome."', '".$email."', '".$nome_imagem."')");

$sql = mysql_query("insert into galeria(foto, descricao, data)
values('$nome_imagem1', '$descricao1', '$data')") or die ("<script>errosubmitgaleria()</script>" . mysql_error());

}

$foto2 = $_FILES["foto2"];

if( !empty( $foto2['name'] ) ) {

// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto2["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
			
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto2["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_imagem2 = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem2 = "galeria/" . $nome_imagem2;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto2["tmp_name"], $caminho_imagem2);
		
			// Insere os dados no banco
			//$sql = mysql_query("INSERT INTO usuarios VALUES ('', '".$nome."', '".$email."', '".$nome_imagem."')");

$sql = mysql_query("insert into galeria(foto, descricao, data)
values('$nome_imagem2', '$descricao2', '$data')") or die ("<script>errosubmitgaleria()</script>" . mysql_error());

}
			
$foto3 = $_FILES["foto3"];

if( !empty( $foto3['name'] ) ) {

// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto3["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
			
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto3["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_imagem3 = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem3 = "galeria/" . $nome_imagem3;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto3["tmp_name"], $caminho_imagem3);
		
			// Insere os dados no banco
			//$sql = mysql_query("INSERT INTO usuarios VALUES ('', '".$nome."', '".$email."', '".$nome_imagem."')");	
			
$sql = mysql_query("insert into galeria(foto, descricao, data)
values('$nome_imagem3', '$descricao3', '$data')") or die ("<script>errosubmitgaleria()</script>" . mysql_error());

}

$foto4 = $_FILES["foto4"];

if( !empty( $foto4['name'] ) ) {

// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto4["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
		
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto4["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_imagem4 = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem4 = "galeria/" . $nome_imagem4;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto4["tmp_name"], $caminho_imagem4);
		
			// Insere os dados no banco
			//$sql = mysql_query("INSERT INTO usuarios VALUES ('', '".$nome."', '".$email."', '".$nome_imagem."')");
			
$sql = mysql_query("insert into galeria(foto, descricao, data)
values('$nome_imagem4', '$descricao4', '$data')") or die ("<script>errosubmitgaleria()</script>" . mysql_error());

}
			
$foto5 = $_FILES["foto5"];

if( !empty( $foto5['name'] ) ) {

// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto5["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
		
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto5["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_imagem5 = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem5 = "galeria/" . $nome_imagem5;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto5["tmp_name"], $caminho_imagem5);
		
			// Insere os dados no banco
			//$sql = mysql_query("INSERT INTO usuarios VALUES ('', '".$nome."', '".$email."', '".$nome_imagem."')");

$sql = mysql_query("insert into galeria(foto, descricao, data)
values('$nome_imagem5', '$descricao5', '$data')") or die ("<script>errosubmitgaleria()</script>" . mysql_error());

}

if(!mysql_error())
	{echo"<script>submitgaleria()</script>";}
	
}

?>

</body>
</html>