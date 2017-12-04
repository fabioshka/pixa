<?php session_start();?>
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

   <div id="content"></div><!--Ende Content!-->

   <?php include("footer.php"); ?>

 </body><!-- Ende Body!-->
</html>
