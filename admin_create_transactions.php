<?php
include "dbconn.php";
			
			$bookingid = $_POST["bookingid"];
			$transactiondate = $_POST["transactiondate"];
			$transactiontime = $_POST["transactiontime"];
			
			
			
			$sql = "insert into admin_transaction(bookingid, transactiondate, transactiontime) values( '$bookingid',  '$transactiondate', '$transactiontime')";
			$result = mysqli_query($db, $sql);
			echo "<script>alert (\"The marks has been successfully incorporated into the database..\");</script>";
			


?>