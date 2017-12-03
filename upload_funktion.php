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
 
$upload_folder = 'img/'; //Das Upload-Verzeichnis
$filename = pathinfo($_FILES['datei']['name'], PATHINFO_FILENAME);
$extension = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION));
 
 
//Überprüfung der Dateiendung
$allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');
if(!in_array($extension, $allowed_extensions)) {
 die("Ungültige Dateiendung. Nur png, jpg, jpeg und gif-Dateien sind erlaubt");
}
 
//Überprüfung der Dateigröße
$max_size = 500*1024; //500 KB
if($_FILES['datei']['size'] > $max_size) {
 die("Bitte keine Dateien größer 500kb hochladen");
}
 
//Überprüfung dass das Bild keine Fehler enthält
if(function_exists('exif_imagetype')) { //Die exif_imagetype-Funktion erfordert die exif-Erweiterung auf dem Server
 $allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
 $detected_type = exif_imagetype($_FILES['datei']['tmp_name']);
 if(!in_array($detected_type, $allowed_types)) {
 die("Nur der Upload von Bilddateien ist gestattet");
 }
}
 
//Pfad zum Upload
$new_path = $upload_folder.$filename.'.'.$extension;
 
//Neuer Dateiname falls die Datei bereits existiert
if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
 $id = 1;
 do {
 $new_path = $upload_folder.$filename.'_'.$id.'.'.$extension;
 $id++;
 } while(file_exists($new_path));
}

//Alles okay, verschiebe Datei an neuen Pfad
move_uploaded_file($_FILES['datei']['tmp_name'], $new_path);



// Upload in Datenbank

 $name = $_POST["name"];
 $fotograph = $_POST["fotograph"];
 $kategorie = $_POST["kategorie"];

    $sql = "INSERT INTO bilder (Link, Name, Fotograph, Kategorie)
    VALUES ('$new_path','$name','$fotograph','$kategorie')";
	
	if ($conn->query($sql) === TRUE) {
    echo 'Bild erfolgreich hochgeladen: <a href="'.$new_path.'">'.$new_path.'</a>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
  
	



?>

	
   </div><!--Ende Content!-->
   <div id="footer"></div><!--Ende Footer!-->
 </body><!-- Ende Body!-->
</html>