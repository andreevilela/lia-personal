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
	<table width='850'>
			<tr>
			  <td> <img src='imagens/relatorio.png'></td>
			  <td><font face=\"face='Arial' size='7'\"><strong> Relatório Dietas </strong></font></td>
			</tr>
	</table>
	<hr><br><br>
	<div style='overflow-x:auto;' class='relatorio'>
		<table width='850'>
			<tr>
			  <td><font face=\"face='Arial' size='5'\"><strong> Aluno <strong></font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong> Início <strong></font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong> Fim <strong></font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong> Observação <strong></font></td>
			</tr>";
?>
<?php	
								if(!empty($cod))
									{$comando = "where dieta.fk_aluno = '$cod' order by id desc";}
								else 
									{$comando = "order by id desc";}
                                
                                    {$sql = "select dieta.id, alunos.nome, dieta.fk_aluno, dieta.data, dieta.ate, dieta.horario1, dieta.refeicao1, dieta.horario2, dieta.refeicao2, dieta.horario3, dieta.refeicao3, dieta.horario4, dieta.refeicao4, dieta.horario5, dieta.refeicao5, dieta.horario6, dieta.refeicao6, dieta.horario7, dieta.refeicao7, dieta.horario8, dieta.refeicao8, dieta.observacao from dieta
									inner join alunos on dieta.fk_aluno = alunos.id 
									$comando";
									
                                    $querybanco = mysql_query($sql) or die (mysql_error());
                                    
									$linha=mysql_num_rows($querybanco);
									
                                    while($l = mysql_fetch_array($querybanco)){
                                        
                                        $id=$l['id'];
                                        $aluno=$l['nome'];
                                        $date=$l['data'];
                                        $up=$l['ate'];
                                        
                                        $observacao=$l['observacao'];
                                        
                                        $data = date("d/m/Y", strtotime($date));
                                        
                                        $ate = date("d/m/Y", strtotime($up));
                                        
            $pagina = $pagina ."<tr>
                                	<td><font face=\"face='Arial' size='5'\"> $aluno </td>
                                    <td><font face=\"face='Arial' size='5'\"> $data </td>
                                    <td><font face=\"face='Arial' size='5'\"> $ate </td>
                                    <td><font face=\"face='Arial' size='5'\"> $observacao </td>
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
	{$arquivo = "Relatório Dietas - " .$aluno. " " .$data.".pdf";}
else 
	{$arquivo = "Relatório Dietas ".$data.".pdf";};

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