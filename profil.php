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
  <div id="header2">
		<p id="top"><?php echo $benutzername; ?></p>
		<p id="bottom">Share your pictures!</p>
	</div><!--Ende header2-->
   <div id="bg"></div><!--Ende bg-->
   <div id="clear"></div><!--Ende clear-->

	<body>
	<div id="content">

		<h1>BILDSTRECKE VON <?php echo $benutzername; ?></h1>

    <?php
    $sql = "SELECT * FROM users
            LEFT JOIN bilder ON users.id = bilder.fotograf_id
            WHERE users.id = $userid";
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
