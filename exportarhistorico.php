<?php
include_once "validar.php"; include "banco.php"; include ('pdf/mpdf.php');

$cod = $_GET['id'];

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
	<table width='1500'>
			<tr>
			  <td> <img src='imagens/relatorio.png'></td>
			  <td><font face=\"face='Arial' size='7'\"><strong> Relatório Avaliações </strong></font></td>
			</tr>
	</table>
	<hr><br><br>
	<div style='overflow-x:auto;' class='relatorio'>
		<table width='1500'>
			<tr>
			  <td><font face=\"face='Arial' size='5'\"><strong> Data <strong></font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong> Nome <strong></font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong> Idade <strong></font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong> Peso <strong></font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong> Altura <strong></font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong> Bíceps <strong></font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong> Peitoral <strong></font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong> Cintura <strong></font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong> Abdome <strong></font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong> Quadril <strong></font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong> Coxa <strong></font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong> TR <strong></font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong> SI <strong></font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong> SE <strong></font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong> AB <strong></font></td>
			</tr>";
?>
<?php	
								if(!empty($cod))
									{$comando = "where avaliacao.fk_aluno ='$cod' order by id desc";}
								else 
									{$comando = "order by id desc";}
                                
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
								
								$idade = $date - $data_nascimento;
                              
	$pagina = $pagina ."<tr>
                            <td><font face=\"face='Arial' size='5'\"> $data </font></td>
							<td><font face=\"face='Arial' size='5'\"> $fk_aluno </font></td>
							<td><font face=\"face='Arial' size='5'\"> $idade </font></td>
                            <td><font face=\"face='Arial' size='5'\"> $peso </font></td>
							<td><font face=\"face='Arial' size='5'\"> $altura </font></td>
							<td><font face=\"face='Arial' size='5'\"> $biceps </font></td>
							<td><font face=\"face='Arial' size='5'\"> $peitoral </font></td>
							<td><font face=\"face='Arial' size='5'\"> $cintura </font></td>
							<td><font face=\"face='Arial' size='5'\"> $abdome </font></td>
							<td><font face=\"face='Arial' size='5'\"> $quadril </font></td>
							<td><font face=\"face='Arial' size='5'\"> $coxa </font></td>
							<td><font face=\"face='Arial' size='5'\"> $tr </font></td>
							<td><font face=\"face='Arial' size='5'\"> $si </font></td>
							<td><font face=\"face='Arial' size='5'\"> $se </font></td>
							<td><font face=\"face='Arial' size='5'\"> $ab </font></td>
                        </tr>";
                            }
                        }
		
$pagina = $pagina ."</table>
				</div>
				<br><br><hr>
			</body>
		 </html>";

 ?>
 
 <?php

date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');

$data = date("d/m/Y");

if(!empty($cod))
	{$arquivo = "Relatório de Históricos - " .$fk_aluno. " " .$data.".pdf";}
else 
	{$arquivo = "Relatório de Históricos ".$data.".pdf";};

//$mpdf = new mPDF();
$mpdf=new mPDF('utf-8', 'A4-L'); 
//$mpdf->AddPage('L'); caso não funcione o de cima
//P - Retrato (DEFAULT)
//L - Paisagem

$mpdf->WriteHTML($pagina);

$mpdf->Output($arquivo, 'I');

// I - Abre no navegador
// F - Salva o arquivo no servidor
// D - Salva o arquivo no computador do usuário
?>