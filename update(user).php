<?php
include "adminconnection.php";

$username = $_REQUEST['username'];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$icnumber = $_POST["icnumber"];
$email = $_POST["email"];
$phonenumber = $_POST["phonenumber"];
$inpassword = $_POST["inpassword"];
$confpassword = $_POST["confpassword"];

$query = "update admin_user set username='$username', firstname='$firstname', lastname='$lastname', icnumber='$icnumber', email='$email', phonenumber='$phonenumber', inpassword='$inpassword', confpassword='$confpassword' where username='$username'";
$result = mysqli_query($db, $query);

echo "<script>alert(\"Your data has been updated. Please refresh the page.\");</script>";
echo "<script>window.close();</script>";
?>