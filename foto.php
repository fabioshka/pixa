<?php
session_start();
include("dbconnect.php");
$userid = $_SESSION['userid'];

$bilderid = $_GET["bilderid"];

setcookie("zuletzt", $bilderid, time() + (86400 * 30), "/"); // 86400 = 1 Tag

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
