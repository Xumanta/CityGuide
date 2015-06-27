<?php
set_include_path('inc');
$mysql_database = "City_GuideEn";// Set used Database for Output
include "db_connect.inc.php";	 // Universal connect
include "function_save_sql.php"; // For secure Database Queries
include "function_editKey.php";  // Makes Search better

if(isset($_POST["titel"]) and isset($_POST["adresse"]) and isset($_POST["nexthalte"]) and isset($_POST["gmlink"]) and isset($_POST["kurzbeschreibung"])) {
	$titel =$_POST["titel"];	 // Name Change
	$adresse =$_POST["adresse"];	 // Name Change
	$nexthalte =$_POST["nexthalte"]; // Name Change
	$gmlink =$_POST["gmlink"];	 // Name Change
	$kurzbeschreibung =$_POST["kurzbeschreibung"]; // Name Change
	$sqlEintrag = "INSERT INTO  `Guide` (`GuideID` ,`Titel` ,`Streetname` ,`Bus_stop` ,`Google_Maps` ,`Abstract`) VALUES (NULL , '$titel', '$adresse', '$nexthalte', '$gmlink', '$kurzbeschreibung');"; //Insert in Database Guide Texts
	mysqli_query($db, $sqlEintrag);
	// Add Link between Keyword and Guide

	// Not relevant for Final Programm
	// $sqlAusgabe = "SELECT * FROM `Stichwort`;";
	// $tabelle = mysqli_query($db, $sqlAusgabe);
	// while ($fetched = mysqli_fetch_array($tabelle))
	// {
	// 	print "$fetched['Keywords'] <br/>";
	// }

	header("Location: adminen.php"); // Header on this File for cleaning the Post cache
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
		<form method="POST" action="adminen.php">
			Titel:<input ="text" name="titel" autocomplete="off" required="required"><br>
			Adresse:<input ="text" name="adresse" autocomplete="off" required="required"><br>
			Nächste Haltestelle:<input ="text" name="nexthalte" autocomplete="off" required="required"><br>
			G-Maps Link:<input ="text" name="gmlink" autocomplete="off" required="required"><br>
			Kurzbeschreibung:<textarea rows="7" cols="80" name ="kurzbeschreibung" autocomplete="off" required="required"></textarea>
			<!-- Choose Keywords-->
			<?php
				$sqlStichAus = "SELECT * FROM `Suche`";
				$stickTab = mysqli_query($db, $sqlStichAus);
				while ($stichfetch = mysqli_fetch_array($stickTab)) {
					print "<input type=\"checkbox\" name=\"keyw\" value=\"$stichfetch['Keywords']\" />";
				} // Output input checkbox for Keywords
			?>
			<input="submit" value="Eintragen!">
		</form>
<?php
if (false) {
	$sqlAusgabe = "SELECT * FROM `Guide`;";
	$tabelle = mysqli_query($db, $sqlAusgabe);
	while ($fetched = mysqli_fetch_array($tabelle)) {
		print "";
	} // Should print all Guides
}
?>
	</body>
</html>
<?php
mysqli_close($db); // Close Database Connection
?>
