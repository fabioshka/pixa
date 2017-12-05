<?php session_start();

 include("dbconnect.php");

 if(isset($_SESSION['userid'])){
   $userid = $_SESSION['userid'];
 }
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
       ?>

       <h1>Zuletzt angesehen</h1>

      <div id="entdecken_bilder">
       <img src="<?php echo "$zuletzt"; ?>" >
     </div><!--Ende entdecken_bilder-->

     <div id="entdecken_bilder">
       <?php
       if(isset($_COOKIE['zuletzt1'])){
         $zuletzt1 = $_COOKIE['zuletzt1'];
         ?>
         <img src="<?php echo "$zuletzt1"; ?>" >
         <?php
       }
       ?>
    </div><!--Ende entdecken_bilder-->

    <div id="entdecken_bilder">
      <?php
      if(isset($_COOKIE['zuletzt2'])){
        $zuletzt2 = $_COOKIE['zuletzt2'];
        ?>
        <img src="<?php echo "$zuletzt2"; ?>" >
        <?php
      }
      ?>
   </div><!--Ende entdecken_bilder-->




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
                    <a href="foto.php?bilderid=<?php echo $row['bilderid']; ?>&kategorie=<?php echo $row['kategorie']; ?>"><img src="<?php echo $row['link']; ?>" alt="<?php echo $row['name']; ?>"></a>
                </div><!--Ende entdecken_bilder-->


            <?php } ?>
              <div id="clear"></div>
          <?php } ?>

      </div><!--Ende entdecken_bild_wrapper-->

      <?php
      if(isset($_SESSION['userid'])){
      ?>

          <h1>Deine Top Kategorien...</h1>

      <?php

      $sql_interessen = "SELECT * FROM interessen WHERE fotograf_id = $userid ORDER BY WERT Desc LIMIT 3";
        foreach ($conn->query($sql_interessen) as $row_interessen) {

        $interessen_kategorien[] = $row_interessen['kategorie'];

        }

        foreach ($interessen_kategorien as $key => $kategorien) {
          ?>
          <div id="interessen">
            <a href="kategorie.php?kategorie=<?php echo $kategorien;?>"><?php echo $kategorien;?></a><br>
          </div><!--Ende interessen-->
          <?php

        }

      }
      ?>

   </div><!--Ende Content!-->

   <?php include("footer.php"); ?>

 </body><!-- Ende Body!-->
</html>
