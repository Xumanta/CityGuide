<?php
set_include_path('inc');
$mysql_database = "City_Guide";
include "db_connect.inc.php";
include "function_save_sql.php";

if(isset($_POST['stichwort']))
{
	$stich = save_sql($_POST['stichwort']);
	$sqlEintrag = "INSERT INTO `Stichwort` (`StichwortID`, `Keywords`) VALUES ('NULL', '$stich')";
	mysqli_query($db, $sqlEintrag);

	header("Location: adminde_stich.php");
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
			while ($fetched = mysqli_fetch_array($tabelle))
			{
				print "$fetched['Keywords'] <br/>";
			}
		?>
	</body>
</html>