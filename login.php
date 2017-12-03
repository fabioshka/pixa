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
   <h1>Login</h1>
	<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=pixa', 'root', '');

if(isset($_GET['login'])) {
 $email = $_POST['email'];
 $passwort = $_POST['passwort'];

 $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
 $result = $statement->execute(array('email' => $email));
 $user = $statement->fetch();

 //Überprüfung des Passworts
 if ($user !== false && password_verify($passwort, $user['passwort'])) {
 $_SESSION['userid'] = $user['id'];
 die('Login erfolgreich. Weiter zu <a href="geheim.php">internen Bereich</a>');
 } else {
 $errorMessage = "E-Mail oder Passwort war ungültig<br>";
 }

}

if(isset($errorMessage)) {
 echo $errorMessage;
}
?>
		<div id="login">
			<form action="?login=1" method="post">
				E-Mail:<br>
				<input type="email" size="40" maxlength="250" name="email"><br><br>

				Dein Passwort:<br>
				<input type="password" size="40"  maxlength="250" name="passwort"><br><br>

				<input type="submit" value="Abschicken">
        <div>Noch kein Konto? <a href="registrieren.php">Erstelle hier ein neues Konto</a></div>
			</form>
		</div><!--Ende login-->
   </div><!--Ende Content!-->
   <div id="footer"></div><!--Ende Footer!-->
 </body><!-- Ende Body!-->
</html>
