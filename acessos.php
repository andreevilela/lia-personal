<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

include_once "validar.php";

include "banco.php";

$usuario=$_POST['login'];
$passen=$_POST['passen'];

// verifica se o os dados foram enviados através do método POST
if (getenv("REQUEST_METHOD") == "POST") {
    // encripta a senha para ser cadastrada na tabela
    $senha = md5($passen);

    // insere o registro pegando a senha criptografada no $cod
    $sql = "INSERT INTO acesso (usuario, senha) VALUES ('$usuario', '$senha')";
    mysql_query($sql);
?>
<script>alert("Usuário cadastrado com Sucesso!!");</script>
<?php
}

?>
Formulário para cadastrar o usuário
<form action="" method="post">
Nome: <input type="text" name="login"><br>
Senha: <input type="text" name="passen"><br>
<input type="submit" value="Enviar">
</form>
<br><br><br>