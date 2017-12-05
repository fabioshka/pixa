<?php session_start();
  $bilderid = $_GET['bilderid'];
  include("dbconnect.php");

if(isset($_GET['bearbeiten'])){
  $bilderid = $_GET['bilderid'];
  $name = $_POST["name"];
  $beschrieb = $_POST["beschrieb"];
  $kategorie = $_POST["kategorie"];

  $sql = "UPDATE bilder SET name='$name', beschrieb='$beschrieb', kategorie='$kategorie' WHERE bilderid='$bilderid'";

if ($conn->query($sql) === TRUE) {
      echo "<div id=\"erfolg\">Die Daten wurden geändert</div>";
} else {
    echo "Error updating record: " . $conn->error;
}

}

?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>Bearbeiten</title>
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
     <p id="top">Bearbeiten</p>
     <p id="bottom">Edit your pictures!</p>
   </div>
    <div id="bg"></div><!--Ende bg-->
    <div id="clear"></div><!--Ende clear-->

   <div id="content">
     <h1>Bild bearbeiten</h1>

     <?php
     $sql = "SELECT * FROM bilder
             WHERE bilderid = $bilderid";
     foreach ($conn->query($sql) as $row) {
     ?>

      <div id="upload">
    		<form action="?bilderid=<?php echo $bilderid;?>&bearbeiten=1" method="post" enctype="multipart/form-data">

    		<label for"name">Name</label></br></br>
    		<input type="text" name="name" value="<?php echo $row['name']; ?>"></br></br>

        <label for"beschrieb">Beschrieb</label></br></br>
    		<textarea name="beschrieb"><?php echo $row['beschrieb']; ?></textarea><br><br>

    		<label for"kategorie">Kategorie</label></br></br>
    		<select type="text" name="kategorie">
          <?php if(!isset($row['kategorie'])) { ?><option disabled selected value> -- Option auswählen -- </option><?php } ?>
    			<option value="Natur" <?php if($row['kategorie'] == "natur") { echo "selected"; } ?> >Natur</option>
    			<option value="Macro" <?php if($row['kategorie'] == "macro") { echo "selected"; } ?> >Macro</option>
    			<option value="Portrait" <?php if($row['kategorie'] == "portrait") { echo "selected"; } ?> >Portrait</option>
    			<option value="Kunst" <?php if($row['kategorie'] == "kunst") { echo "selected"; } ?> >Kunst</option>
    		</select> </br> </br>

        <input type="submit" value="Ändern">
        <div>Zurück zum  <a href="profil.php">Profil</a></div>
    		</form>
      </div><!--Ende upload-->
    <?php } ?>
     </div><!--Ende Content!-->

   <?php include("footer.php"); ?>

 </body><!-- Ende Body!-->
</html>
