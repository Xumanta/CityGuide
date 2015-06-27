<?php
set_include_path('inc');
$mysql_database = "City_Guide";  // Set used Database for Output
include "db_connect.inc.php";	 // Universal connect
include "function_save_sql.php"; // For secure Database Queries
include "function_editKey.php";  // Makes Search better

$gesucht = false; // For Checking if everything have to be printed
if (isset($_POST["Suche"])) $gesucht = true;

?>
<!DOCTYPE html>
<html>
<head>
    <title>City Guide</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header">
        
        <div class="container">
            <div class="logo">
                <!-- <h1> Der City Guide </h1> -->
                <a href="index.php"><img src="images/logo.png" /></a>
            </div>
            
            <a href="index_en.php"><img class="language" src="images/flag_en.png"></a>
            <a href="index.php"><img class="language" src="images/flag_ger.png"></a>

            <div class="search">
                <form action="index.php" method="POST">
                    <input type="image" src="images/search_icon.svg" name="Suche_start" value="">
                    <input type="text" name="Suche" placeholder="Suche nach Orten...">
                </form>
            </div>
        </div>
    </div>
    
    <div class="content">
		<?php
        if (!$gesucht) { // Check for Search
            $sqlAus = "SELECT * FROM `Guide`"; // SELECT Query for All Entries
			$teildb = mysqli_query($db, $sqlAus);
			while ($fetched = mysqli_fetch_array($teildb))
            {
                print "<div class=\"attraktion\">
                        <center><h4>".$fetched['Titel']."</h4></center>
                        <p><b>Adresse:</b><br> ".$fetched['Streetname']."</p><br>
                        <p><b>Nächste Bushaltestelle:</b><br> ".$fetched['Bus_stop']."</p><br>
                        <p><b>Kurzbeschreibung:</b><br>".$fetched['Abstract']."</p><br>
                        <p><b>Auf der Karte:</b><br> ".$fetched['Google_Maps']."</p>
                    </div>"; // Print Query Entries
            }
        } else {
            $sucht = editKey(save_sql($_POST["Suche"])); // Edit of Search Word for Secure Query and better Search
            // $sqlSearch = "SELECT * FROM 'Stichwort' WHERE 'Keywords'='$sucht' INNER JOIN 'Suche' USING (StichwortID) INNER JOIN 'Guide' USING (GuideID);";
           // $sqlSearch = "SELECT * FROM 'Stichwort' WHERE 'Keywords'='$sucht' RIGHT JOIN 'Suche' ON 'Stichwort'.'StichwortID' RIGHT JOIN 'Guide' ON 'Suche'.'GuideID';";
            $sqlSearch = "SELECT Titel , Streetname , Bus_stop , Abstract , Google_Maps FROM Guide g INNER JOIN Suche su INNER JOIN Stichwort st ON g.GuideID = su.GuideID AND su.StichwortID = st.StichwortID WHERE st.Keywords = '$sucht';"; // SQl Search Query
            $tabelle = mysqli_query($db, $sqlSearch);
            while ($fetch = mysqli_fetch_array($tabelle)) {
                print "<div class=\"attraktion\">
                        <center><h4>".$fetch['Titel']."</h4></center>
                        <p><b>Adresse:</b><br> ".$fetch['Streetname']."</p><br>
                        <p><b>Nächste Bushaltestelle:</b><br> ".$fetch['Bus_stop']."</p><br>
                        <p><b>Kurzbeschreibung:</b><br>".$fetch['Abstract']."</p><br>
                        <p><b>Auf der Karte:</b><br> ".$fetch['Google_Maps']."</p>
                    </div>"; // Print all Search Results like below
            }
        }
    	?>
    </div>
</body>
</html>
