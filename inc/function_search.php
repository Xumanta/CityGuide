<?php
// Suche nach Stichwörtern für GuideIDs
function suche($suchEingabe, $db) {

	$sqlSearch = "SELECT * FROM 'Stichwort' WHERE 'Keywords'='$suchEingabe' INNER JOIN 'Suche' USING (StichwortID) INNER JOIN 'Guide' USING (GuideID);";
	$tabelle = mysqli_query($db, $sqlSearch);

	return $tabelle;
}
?>