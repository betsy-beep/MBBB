<?php
include  ('adminconnection.php');
$sql = "DELETE FROM admin_transaction WHERE bookingid='$_GET[bookingid]' ";
if (mysqli_query($db, $sql)) 
?>
<style>
body{
	background:#7A9EC5;
}
</style>
<h3>Transaction has been deleted successfully.</h3>
<input type="button" value="Continue" onclick="window.location.href='Deletetransaction.php'"/>