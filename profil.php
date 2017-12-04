<?php
session_start();
if(!isset($_SESSION['userid'])) {
  ?>

  <script type="text/javascript">
    <!--
    window.location.href = "login.php";
    //–>
  </script>

  <?php
}

include("dbconnect.php");

//Abfrage der Nutzer ID vom Login
$userid = $_SESSION['userid'];



$sql = "SELECT * FROM users WHERE id = $userid";
foreach ($conn->query($sql) as $row) {
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

			/* height */
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

    <?php include("footer.php"); ?>
    
 </body><!-- Ende Body!-->
</html>
