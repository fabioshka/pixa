<?php
 session_start();

 include("dbconnect.php");

 $userid = $_SESSION['userid'];


$upload_folder = 'img/'; //Das Upload-Verzeichnis
$filename = pathinfo($_FILES['datei']['name'], PATHINFO_FILENAME);
$extension = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION));


//Überprüfung der Dateiendung
$allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');
if(!in_array($extension, $allowed_extensions)) {
 die("Ungültige Dateiendung. Nur png, jpg, jpeg und gif-Dateien sind erlaubt");
}

//Überprüfung der Dateigröße
$max_size = 5000*1024; //5000 KB = 5 MB
if($_FILES['datei']['size'] > $max_size) {
 die("Bitte keine Dateien größer 5MB hochladen");
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
 $beschrieb = $_POST["beschrieb"];
 $kategorie = $_POST["kategorie"];

    $sql = "INSERT INTO bilder (link, name, beschrieb, fotograf_id, kategorie)
    VALUES ('$new_path','$name', '$beschrieb','$userid','$kategorie')";

	if ($conn->query($sql) === TRUE) {
    ?>

    <script type="text/javascript">
      <!--
      window.location.href = "upload.php?upload=1";
      //–>
    </script>

    <?php
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
