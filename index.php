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

	<h1>Was ist PIXA?</h1>

	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
	Vel eros donec ac odio tempor orci dapibus. Mattis rhoncus urna neque viverra. Ac felis donec et odio. Morbi tristique senectus
	et netus et malesuada. Eros donec ac odio tempor orci dapibus. Sit amet venenatis urna cursus eget. Dignissim enim sit amet
	venenatis urna cursus eget nunc. Pellentesque sit amet porttitor eget dolor morbi non. Tortor pretium viverra suspendisse potenti. </p>


   </div><!--Ende Content!-->
   <div id="clear"></div>

   <?php include("footer.php"); ?>
   
 </body><!-- Ende Body!-->
</html>
