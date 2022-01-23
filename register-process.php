<?php
include "dbconnection.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$phoneNo = $_POST["phoneNo"];
$psw = $_POST["psw"];
$cpsw = $_POST["cpsw"];
$matricNo =$_POST["matricNo"];

$query = "insert into internaluser(firstname, lastname, email, phoneNo,  password, confirmPassword, matricNo) values('$fname', '$lname', '$email', '$phoneNo', '$psw','$cpsw','$matricNo')";

$result = mysqli_query($db, $query);

echo "<script>alert (\"The marks has been successfully incorporated into the database..\");</script>";

?>