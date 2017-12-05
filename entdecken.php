<?php session_start();

 include("dbconnect.php");
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>Entdecken</title>
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
     <p id="top">News</p>
     <p id="bottom">Share your pictures!</p>
   </div>
    <div id="bg"></div><!--Ende bg-->
    <div id="clear"></div><!--Ende clear-->

   <div id="content">

     <?php if(isset($_COOKIE['zuletzt'])){

       $zuletzt = $_COOKIE['zuletzt'];

       $sql_zuletzt = "SELECT * FROM bilder WHERE bilderid = '$zuletzt'";
       foreach ($conn->query($sql_zuletzt) as $row_zuletzt) {
       ?>

       <h1>Zuletzt angesehen</h1>

       <div id="entdecken_bilder">
           <a href="foto.php?bilderid=<?php echo $row_zuletzt['bilderid']; ?>"><img src="<?php echo $row_zuletzt['link']; ?>" alt="<?php echo $row_zuletzt['name']; ?>"></a>
       </div><!--Ende entdecken_bilder-->

      <?php } ?>
      <div id="clear"></div>
     <?php } ?>

     <h1>Bilder nach Kategorien</h1>

     <div id="entdecken_bild_wrapper">

           <?php

           $sql_kategorie = "SELECT kategorie FROM bilder GROUP BY kategorie";
           foreach ($conn->query($sql_kategorie) as $row_kategorie) {

             $kategorie_array[] = $row_kategorie['kategorie'];

           }

           //$kategorie_array = array('Natur', 'Macro', 'Portrait', 'Kunst');

           foreach ($kategorie_array as $key => $kategorie) {

               echo "<h2>$kategorie</h2>";
               echo "<div id=\"mehr\"><a href=\"kategorie.php?kategorie=$kategorie\">Mehr von $kategorie...</a></div>";



               $sql = "SELECT * FROM bilder WHERE kategorie = '$kategorie' LIMIT 3";
               foreach ($conn->query($sql) as $row) {
               ?>

                <div id="entdecken_bilder">
                    <a href="foto.php?bilderid=<?php echo $row['bilderid']; ?>"><img src="<?php echo $row['link']; ?>" alt="<?php echo $row['name']; ?>"></a>
                </div><!--Ende entdecken_bilder-->


            <?php } ?>
              <div id="clear"></div>
          <?php } ?>

      </div><!--Ende entdecken_bild_wrapper-->
   </div><!--Ende Content!-->

   <?php include("footer.php"); ?>

 </body><!-- Ende Body!-->
</html>
