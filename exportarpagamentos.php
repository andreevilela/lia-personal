<?php
include_once "validar.php"; include "banco.php"; include ('pdf/mpdf.php');

$cod = $_GET['id'];

date_default_timezone_set('America/Sao_Paulo');	
	
$data_hoje = date("Y-m-d");


$busca = explode("_",$cod);
$aluno = "{$busca[0]}";
$filtro1 = "{$busca[1]}";
$filtro2 = "{$busca[2]}";

/*$data = explode("/",$data);
$data = "{$data[2]}-{$data[1]}-{$data[0]}";

$ate = explode("/",$ate);
$ate = "{$ate[2]}-{$ate[1]}-{$ate[0]}";*/

if((!empty($busca)) && (!empty($data)) && (!empty($ate)))
							{$data = explode("/",$filtro2);
							 $data = "{$data[2]}-{$data[1]}-{$data[0]}";
							 $ate = explode("/",$filtro2);
							 $ate = "{$ate[2]}-{$ate[1]}-{$ate[0]}";
							 $comando = "where alunos.status ='Ativo' and nome like '%".$aluno."%' and vencimento between '$data' and '$ate' order by pagamentos.vencimento";}
						else if((!empty($data)) && (!empty($ate)))
							{$data = explode("/",$filtro1);
							 $data = "{$data[2]}-{$data[1]}-{$data[0]}";
							 $ate = explode("/",$filtro2);
							 $ate = "{$ate[2]}-{$ate[1]}-{$ate[0]}";
							 $comando = "where alunos.status ='Ativo' and vencimento between '$data' and '$ate' order by pagamentos.vencimento";}
						else if((!empty($busca)) && (!empty($data)))
							{$data = explode("/",$filtro1);
							 $data = "{$data[2]}-{$data[1]}-{$data[0]}";
							 $comando = "where alunos.status ='Ativo' and vencimento = '$data' order by pagamentos.vencimento";}	
						else if((!empty($data)))
							{$data = explode("/",$filtro1);
							 $data = "{$data[2]}-{$data[1]}-{$data[0]}";
							 $comando = "where alunos.status ='Ativo' and vencimento = '$data' order by pagamentos.vencimento";}
						else if((!empty($busca)))
							{$comando = "where alunos.status ='Ativo' and nome like '%".$aluno."%' order by vencimento desc";}
						
						else 
							{$comando = "where alunos.status ='Ativo' and pagamentos.status = 0 order by pagamentos.vencimento";}

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
			  <td><font face=\"face='Arial' size='7'\"><p><center><strong>Relatório Pagamentos</strong></center></p></font> <font face=\"face='Arial' size='5'\"> <br>
			  <strong>Busca:</strong> <i>$aluno</i> &nbsp;&nbsp;&nbsp;&nbsp; <strong>Data:</strong> <i>$filtro1</i> &nbsp;&nbsp;&nbsp;&nbsp; <strong>Até:</strong> <i>$filtro2</i></font></td>
			  <td></td>
			</tr>
	</table>
	<hr><br><br>
	<div style='overflow-x:auto;' class='relatorio'>
		<table width='850'>
			<tr>
			  <td><font face=\"face='Arial' size='5'\"><strong> Nome <strong></font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong> Vencimento <strong></font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong> Status <strong></font></td>
			  <td><font face=\"face='Arial' size='5'\"><strong> Observação <strong></font></td>
			</tr>";
?>
<?php	

						$contv = 0;
						$contvc = 0;
						$contp = 0;
						
                                
                             {$sql = "select pagamentos.id, alunos.nome, pagamentos.vencimento, pagamentos.status, pagamentos.observacao, pagamentos.pagamento from pagamentos inner join alunos on pagamentos.fk_aluno = alunos.id $comando";
                            $querybanco = mysql_query($sql) or die (mysql_error());
                            
                            while($l = mysql_fetch_array($querybanco)){
                                
                                $id=$l['id'];
                                $nome=$l['nome'];
								$vencimento=$l['vencimento'];
								$status=$l['status'];
								$observacao=$l['observacao'];
								$pagamento=$l['pagamento'];
								
								$venc = date("d/m/Y", strtotime($vencimento));
								if ($pagamento == '0000-00-00')
									{$pag='';}
								else
									$pag = date("d/m/Y", strtotime($pagamento));
									
								if (($status == 0) && ($data_hoje > $vencimento))
									  	{$contvc++; $status='Vencida'; $cor = 'color=\'#d9534f\'';}
								else if ($status == 0)
										{$contv++; $status='Receber';  $cor = 'color=\'#428bca\'';}
								else
									{$contp++; $status='Pago - '.$pag; $cor = 'color=\'#5cb85c\'';}
                              
	$pagina = $pagina ."<tr>
                            <td><font face=\"face='Arial' size='5'\"> $nome </font></td>
							<td><font face=\"face='Arial' size='5'\"> $venc </font></td>
							<td><font face=\"face='Arial' size='5'\" $cor> $status </font></td>
							<td><font face=\"face='Arial' size='5'\"> $observacao </font></td>
                        </tr>";
                            }
                        }		
$pagina = $pagina ."</table>
<br><br>";
						$tot=$contv+$contvc+$contp;
						if($tot >= 1){
							$tot=$contv+$contvc+$contp;
							$estv=$contv/$tot*100;
							$estvc=$contvc/$tot*100;
							$estp=$contp/$tot*100;
							
							$estv=number_format($estv,0)."%";
							$estvc=number_format($estvc,0)."%";
							$estp=number_format($estp,0)."%";
							$esttot='100%';
						}
						else{
							$estv='0%';
							$estvc='0%';
							$estp='0%';
							$esttot='0%';
						};
						
						
$pagina = $pagina . "<font face=\"face='Arial' size='5' color='#d9534f'\"> Vencidas: $contvc &nbsp;&nbsp;&nbsp;&nbsp;</font> <font face=\"face='Arial' size='5' color='#428bca'\"> Receber: $contv &nbsp;&nbsp;&nbsp;&nbsp; </font> <font face=\"face='Arial' size='5' color='#5cb85c'\"> Pagos: $contp &nbsp;&nbsp;&nbsp;&nbsp; </font> <font face=\"face='Arial' size='5' color='#ff8800'\"> Total: $tot </font>
						<br><br>
						<font face=\"face='Arial' size='5' color='#d9534f'\"> Vencidas: $estvc &nbsp;&nbsp;&nbsp;&nbsp;</font> <font face=\"face='Arial' size='5' color='#428bca'\"> Receber: $estv &nbsp;&nbsp;&nbsp;&nbsp; </font> <font face=\"face='Arial' size='5' color='#5cb85c'\"> Pagos: $estp &nbsp;&nbsp;&nbsp;&nbsp; </font> <font face=\"face='Arial' size='5' color='#ff8800'\"> Total: $esttot </font>

						
			  </div>
				<br><br><hr>
			</body>
		 </html>";
 ?>
 <?php
 
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');

$data = date("d/m/Y");

$arquivo = "Relatório Pagamentos ".$data.".pdf";

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