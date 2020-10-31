<?php
include_once "validar.php"; include "banco.php"; include ('pdf/mpdf.php');

$cod = $_GET['id'];

date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');

$data = date("d/m/Y");

$dados = explode("/",$data);
$dia = "{$dados[0]}";
$mes = "{$dados[1]}";
$ano = "{$dados[2]}";

$firma = "Liamar Goncalves da Silva - ME";
$cnpj = "09.500.215/0001-46";
$cidade = "Araguari";
$endereço = "R Joaquim Barbosa, 480, Sala: A;, Eduardo Mendes (Aeroporto), Araguari, MG, CEP 38446-146, Brasil";

{$sql = "select pagamentos.id, alunos.nome, pagamentos.vencimento, pagamentos.status, pagamentos.observacao, pagamentos.pagamento from pagamentos inner join alunos on pagamentos.fk_aluno = alunos.id where pagamentos.id=$cod";
                            $querybanco = mysql_query($sql) or die (mysql_error());
                            
                            while($l = mysql_fetch_array($querybanco)){
                                
                                $id=$l['id'];
                                $nome=$l['nome'];
								$vencimento=$l['vencimento'];
								$status=$l['status'];
								$observacao=$l['observacao'];
								$pagamento=$l['pagamento'];
								
								$venc = date("d/m/Y", strtotime($vencimento));
								$pag = date("d/m/Y", strtotime($pagamento));
                              
                            }
                        }

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
			  <td></td>
			  <td><font face=\"face='Arial' size='7'\"><strong><p><center>Recibo</center></p></font> <font face=\"face='Arial' size='5'\"><br> $firma <br>CNPJ: $cnpj </strong></font></td>
			  <td></td>
			</tr>
	</table>
	<hr><br>
<p align='right'><font style='font-family:Verdana, Arial, Helvetica, sans-serif'>RECIBO: R$ ______________ </font></p>
<p align='justify'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font style='font-family:Verdana, Arial, Helvetica, sans-serif'>Recebemos de <strong> $nome </strong> portador (a) do CPF/CNPJ: ______________________________________, a importância de R$ ______________ (_______________________________________________________________) referente à _______________________________________________________________________________. </font></p>
<p align='right'><font style='font-family:Verdana, Arial, Helvetica, sans-serif'></font></p>
<p align='center'><font style='font-family:Verdana, Arial, Helvetica, sans-serif'>$cidade, $pag.</font></p>
<p>&nbsp;</p>
<p align='center'>________________________________________<br /><font style='font-family:Verdana, Arial, Helvetica, sans-serif'>$firma</font></p>";
?>
<?php
		
$pagina = $pagina ."
				<br><br><hr>
			</body>
		 </html>";
 ?>
 <?php

$arquivo = "Recibo ".$nome." ".$data.".pdf";

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