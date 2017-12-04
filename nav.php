<div id="nav">
<ul>
	<a href="index.php"><li>HOME</li></a>
	<a href="#"><li>ENTDECKEN</li></a>
	<a href="profil.php"><li>MEIN PROFIL</li></a>

	<?php
		if(isset($_SESSION['userid'])) {
		 echo "<a href=\"upload.php\">&#11014; HOCHLADEN</a>";
		}
	?>
	<span id="login_button">
		<?php
			if(!isset($_SESSION['userid'])) {
			 echo "<a href=\"login.php\">LOGIN</a>";
			}

			if(isset($_SESSION['userid'])) {
			 echo "<a href=\"logout.php\">LOGOUT</a>";
			}
		 ?>
	</span><!--Ende login_button-->
</ul>
</div><!--Ende nav-->
