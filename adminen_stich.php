<?php
set_include_path('inc');
$mysql_database = "City_GuideEn";// Set used Database for Output
include "db_connect.inc.php";	 // Universal connect
include "function_save_sql.php"; // For secure Database Queries

if(isset($_POST['keyword'])) {
	$stich = save_sql($_POST['keyword']); // If a Keyword was added
	$sqlEintrag = "INSERT INTO `Stichwort` (`StichwortID`, `Keywords`) VALUES ('NULL', '$stich')";
	mysqli_query($db, $sqlEintrag);

	header("Location: adminen_stich.php");/ / Header on this File for cleaning the Post cache
}
?>
<!DOCTYPE html>
<html>
	<head>
		<tile>Administration - Keywords</title>
	</head>
	<body>
		<h1>Administration - Keywords</h1>
		Add Entry (en): <br />
		<form method="POST" action="adminen_stich.php">
			New Kyword: <input ="text" name="keyword" />
			<input ="submit" name="Add!" />
		</form>
		<br/>
		<br/>
		Added Keywords:
		<br/>
		<?php
			$sqlAusgabe = "SELECT * FROM `Stichwort`;";
			$tabelle = mysqli_query($db, $sqlAusgabe);
			while ($fetched = mysqli_fetch_array($tabelle))
			{
				print "$fetched['Keywords'] <br/>";
			} // Prints all possible Keywords
		?>
	</body>
</html>
