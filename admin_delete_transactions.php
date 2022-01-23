<?php
include_once 'dbconn.php';
$result = mysqli_query($db,"SELECT * FROM admin_transaction ");
?>
<!DOCTYPE html>
<html>
<head>
 <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" type="text/css" href="css/transactions.css">
	<title>Delete Transaction</title>
	<body>

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


    <td><?php echo $row["bookingid"]; ?></td>
	
    <td><?php echo $row["transactiondate"]; ?></td>
	
    <td><?php echo $row["transactiontime"]; ?></td>
	
	<td><a href="deletebooking.php?bookingid=<?php echo $row["bookingid"]; ?>">Delete</a></td>
	
</tr>
<?php
$i++;
}
?>
</table>


</body>
</html>