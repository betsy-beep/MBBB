<?php 
include "dbconn.php";
			
			$username = $_POST["username"];
			$bookingtype = $_POST["bookingtype"];
			$bookingdate = $_POST["bookingdate"];
			$bookingtime = $_POST["bookingtime"];
			$bookingcapacity = $_POST["bookingcapacity"];
			
			
			$sql = "insert into admin_booking(username,bookingtype, bookingdate, bookingtime, bookingcapacity) values( '$username', '$bookingtype', '$bookingdate', '$bookingtime', '$bookingcapacity')";
			$result = mysqli_query($db, $sql);
			echo "<script>alert (\"The marks has been successfully incorporated into the database..\");</script>";
			


?>