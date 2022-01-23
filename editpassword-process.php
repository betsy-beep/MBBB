<?php 
include "dbconnection.php";

$matricNo = $_REQUEST['matricNo'];

$psw = $_POST["psw"];
$cpsw = $_POST["cpsw"];

if($psw == $cpsw){
	$query = "update internaluser set password='$psw', confirmpassword='$cpsw' where matricNo='$matricNo'";
	$result = mysqli_query($db, $query);
	echo "<script>alert(\"Your password has been updated. Please re-login.\");</script>";
	echo "<script>window.close();if (window.opener && !window.opener.closed){window.opener.location='index.html';}</script>";
	
}else{
	echo "<script>alert(\"Password and confirm password does not match.\");</script>";
    echo "<script>window.location='editpassword.php?matricNo=$matricNo'</script>";
}
?>