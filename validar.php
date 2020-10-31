<!-- Javascript -->
<script type="text/javascript" src="js/function.js"></script>

<?php
session_start();

if (!isset($_SESSION["usuario"]))
	{echo"<script>errovalidar()</script>";}
?>