<?php 
include 'dbconn.php';
$result = mysqli_query($db, "SELECT * FROM admin_booking WHERE username='Raisha' ");
?>

<!DOCTYPE html>
<html>
<head>
 <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" type="text/css" href="css/admin_users.css">
	<title>View Booking</title>
	<body>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<table>
<tr>
	<td>Username:</td>
	<td>Room Name :</td>  
	<td>Booking Date:</td>
	<td>Booking Time:</td>
	<td>Booking Capacity:</td>
</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>

<tr>
    <td><?php echo $row["username"]; ?></td>
    <td><?php echo $row["bookingtype"]; ?></td>
    <td><?php echo $row["bookingdate"]; ?></td>
	<td><?php echo $row["bookingtime"]; ?></td>
    <td><?php echo $row["bookingcapacity"]; ?></td>
	
</tr>
<?php
$i++;
}
?>
</table>
<?php
}
else{
    echo "No result found";
}
?>
</body>
</html>