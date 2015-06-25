<?php
set_include_path('inc');
$mysql_database = "";
include "db_connect.inc.php";
// include SUCHE
$gesucht = false;
if (isset($_POST["Suche"])) $gesucht = true;



?>
<html>
<head>
    <title>City Guide</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header">
        
        <div class="container">
            <div class="logo">
                <!--<h1>Der City Guide</h1>-->
                <img src="images/logo.png">
            </div>
            
            <div>
                <a href="#"><img class="language" src="images/flag_en.png"></a>
                <a href="index.php"><img class="language" src="images/flag_ger.png"></a>
            </div>

            <div class="search">
                <form action="index.php">
                    <input type="image" src="images/search_icon.svg" name="Search_start" value="">
                    <input type="text" name="Search" placeholder="Search an Place...">
                </form>
            </div>
        </div>
    </div>
    
    <div class="content">
		<?php
        if (!$gesucht) {
            $sqlAus = "SELECT * FROM `Guide`"; // SELECT Befehl
			$teildb = mysqli_query($sqlAus, $db);
			while ($fetched = mysqli_fetch_array($teildb))
            {
                print 
                    "<div id=\"attraktion\">
                        <h4>$fetched[\"Titel\"]</h4>
                        Adresse: $fetched['Street name']<br>
                        Nächste Bushaltestelle: $fetched['Bus stop']<br>
                        Kurzbeschreibung: $fetched['Abstract']<br>
                        Auf der Karte: $fetched['Google Maps']
                    </div>";
            }
        }
    	?>
    </div>
</body>
</html>
