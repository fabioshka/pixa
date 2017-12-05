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
if(isset($_GET['upload'])){
  if($_GET['upload'] == 1) {
    echo "<div id=\"erfolg\">Dein Bild wurde hochladen</div>";
  }
}
include("dbconnect.php");

//Abfrage der Nutzer ID vom Login
$userid = $_SESSION['userid'];

?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>Upload</title>
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
	<div id="header2">
		<p id="top">UPLOAD</p>
		<p id="bottom">Share your pictures!</p>
	</div>
   <div id="bg"></div><!--Ende bg-->
   <div id="clear"></div><!--Ende clear-->

   <div id="content">
   <h1>Bild hochladen</h1>

    <div id="upload">
  		<form action="upload_funktion.php" method="post" enctype="multipart/form-data">

  		<label for"name">Name</label></br></br>
  		<input type="text" name="name"></br></br>

      <label for"beschrieb">Beschrieb</label></br></br>
  		<textarea name="beschrieb"></textarea><br><br>

  		<label for"kategorie">Kategorie</label></br></br>
  		<select type="text" name="kategorie">
        <option disabled selected value> -- Option auswählen -- </option>
  			<option value="Natur">Natur</option>
  			<option value="Macro">Macro</option>
  			<option value="Portrait">Portrait</option>
  			<option value="Kunst">Kunst</option>
  		</select> </br> </br>

      <label for"datei">Bild auswählen (max 5MB)</label></br></br>
        <input type="file" name="datei"><br> </br><br>

      <input type="submit" value="Hochladen">
  		</form>
    </div><!--Ende upload-->

   </div><!--Ende Content!-->

    <?php include("footer.php"); ?>

 </body><!-- Ende Body!-->
</html>
