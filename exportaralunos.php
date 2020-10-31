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
			  <td><font face=\"face='Arial' size='7'\"><strong> Relatório Alunos </strong></font></td>
			</tr>
	</table>
	<hr><br><br>
	<div style='overflow-x:auto;' class='relatorio'>
		<table width='850'>
			<tr>
			  <td><font face=\"face='Arial' size='5'\"><strong> Id <strong></font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong> Status <strong></font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong> Nome <strong></font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong> Sexo <strong></font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong> Data Nascimento <strong></font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong> Telefone <strong></font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong> Celular <strong></font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong> Observação <strong></font></td>
			</tr>";
?>
<?php	
                                
                            {$sql = "select * from alunos order by id desc";
                            $querybanco = mysql_query($sql) or die (mysql_error());
                            
                            while($l = mysql_fetch_array($querybanco)){
                                
                                $id=$l['id'];
								$status=$l['status'];
                                $nome=$l['nome'];
								$sexo=$l['sexo'];
								$date_nascimento=$l['data_nascimento'];
								$telefone=$l['telefone'];
								$celularo=$l['celular'];
								$observacao=$l['observacao'];
								
								$data_nascimento = date("d/m/Y", strtotime($date_nascimento));
                              
	$pagina = $pagina ."<tr>
                            <td><font face=\"face='Arial' size='5'\"> $id </font></td>
							<td><font face=\"face='Arial' size='5'\"> $status </font></td>
							<td><font face=\"face='Arial' size='5'\"> $nome </font></td>
							<td><font face=\"face='Arial' size='5'\"> $sexo </font></td>
							<td><font face=\"face='Arial' size='5'\"> $data_nascimento </font></td>
							<td><font face=\"face='Arial' size='5'\"> $telefone </font></td>
							<td><font face=\"face='Arial' size='5'\"> $celular </font></td>
							<td><font face=\"face='Arial' size='5'\"> $observacao </font></td>
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

$arquivo = "Relatório Alunos ".$data.".pdf";

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