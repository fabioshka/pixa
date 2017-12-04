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
		<p id="top">SIGN UP</p>
		<p id="bottom">Hier kannst du dich Registrieren!</p>
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
 echo '<b>Bitte eine gültige E-Mail-Adresse eingeben</b><br><br>';
 $error = true;
 }
 if(strlen($passwort) == 0) {
 echo '<b>Bitte ein Passwort angeben</b><br><br>';
 $error = true;
 }
 if($passwort != $passwort2) {
 echo '<b>Die Passwörter müssen übereinstimmen</b><br><br>';
 $error = true;
 }

 //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
 if(!$error) {
 $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
 $result = $statement->execute(array('email' => $email));
 $user = $statement->fetch();

 if($user !== false) {
 echo '<b>Diese E-Mail-Adresse ist bereits vergeben</b><br>';
 $error = true;
 }
 }

 //Keine Fehler, wir können den Nutzer registrieren
 if(!$error) {
 $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);

 $statement = $pdo->prepare("INSERT INTO users (benutzername,email, passwort) VALUES (:benutzername, :email, :passwort)");
 $result = $statement->execute(array('benutzername'=>$benutzername, 'email' => $email, 'passwort' => $passwort_hash));

 if($result) {
 echo '<b>Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a></b><br>';
 $showFormular = false;
 } else {
 echo '<b>Beim Abspeichern ist leider ein Fehler aufgetreten</b><br><br>';
 }
 }
}

if($showFormular) {
?>

<div id="login">
  <form action="?register=1" method="post">

  <label for"benutzername">Benutzername</label><br><br>
  <input type="text" size="40" maxlength="250" name="benutzername"><br><br>

  <label for"email">E-Mail</label><br><br>
  <input type="email" size="40" maxlength="250" name="email"><br><br>

  <label for"passwort">Dein Passwort</label><br><br>
  <input type="password" size="40"  maxlength="250" name="passwort"><br><br>

  <label for"passwort2">Passwort wiederholen</label><br><br>
  <input type="password" size="40" maxlength="250" name="passwort2"><br><br>

  <input type="submit" value="Abschicken">
  <div>Schon registriert? <a href="login.php">Dann geht's hier zum Login</a></div>
  </form>
</div><!--Ende Login-->
<?php
} //Ende von if($showFormular)
?>
 </div> <!--Ende Content-->

<div id="clear"></div>

  <?php include("footer.php"); ?>

</body>
</html>
