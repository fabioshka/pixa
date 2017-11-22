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
   <h1>Bild hochladen</h1>
		<form action="upload_funktion.php" method="post" enctype="multipart/form-data">
		Fotograph:</br>
		<input type="name" name="fotograph"></br>
		Name:</br>
		<input type="name" name="name"></br>
		Kategorie:</br>
		<select name="kategorie">
			<option value="natur">Natur</option>
			<option value="macro">Macro</option>
			<option value="portrait">Portrait</option>
			<option value="kunst">Kunst</option>
		</select> </br> </br>
		<input type="file" name="datei"><br> </br>
		<input type="submit" value="Hochladen">
		</form>

   </div><!--Ende Content!-->
   <div id="footer"></div><!--Ende Footer!-->
 </body><!-- Ende Body!-->
</html>