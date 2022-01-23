<?php 
include "adminconnection.php";
			
			$username = $_POST["username"];
			$firstname =$_POST["firstname"];
			$lastname = $_POST["lastname"];
			$icnumber =$_POST["icnumber"];
			$email =$_POST["email"];
			$phonenumber = $_POST["phonenumber"];
			$inpassword =$_POST["inpassword"];
			$confpassword =$_POST["confpassword"];
			
			$sql = "insert into admin_user(username,firstname, lastname, icnumber, email, phonenumber, inpassword, confpassword) values( '$username', '$firstname', '$lastname', '$icnumber', '$email', '$phonenumber', '$inpassword', '$confpassword')";
			$result = mysqli_query($db, $sql);
			echo "<script>alert (\"The marks has been successfully incorporated into the database..\");</script>";
			


?>
