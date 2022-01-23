<?php
include "bookingconnection.php";

$username = $_POST["username"];
$bookingtype = $_POST["booking-type"];
$bookingdate = $_POST["booking-date"];
$bookingtime = $_POST["booking-time"];
$bookingcapacity = $_POST["booking-capacity"];

$query = mysqli_query($db, "update booking set room = '$bookingtype', bookingtime = '$bookingtime', roomCapacity = '$bookingcapacity', date = '$bookingdate' where matricNo='$username'");
echo('<script>location.href="ManageBooking.php"</script>');

?>

