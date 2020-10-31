<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Liamar Silva</title>

<!-- Javascript -->
<script type="text/javascript" src="js/function.js"></script>
</head>
<?php include_once "validar.php"; ?>

<body>

<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
include "banco.php";

$cod=$_POST['id'];

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

$sql = "update avaliacao set
		fk_aluno='$id',
		peso='$peso',
		altura='$altura',
		data='$date',
		biceps='$biceps',
		peitoral='$peitoral',
		cintura='$cintura',
		abdome='$abdome',
		quadril='$quadril',
		coxa='$coxa',
		tr='$tr',
		si='$si',
		se='$se',
		ab='$ab'	
	where id = '$cod'";

	$querybanco = mysql_query($sql) or die ("<script>erroalteradoavaliacao()</script>" . mysql_error());
	
		if(!mysql_error())
			{echo"<script>alteradoavaliacao()</script>";}

$foto1 = $_FILES['foto1']; 
	if( !empty( $foto1['name'] ) ) 
		{
			// Seleciona todos os usuários
			$sql = mysql_query("select foto from avaliacao where id = $cod");
			 
			// Exibe as informações de cada usuário
			while ($usuario = mysql_fetch_object($sql)) {
				
			$nomefoto1=$usuario->foto;}
			
			/*$diretorio = "fotos/";
			
			$imagemDeletar = $diretorio . $foto;   
			
			$deleta = unlink($imagemDeletar);    
			
			if($deleta):*/
			
			// Verifica se o arquivo é uma imagem
			if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto1["type"])){
			   $error[1] = "Isso não é uma imagem.";
			} 
		/*
			// Pega as dimensões da imagem
			$dimensoes = getimagesize($foto["tmp_name"]);
		
			// Verifica se a largura da imagem é maior que a largura permitida
			if($dimensoes[0] > $largura) {
				$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
			}
	 
			// Verifica se a altura da imagem é maior que a altura permitida
			if($dimensoes[1] > $altura) {
				$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
			}
			
			// Verifica se o tamanho da imagem é maior que o tamanho permitido
			if($foto["size"] > $tamanho) {
				$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
			}
	 
			// Se não houver nenhum erro
			if (count($error) == '') {
	*/		
				// Pega extensão da imagem
				//preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto1["name"], $ext);
	 
				// Gera um nome único para a imagem
				//$nome_imagem1 = md5(uniqid(time())) . "." . $ext[1];
	 
				// Caminho de onde ficará a imagem
				$caminho_imagem1 = "fotos/" . $nomefoto1;
	 
				// Faz o upload da imagem para seu respectivo caminho
				move_uploaded_file($foto1["tmp_name"], $caminho_imagem1);
			
				// Insere os dados no banco
				//$sql = mysql_query("INSERT INTO usuarios VALUES ('', '".$nome."', '".$email."', '".$nome_imagem."')");
	
				/*$sql = "update avaliacao set
					foto=$nome_imagem1
					where id = '$cod'"; 
					
				endif;*/
					
					if(!mysql_error())
					{echo"<script>alteradoavaliacao()</script>";}
			}
				
$foto2 = $_FILES['foto2']; 
	if( !empty( $foto2['name'] ) ) 
		{
			// Seleciona todos os usuários
			$sql = mysql_query("select foto2 from avaliacao where id = $cod");
			 
			// Exibe as informações de cada usuário
			while ($usuario = mysql_fetch_object($sql)) {
				
			$nomefoto2=$usuario->foto2;}
			
			/*$diretorio = "fotos/";
			
			$imagemDeletar = $diretorio . $foto;   
			
			$deleta = unlink($imagemDeletar);    
			
			if($deleta):*/
			
			
			// Verifica se o arquivo é uma imagem
			if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto2["type"])){
			   $error[1] = "Isso não é uma imagem.";
			} 
		/*
			// Pega as dimensões da imagem
			$dimensoes = getimagesize($foto["tmp_name"]);
		
			// Verifica se a largura da imagem é maior que a largura permitida
			if($dimensoes[0] > $largura) {
				$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
			}
	 
			// Verifica se a altura da imagem é maior que a altura permitida
			if($dimensoes[1] > $altura) {
				$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
			}
			
			// Verifica se o tamanho da imagem é maior que o tamanho permitido
			if($foto["size"] > $tamanho) {
				$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
			}
	 
			// Se não houver nenhum erro
			if (count($error) == '') {
	*/		
				// Pega extensão da imagem
				//preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto2["name"], $ext);
	 
				// Gera um nome único para a imagem
				//$nome_imagem2 = md5(uniqid(time())) . "." . $ext[1];
	 
				// Caminho de onde ficará a imagem
				$caminho_imagem2 = "fotos/" . $nomefoto2;
	 
				// Faz o upload da imagem para seu respectivo caminho
				move_uploaded_file($foto2["tmp_name"], $caminho_imagem2);
			
				// Insere os dados no banco
				//$sql = mysql_query("INSERT INTO usuarios VALUES ('', '".$nome."', '".$email."', '".$nome_imagem."')");			
				
				/*$sql = "update avaliacao set
					foto2=$nome_imagem2
					where id = '$cod'"; 
					
					echo"$id <br> $cod <br> $nome_imagem2";
			endif;*/
					
		if(!mysql_error())
			{echo"<script>alteradoavaliacao()</script>";}
	
	}
				
?>

</body>
</html>