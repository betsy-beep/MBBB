<?php 
include "dbconnection.php";

$matricNo = $_REQUEST['matricNo'];

$email = $_POST["email"];

$query = "update internaluser set email='$email' where matricNo='$matricNo'";
$result = mysqli_query($db, $query);

echo "<script>alert(\"Your email has been updated. Please refresh the profile page.\");</script>";
echo "<script>window.close();</script>";
?>