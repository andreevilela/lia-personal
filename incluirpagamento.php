<?php $menu='pagamentos'; include"menu.php"; include_once "validar.php"; include"function.php"; include "banco.php"; include "erros.php"?>

<script>
// função pra ler querystring
function queryString(parameter) {  
              var loc = location.search.substring(1, location.search.length);   
              var param_value = false;   
              var params = loc.split("&");   
              for (i=0; i<params.length;i++) {   
                  param_name = params[i].substring(0,params[i].indexOf('='));   
                  if (param_name == parameter) {                                          
                      param_value = params[i].substring(params[i].indexOf('=')+1)   
                  }   
              }   
              if (param_value) {   
                  return param_value;   
              }   
              else {   
                  return undefined;   
              }   
        }

var variaveljs = queryString("minhaVariavel");

//window.alert(variaveljs)

</script>

<?php

$variavelphp = "<script>document.write(variaveljs)</script>";
//echo "Olá $variavelphp";

$get = $_GET['minhaVariavel'];

//echo $get;

$get = explode("-",$get);
$id_aluno = "{$get[0]}";
$vencimento = "{$get[1]}";

//echo $id_aluno . " e "; echo $vencimento;

$dados = explode("/",$vencimento);
$vencimento = "{$dados[2]}-{$dados[1]}-{$dados[0]}";

$status = 0;
$pagamento = '';

$sql = mysql_query("insert into pagamentos(fk_aluno, vencimento, status, observacao, pagamento)
values('$id_aluno', '$vencimento', '$status','$observacao', '$pagamento')") or die ("<script>erropagamentos()</script>" . mysql_error());

if(!mysql_error())
	{echo"<script> var id = '$id_aluno'; submitincluirpagamento()</script>";}

?>
</body>
</html>