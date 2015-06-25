<?php
$mysql_host = "";
$mysql_user = "";
$mysql_password = "";
// $mysql_database = ""; // Wird übergeben!

// $db = mysql_connect($mysql_host, $mysql_user, $mysql_password);
// mysql_select_db($mysql_database, $db);

$db = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_database);
?>
