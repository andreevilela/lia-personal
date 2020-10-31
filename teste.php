<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'u869987276_lia';
 
// conexão e seleção do banco de dados
$con = mysqli_connect($host, $user, $pass, $db);
 
// executa a consulta
$sql = "SELECT * FROM alunos ORDER BY id desc";
$res = mysqli_query($con, $sql);
 
// conta o número de registros
$total = mysqli_num_rows($res);

echo "Total de Resultados: " . $total . "<br>"; 

echo"
<table border='1'>
	<tr>
	  <th>Id</th>
	  <th>Status</th>
	  <th>Nome</th>
	  <th>Sexo</th>
	  <th>Data de Nascimento</th>
	  <th>Observação</th>
	</tr>";

// loop pelos registros 
while ($l = mysqli_fetch_array($res)) {
	$id=$l['id'];
	$status=$l['status'];
	$nome=$l['nome'];
	$sexo=$l['sexo'];
	$date_nascimento=$l['data_nascimento'];
	$observacao=$l['observacao'];
	
	$data_nascimento = date("d/m/Y", strtotime($date_nascimento));
	
	echo" 
	<tr>
		<td> $id </td>
		<td> $status </td>
		<td> $nome </td>
		<td> $sexo </td>
		<td> $data_nascimento </td>
		<td> $observacao </td>
	</tr>";
}

echo"</table>";

// fecha a conexão 
mysqli_close($con);

?>
