<html>
<head>
<title>Passar Variável Javascript para PHP</title>
<script type="text/javascript">
function myFunction()
{
var x;
 
var vencimento=prompt("Informe o vencimento:");
 
if (vencimento!=null)
  {
  x="Vencimento: " + vencimento;
  document.getElementById("demo").innerHTML=x;
  }
} 
</script>
</head>
<body onload="myFunction()">
<p id="demo"></p>

<?php 
$variavelphp = "<script>document.write(x)</script>";
echo $variavelphp;
?>
</body>
</html>