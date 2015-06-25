<?php
set_include_path('inc');
$mysql_database = "City_Guide";
include "db_connect.inc.php";
include "function_save_sql.php";

if(isset($_POST["titel"]) and isset($_POST["adresse"]) and isset($_POST["nexthalte"]) and isset($_POST["gmlink"]) and isset($_POST["kurzbeschreibung"])) {
	$titel =$_POST["titel"];
	$adresse =$_POST["adresse"];
	$nexthalte =$_POST["nexthalte"]
	$gmlink =$_POST["gmlink"];
	$kurzbeschreibung =$_POST["kurzbeschreibung"];
	$sqlEintrag = "INSERT INTO  `Guide` (`GuideID` ,`Titel` ,`Streetname` ,`Bus_stop` ,`Google_Maps` ,`Abstract`) VALUES (NULL , '$titel', '$adresse', '$nexthalte', '$gmlink', '$kurzbeschreibung');";
	mysqli_query($db, $sqlEintrag);
	// Eintraege wegen der Stichwoerter

	// $sqlAusgabe = "SELECT * FROM `Stichwort`;";
	// $tabelle = mysqli_query($db, $sqlAusgabe);
	// while ($fetched = mysqli_fetch_array($tabelle))
	// {
	// 	print "$fetched['Keywords'] <br/>";
	// }
	
	header("Location: adminde.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Adminstration</title>
	</head>
	<body>
		<h1>Administration</h1>
		Eintrag hinzufügen (de): <br>
		<form method="POST" action="adminde.php">
			Titel:<input ="text" name="titel" autocomplete="off" required="required"><br>
			Adresse:<input ="text" name="adresse" autocomplete="off" required="required"><br>
			Nächste Haltestelle:<input ="text" name="nexthalte" autocomplete="off" required="required"><br>
			G-Maps Link:<input ="text" name="gmlink" autocomplete="off" required="required"><br>
			Kurzbeschreibung:<textarea rows="7" cols="80" name ="kurzbeschreibung" autocomplete="off" required="required"></textarea>
			<!-- Auswählen der Stickwörter-->
			<?php
				$sqlStichAus = "SELECT * FROM `Suche`";
				$stickTab = mysqli_query($db, $sqlStichAus);
				while ($stichfetch = mysqli_fetch_array($stickTab)) {
					print "<input type=\"checkbox\" name=\"keyw\" value=\"$stichfetch['Keywords']\" />";
				}
			?>
			<input="submit" value="Eintragen!">
		</form>
<?php
if (false) {
	$sqlAusgabe = "SELECT * FROM `Guide`;";
	$tabelle = mysqli_query($db, $sqlAusgabe);
	while ($fetched = mysqli_fetch_array($tabelle)) {
		print "<form action=\"Adminde.php";
	}
}
?>
	</body>
</html>
<?php
mysqli_close($db);
?>
