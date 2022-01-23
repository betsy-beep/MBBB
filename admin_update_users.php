<?php
include "adminconnection.php";

$username = $_POST["username"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$icnumber = $_POST["icnumber"];
$email = $_POST["email"];
$phonenumber = $_POST["phonenumber"];
$inpassword = $_POST["inpassword"];
$confpassword = $_POST["confpassword"];

$query = mysqli_query($db, "update admin_user set firstname= '$firstname',lastname='$lastname', icnumber='$icnumber',email='$email', phonenumber='$phonenumber', inpassword='$inpassword', confpassword='$confpassword' where username='$username'");
echo('<script>location.href="ManageUser.php"</script>');
?>
