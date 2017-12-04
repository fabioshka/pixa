<?php
include("dbconnect.php");

$bilderid = $_GET['bilderid'];

$sql = "DELETE FROM `bilder` WHERE `bilderid`='$bilderid'";

if ($conn->query($sql) === TRUE) {
      ?>

      <script type="text/javascript">
        <!--
        window.location.href = "profil.php";
        //–>
      </script>

      <?php
} else {
    echo "Error updating record: " . $conn->error;
}

?>
