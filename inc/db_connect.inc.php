<?php
$mysql_host = "";
$mysql_user = "";
$mysql_password = "";
// $mysql_database = ""; // Given

// $db = mysql_connect($mysql_host, $mysql_user, $mysql_password);
// mysql_select_db($mysql_database, $db); // For older Server

$db = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_database); // Open Connection
?>
