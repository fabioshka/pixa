<?php
session_start();
ini_set("display_errors", "1");
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
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
		<p id="top">LOGIN</p>
		<p id="bottom">Hier kannst du dich anmelden!</p>
	</div>
   <div id="bg"></div><!--Ende bg-->
   <div id="clear"></div><!--Ende clear-->

   <div id="content">
<?php
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
    ?>

    <script type="text/javascript">
      <!--
      window.location.href = "profil.php";
      //–>
    </script>

    <?php
 } else {
 $errorMessage = "E-Mail oder Passwort war ungültig<br>";
 }

}

if(isset($errorMessage)) {
 echo $errorMessage;
}
?>
  <h1>Login</h1>
		<div id="login">
			<form action="?login=1" method="post">
				<label for="email">E-Mail</label><br><br>
				<input type="email" size="40" maxlength="250" name="email"><br><br>

				<label for="passwort">Passwort</label><br><br>
				<input type="password" size="40"  maxlength="250" name="passwort"><br><br>

				<input type="submit" value="Abschicken">
        <div>Noch kein Konto? <a href="registrieren.php">Erstelle hier ein neues Konto</a></div>
			</form>
		</div><!--Ende login-->
   </div><!--Ende Content!-->
   <div id="clear"></div>

    <?php include("footer.php"); ?>

 </body><!-- Ende Body!-->
</html>
