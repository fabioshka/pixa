<?php
session_start();
if(!isset($_SESSION['userid'])) {
 die(header ( 'Location: login.php' ));
echo $_SESSION['userid'];
}

include("dbconnect.php");

//Abfrage der Nutzer ID vom Login
$userid = $_SESSION['userid'];



$sql = "SELECT * FROM users WHERE id = $userid";
foreach ($pdo->query($sql) as $row) {
   $benutzername = $row['benutzername'];
}
?>


<!DOCTYPE html>
<html>
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
	<?php include("nav.php"); ?>
   <div id="bg"></div><!--Ende bg-->
   <div id="clear"></div><!--Ende clear-->

	<body>
	<div id="content">

		<h1>BILDSTRECKE VON <?php echo $benutzername; ?></h1>

  </div><!--Ende Content!-->
  <div id="clear"></div>
   <div id="footer">
     copyright by pixa AG
   </div><!--Ende Footer!-->
 </body><!-- Ende Body!-->
</html>
