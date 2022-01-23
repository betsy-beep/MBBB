<?php 
include 'dbconn.php';
$result = mysqli_query($db, "SELECT * FROM admin_transaction  ");
?>
<!DOCTYPE html>
<html>
<head>
 <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" type="text/css" href="css/admin_users.css">
	<title>View User</title>
	<body>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<table>
<tr>
	<td>Booking id:</td>
	
	<td>Transaction Date:</td> 
	
	<td>Transaction Time:</td>
	</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<td>
<tr>
    <td><?php echo $row["bookingid"]; ?></td>
	
    <td><?php echo $row["transactiondate"]; ?></td>
	
    <td><?php echo $row["transactiontime"]; ?></td>
	
	
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