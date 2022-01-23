<?php
include "dbconnection.php";

$matricNo = $_REQUEST["matricNo"];

$phoneNo = $_POST["phoneNo"];

$query = "update internaluser set phoneNo='$phoneNo' where matricNo='$matricNo'";
$result = mysqli_query($db, $query);

echo "<script>alert(\"Your phone number have been updated. Please refresh your profile page.\");</script>";
echo "<script>window.close();</script>";
?>