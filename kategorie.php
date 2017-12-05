<?php session_start();

 include("dbconnect.php");

 $kategorie = $_GET['kategorie'];
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>Entdecken</title>
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

     <h1>Kategorie: <?php echo $kategorie; ?></h1>
     <div id="mehr"><a href="entdecken.php">Zurück zur übersicht</a></div>


     <?php
     $sql = "SELECT * FROM bilder
             WHERE kategorie = '$kategorie' ORDER BY datum Desc";

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
                   </div><!--Ende bild_beschrieb_wrapper-->
                 </div><!--ende bild_wrapper-->
                <?php
             }
     ?>
   </div><!--Ende Content!-->
   <div id="clear"></div>

   <?php include("footer.php"); ?>

 </body><!-- Ende Body!-->
</html>
