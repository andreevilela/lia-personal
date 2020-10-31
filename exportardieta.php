<?php
include_once "validar.php"; include "banco.php"; include ('pdf/mpdf.php');

$cod = $_GET['id'];

$sql = "select dieta.id, alunos.nome, dieta.fk_aluno, dieta.data, dieta.ate, dieta.horario1, dieta.refeicao1, dieta.horario2, dieta.refeicao2, dieta.horario3, dieta.refeicao3, dieta.horario4, dieta.refeicao4, dieta.horario5, dieta.refeicao5, dieta.horario6, dieta.refeicao6, dieta.horario7, dieta.refeicao7, dieta.horario8, dieta.refeicao8, dieta.observacao from dieta inner join alunos on dieta.fk_aluno = alunos.id where dieta.id=$cod";

$querybanco = mysql_query($sql) or die (mysql_error());

$l = mysql_fetch_array($querybanco);

	$alunosid=$l['id'];
	$aluno=$l['nome'];
	$date=$l['data'];
	$up=$l['ate'];
	$horario1=$l['horario1'];
	$refeicao1=$l['refeicao1'];
	$horario2=$l['horario2'];
	$refeicao2=$l['refeicao2'];
	$horario3=$l['horario3'];
	$refeicao3=$l['refeicao3'];
	$horario4=$l['horario4'];
	$refeicao4=$l['refeicao4'];
	$horario5=$l['horario5'];
	$refeicao5=$l['refeicao5'];
	$horario6=$l['horario6'];
	$refeicao6=$l['refeicao6'];
	$horario7=$l['horario7'];
	$refeicao7=$l['refeicao7'];
	$horario8=$l['horario8'];
	$refeicao8=$l['refeicao8'];
	$observacao=$l['observacao'];
	
	$data = date("d/m/Y", strtotime($date));
	
	$ate = date("d/m/Y", strtotime($up));

	$pagina = 
"<!DOCTYPE html>
<html lang='pt'>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='icon' type='image/png' href='imagens/icone.png'>
	<link href='css/estilos.css' rel='stylesheet' type='text/css'>

    <title>Liamar Silva</title>
 	</head>
 	<body>
	<table width='850'>
			<tr>
			  <td> <img src='imagens/relatorio.png'></td>
			  <td><font face=\"face='Arial' size='7'\"><strong>Relatório Dieta</strong></font></td>
			</tr>
	</table>
	<hr><br><br>
		<table width='850'>
			<tr>
			  <td colspan='1'><font face=\"face='Arial' size='5'\"><strong>Aluno:</strong></font></td>
			  <td colspan='3'><font face=\"face='Arial' size='5'\">$aluno</font></td>
			</tr>
			<tr>
			  <td><font face=\"face='Arial' size='5'\"><strong>Início:</strong></font></td>
			  <td><font face=\"face='Arial' size='5'\">$data&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong>Fim:</strong></font></td>
			  <td><font face=\"face='Arial' size='5'\">$ate</font></td>
			</tr>
			<tr>
			  <td colspan='1'><font face=\"face='Arial' size='5'\"><strong>Observação:</strong></font></td>
			  <td colspan='3'><font face=\"face='Arial' size='5'\">$observacao</font></td>
			</tr>
		</table>
		<br>
		<div style='overflow-x:auto;' class='relatorio'>
		<table width='850'>
			<tr>
			  <td><font face=\"face='Arial' size='5'\"><strong>Horário:</strong></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			  <td><font face=\"face='Arial' size='5'\">$horario1</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			  <td><font face=\"face='Arial' size='5'\"><strong>Refeição:</strong></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			  <td><font face=\"face='Arial' size='5'\">$refeicao1</font></td>
			</tr>
			 <tr>
			  <td><font face=\"face='Arial' size='5'\"><strong>Horário:</strong></font></td>
			  <td><font face=\"face='Arial' size='5'\">$horario2</font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong>Refeição:</strong></font></td>
			  <td><font face=\"face='Arial' size='5'\">$refeicao2</font></td>
			</tr>
			 <tr>
			  <td><font face=\"face='Arial' size='5'\"><strong>Horário:</strong></font></td>
			  <td><font face=\"face='Arial' size='5'\">$horario3</font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong>Refeição:</strong></font></td>
			  <td><font face=\"face='Arial' size='5'\">$refeicao3</font></td>
			</tr>
			<tr>
			  <td><font face=\"face='Arial' size='5'\"><strong>Horário:</strong></font></td>
			  <td><font face=\"face='Arial' size='5'\">$horario4</font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong>Refeição:</strong></font></td>
			  <td><font face=\"face='Arial' size='5'\">$refeicao4</font></td>
			</tr>
			<tr>
			  <td><font face=\"face='Arial' size='5'\"><strong>Horário:</strong></font></td>
			  <td><font face=\"face='Arial' size='5'\">$horario5</font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong>Refeição:</strong></font></td>
			  <td><font face=\"face='Arial' size='5'\">$refeicao5</font></td>
			</tr>
			<tr>
			  <td><font face=\"face='Arial' size='5'\"><strong>Horário:</strong></font></td>
			  <td><font face=\"face='Arial' size='5'\">$horario6</font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong>Refeição:</strong></font></td>
			  <td><font face=\"face='Arial' size='5'\">$refeicao6</font></td>
			</tr>
			<tr>
			  <td><font face=\"face='Arial' size='5'\"><strong>Horário:</strong></font></td>
			  <td><font face=\"face='Arial' size='5'\">$horario7</font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong>Refeição:</strong></font></td>
			  <td><font face=\"face='Arial' size='5'\">$refeicao7</font></td>
			</tr>
			<tr>
			  <td><font face=\"face='Arial' size='5'\"><strong>Horário:</strong></font></td>
			  <td><font face=\"face='Arial' size='5'\">$horario8</font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong>Refeição:</strong></font></td>
			  <td><font face=\"face='Arial' size='5'\">$refeicao8</font></td>
			</tr>
		</table>
		</div>
		<br><br><hr>
 	</body>
 </html>";

$arquivo = "Dieta ".$aluno." ".$data." até ".$ate.".pdf";

$mpdf = new mPDF();
//$mpdf=new mPDF('utf-8', 'A4-L'); 
//$mpdf->AddPage('L'); caso não funcione o de cima
//P - Retrato (DEFAULT)
//L - Paisagem

$mpdf->WriteHTML($pagina);

$mpdf->Output($arquivo, 'I');

// I - Abre no navegador
// F - Salva o arquivo no servidor
// D - Salva o arquivo no computador do usuário
?>