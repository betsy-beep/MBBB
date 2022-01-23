<?php
include "dbconnection.php";

$matricNo = $_REQUEST["matricNo"];

$room = $_POST["room"];
$time = $_POST["time"];
$capacity = $_POST["capacity"];
$date =$_POST["date"];

$query = "insert into booking(matricNo, room, time, roomCapacity, date) values('$matricNo', '$room', '$time', '$capacity', '$date')";
//$result = mysqli_query($db, $query);

if($db -> query($query) === TRUE){
	$last_id = $db -> insert_id;
}else{
	echo "Error: " .$query."<br>".$db->error;
}

echo "<script>alert(\"Your booking is successful.\");</script>";
echo "<script>window.location='receiptprintinternal.php?id=$last_id'</script>";
?>