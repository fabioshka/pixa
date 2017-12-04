<?php
session_start();
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
			height: 100%;

			/* Center and scale the image nicely */
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>
  </head>
  <body>
	<?php include("nav.php"); ?>
	<div id="header1">
		<p id="top">PIXA</p>
		<p id="bottom">Share your pictures!</p>
	</div>
   <div id="bg"></div><!--Ende bg-->
   <div id="clear"></div><!--Ende clear-->

   <div id="content">

 <?php
  include("dbconnect.php");
  
	 $userid = $_SESSION['userid'];
	 
 $link = $_POST["link"];
 
    $sql = "SELECT * FROM bilder
            WHERE link = '$link'";
            
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
   </div><!--Ende Content!-->
    <?php
    }
    ?>
   <div id="clear"></div>

   <?php include("footer.php"); ?>
   
 </body><!-- Ende Body!-->
</html>






