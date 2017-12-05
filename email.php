<?php
session_start();
ini_set("display_errors", "1");
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>Link</title>
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
		<p id="top">Link</p>
		<p id="bottom">Hier kannst du dir die Seite per Email schicken!</p>
	</div>
   <div id="bg"></div><!--Ende bg-->
   <div id="clear"></div><!--Ende clear-->

   <div id="content">

  <h1>Link schicken</h1>
		<div id="login">
		<?php if (isset($_POST['email']))  {
			
  
  //Email information
  $admin_email = $_POST['email'];
  $email = 'Webmaster Pixa';
  $subject = 'Link';
  $link = 'http://localhost/pixa/';
  
  //send email
  mail($admin_email, "$subject", $link, "From:" . $email);
  
  //Email response
  echo "Die Mail wurde verschickt!";
  }
  
  //if "email" variable is not filled out, display the form
  else  {
	?>		<form method="post">
				<label for="email">E-Mail</label><br><br>
				<input type="email" size="40" maxlength="250" name="email"><br><br>

				

				<input type="submit" value="Abschicken">
      
			</form>
	<?php
  }
  ?>
		</div><!--Ende login-->
   </div><!--Ende Content!-->
   <div id="clear"></div>

    <?php include("footer.php"); ?>

 </body><!-- Ende Body!-->
</html>
