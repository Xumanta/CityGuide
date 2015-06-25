<?php
set_include_path('inc');
$mysql_database = "City_GuideEn";
include "db_connect.inc.php";
include "function_save_sql.php";
include "function_search.php";

$gesucht = false;
if (isset($_POST["Search"])) $gesucht = true;

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
            
            <a href="#"><img class="language" src="images/flag_en.png"></a>
            <a href="index.php"><img class="language" src="images/flag_ger.png"></a>

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
                print "<div class=\"attraktion\">
                        <center><h4>".$fetched['Titel']."</h4></center>
                        <p><b>Adress:</b><br> ".$fetched['Streetname']."</p><br>
                        <p><b>Next Stop:</b><br> ".$fetched['Bus_stop']."</p><br>
                        <p><b>Abstract:</b><br>".$fetched['Abstract']."</p><br>
                        <p><b>On Map:</b><br> ".$fetched['Google_Maps']."</p>
                    </div>";
            }
        } else {
            $sucht = save_sql($_POST["Search"]);
            suche($sucht, $db, "en");
        }
    	?>
    </div>
</body>
</html>
