<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Liamar Silva</title>

<!-- Javascript -->
<script type="text/javascript" src="js/function.js"></script>
</head>

<body>

<?php

session_start();
session_unset();
session_destroy();

echo"<script>backup()</script>";

?>

</body>
</html>