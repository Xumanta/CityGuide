<?php
// Suche nach Stichwörtern für GuideIDs
function suche($suchEingabe, $db, $sprache) {
	if ($sprache == "de") {
		$sqlSearch = "SELECT * FROM 'Stichwort' WHERE 'Keywords'='$suchEingabe' INNER JOIN 'Suche' USING (StichwortID) INNER JOIN 'Guide' USING (GuideID);";
		$tabelle = mysqli_query($db, $sqlSearch);
		while ($fetch = mysqli_fetch_array($tabelle)) {
			print "<div class=\"attraktion\">
	                <center><h4>".$fetched['Titel']."</h4></center>
	                <p><b>Adresse:</b><br> ".$fetched['Streetname']."</p><br>
	                <p><b>Nächste Bushaltestelle:</b><br> ".$fetched['Bus_stop']."</p><br>
	                <p><b>Kurzbeschreibung:</b><br>".$fetched['Abstract']."</p><br>
	                <p><b>Auf der Karte:</b><br> ".$fetched['Google_Maps']."</p>
	            </div>";
		}
	}
	if ($sprache == "en") {
		$sqlAus = "SELECT * FROM `Guide`"; // SELECT Befehl
			$teildb = mysqli_query($sqlAus, $db);
			while ($fetched = mysqli_fetch_array($teildb))
            {
                print "<div class=\"attraktion\">
                        <center><h4>".$fetched['Titel']."</h4></center>
                        <p><b>Adress:</b><br> ".$fetched['Streetname']."</p><br>
                        <p><b>Next Stop:</b><br> ".$fetched['Bus_stop']."</p><br>
                        <p><b>Abstract:</b><br>".$fetched['Abstract']."</p><br>
                        <p><b>On Map:</b><br> ".$fetched['Google_Maps']."</p>
                    </div>";
            }
	}
	if ($sprache == "php") {
		// Was Anderes... für die Admin Seite
	}
}
?>