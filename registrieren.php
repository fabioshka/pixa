<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=pixa', 'root', '');
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
   <h1>Registrieren</h1>


<?php
$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll

if(isset($_GET['register'])) {
 $error = false;
 $benutzername = $_POST['benutzername'];
 $email = $_POST['email'];
 $passwort = $_POST['passwort'];
 $passwort2 = $_POST['passwort2'];

 if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
 $error = true;
 }
 if(strlen($passwort) == 0) {
 echo 'Bitte ein Passwort angeben<br>';
 $error = true;
 }
 if($passwort != $passwort2) {
 echo 'Die Passwörter müssen übereinstimmen<br>';
 $error = true;
 }

 //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
 if(!$error) {
 $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
 $result = $statement->execute(array('email' => $email));
 $user = $statement->fetch();

 if($user !== false) {
 echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
 $error = true;
 }
 }

 //Keine Fehler, wir können den Nutzer registrieren
 if(!$error) {
 $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);

 $statement = $pdo->prepare("INSERT INTO users (benutzername,email, passwort) VALUES (:benutzername, :email, :passwort)");
 $result = $statement->execute(array('benutzername'=>$benutzername, 'email' => $email, 'passwort' => $passwort_hash));

 if($result) {
 echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
 $showFormular = false;
 } else {
 echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
 }
 }
}

if($showFormular) {
?>

<form action="?register=1" method="post">

Benutzername:<br>
<input type="text" size="40" maxlength="250" name="benutzername"><br><br>

E-Mail:<br>
<input type="email" size="40" maxlength="250" name="email"><br><br>

Dein Passwort:<br>
<input type="password" size="40"  maxlength="250" name="passwort"><br>

Passwort wiederholen:<br>
<input type="password" size="40" maxlength="250" name="passwort2"><br><br>

<input type="submit" value="Abschicken">
</form>

<?php
} //Ende von if($showFormular)
?>
 </div> <!--Ende Content-->

 <div id="footer">

 </div><!--Ende Footer!-->

</body>
</html>
