<?php
include ('dbconn.php');


$sql = "DELETE FROM admin_booking WHERE username='$_GET[username]'";

if(mysqli_query($db,$sql))
   
?>
<style >
      body{
         background: #7A9EC5;
      }
   </style>
   <h3>Booking has been deleted successfully.</h3>
<input type="button" value="Continue" onclick="window.location.href='ManageBooking.php'" />