<?php
set_include_path('inc');
$mysql_database = "City_Guide";   // Set used Database for Output
include "db_connect.inc.php";	 // Universal connect
include "function_save_sql.php"; // For secure Database Queries

if(isset($_POST['stichwort'])) {
	$stich = save_sql($_POST['stichwort']); // If a Keyword was added
	$sqlEintrag = "INSERT INTO `Stichwort` (`StichwortID`, `Keywords`) VALUES ('NULL', '$stich')"; // Add Query
	mysqli_query($db, $sqlEintrag);

	header("Location: adminde_stich.php"); // Header on this File for cleaning the Post cache
}
?>
<!DOCTYPE html>
<html>
	<head>
		<tile>Administration - Stichw&ouml;rter</title>
	</head>
	<body>
		<h1>Administration - Stichw&ouml;rter</h1>
		Eintrag hinzufügen (de): <br />
		<form method="POST" action="adminde_stich.php">
			Neues Stichwort: <input ="text" name="stichwort" />
			<input ="submit" name="Hinzufügen!" />
		</form>
		<br/>
		<br/>
		Bereits eingetragene Stichw&ouml;rter:
		<br/>
		<?php
			$sqlAusgabe = "SELECT * FROM `Stichwort`;";
			$tabelle = mysqli_query($db, $sqlAusgabe);
			while ($fetched = mysqli_fetch_array($tabelle)) {
				print "$fetched['Keywords'] <br/>";
			} // Prints all possible Keywords
		?>
	</body>
</html>
