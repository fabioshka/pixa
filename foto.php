<?php
session_start();
 ob_start();

  // ini_set("display_errors", "1");
  // error_reporting(E_ALL);
include("dbconnect.php");

//interessen


if(isset($_SESSION['userid'])){
$userid = $_SESSION['userid'];

//interessen
$kategorie = $_GET["kategorie"];

if ($result = $conn->query("SELECT * FROM interessen WHERE fotograf_id=$userid AND kategorie='$kategorie'")) {

    $row_cnt = $result->num_rows;
}

if($row_cnt == 0){
  $sql_interessen = "INSERT INTO interessen (fotograf_id, kategorie, wert) VALUES ($userid, '$kategorie', 1)";
}
else {
  $sql_interessen = "UPDATE interessen SET wert=wert+1 WHERE fotograf_id=$userid AND kategorie='$kategorie'";
}


if ($conn->query($sql_interessen) === TRUE) {
    echo " ";
} else {
  echo "Error updating record: " . $conn->error;
}

}

$bilderid = $_GET["bilderid"];

/* Zuletzt angesehen */
$sql_zuletzt = "SELECT link FROM bilder WHERE bilderid = '$bilderid'";
foreach ($conn->query($sql_zuletzt) as $row_zuletzt) {

  $link = $row_zuletzt['link'];

}

if(isset($_COOKIE['zuletzt1'])){

  $zuletzt1 = $_COOKIE['zuletzt1'];
  setcookie("zuletzt2", $zuletzt1, time() + (86400 * 30), "/"); // 86400 = 1 Tag

}

if(isset($_COOKIE['zuletzt'])){

  $zuletzt = $_COOKIE['zuletzt'];
  setcookie("zuletzt1", $zuletzt, time() + (86400 * 30), "/"); // 86400 = 1 Tag

}

setcookie("zuletzt", $link, time() + (86400 * 30), "/"); // 86400 = 1 Tag


?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>Startseite</title>
	<link href="style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">
	<style>
				#bg {
			/* The image used */
			background-image: url("img/country.jpg");

			/* Full height */
			height: 50%;

			/* Center and scale the image nicely */
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>
  </head>
  <body>

    <div id="header"></div>
    <?php include("nav.php"); ?>

    <div id="header2">
      <p id="top">News</p>
      <p id="bottom">Share your pictures!</p>
    </div>
     <div id="bg"></div><!--Ende bg-->
     <div id="clear"></div><!--Ende clear-->

    <div id="content">
      <div id="mehr"><a href="javascript:window.history.back()">Zurück zu den Kategorien</a></div>
      <?php

        $sql = "SELECT * FROM users
                LEFT JOIN bilder ON users.id = bilder.fotograf_id
                WHERE bilderid = '$bilderid' ORDER BY datum Desc";

      foreach ($conn->query($sql) as $row) {
         ?>
         <div id="bild_wrapper">
            <img src="<?php echo $row['link']; ?>" alt="<?php echo $row['name']; ?>">

            <div id="bild_beschrieb_wrapper">
              <div id="bild_title">
                <p><?php echo $row['name']; ?></p>
              </div><!--Ende bild_title-->

              <div id="bild_beschrieb">
                <p><?php echo $row['beschrieb']; ?></p>
              </div><!--Ende bild_beschrieb-->
              <div id="fotograf">
              Fotograf: <b><?php echo $row['benutzername']; ?></b>
            </div><!--Ende fotograf-->
            </div><!--Ende bild_beschrieb_wrapper-->
          </div><!--ende bild_wrapper-->
         <?php
      }
      ?>

    </div><!--Ende Content!-->

    <?php include("footer.php"); ?>

 </body><!-- Ende Body!-->
</html>
