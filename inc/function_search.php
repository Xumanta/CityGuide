<?php
// Suche nach Stichwörtern für GuideIDs
function suche($suchEingabe, $db, $sprache) {
	if ($sprache == "de") {
		$sqlSearch = "SELECT * FROM 'Stichwort' WHERE 'Keywords'='$suchEingabe' INNER JOIN 'Suche' USING (StichwortID) INNER JOIN 'Guide' USING (GuideID);";
		$tabelle = mysqli_query($db, $sqlSearch);
		while ($fetch = mysqli_fetch_array($tabelle)) {
			print "<div class=\"attraktion\">
	                <center><h4>".$fetch['Titel']."</h4></center>
	                <p><b>Adresse:</b><br> ".$fetch['Streetname']."</p><br>
	                <p><b>Nächste Bushaltestelle:</b><br> ".$fetch['Bus_stop']."</p><br>
	                <p><b>Kurzbeschreibung:</b><br>".$fetch['Abstract']."</p><br>
	                <p><b>Auf der Karte:</b><br> ".$fetch['Google_Maps']."</p>
	            </div>";
		}
	}
	if ($sprache == "en") {
		$sqlSearch = "SELECT * FROM 'Stichwort' WHERE 'Keywords'='$suchEingabe' INNER JOIN 'Suche' USING (StichwortID) INNER JOIN 'Guide' USING (GuideID);";
		$tabelle = mysqli_query($db, $sqlSearch);
		while ($fetch = mysqli_fetch_array($teildb))
        {
            print "<div class=\"attraktion\">
                    <center><h4>".$fetch['Titel']."</h4></center>
                    <p><b>Adress:</b><br> ".$fetch['Streetname']."</p><br>
                    <p><b>Next Stop:</b><br> ".$fetch['Bus_stop']."</p><br>
                    <p><b>Abstract:</b><br>".$fetch['Abstract']."</p><br>
                    <p><b>On Map:</b><br> ".$fetch['Google_Maps']."</p>
                </div>";
        }
	}
	if ($sprache == "php") {
		// Was Anderes... für die Admin Seite
	}
}
?>