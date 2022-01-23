<?php
include 'dbconn.php';
$result = mysqli_query($db,"SELECT * FROM admin_transaction");
?>
<!DOCTYPE html>
<html>
 <head>
   <title>Update transaction</title>
   <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Autour One">
   <link rel="stylesheet" href="transactions.css">
	<link rel="stylesheet" href="transactionupdatenewpage.css">
 </head>
<body>
<?php
if (mysqli_num_rows($result) > 0){
	?>
	
	<table>
	<tr>
	<td>Booking ID:</td>
	<td>Transaction Date:</td>
	<td>Transaction Time:</td>
	</tr>
	<?php
	$i=0;
	while($row = mysqli_fetch_array($result)) {
		?>
		<div class="updatetransaction">
	<tr>
	    <td><?php echo $row["bookingid"]; ?></td>
		<td><?php echo $row["transactiondate"]; ?></td>
		<td><?php echo $row["transactiontime"]; ?></td>
		
		<td><a href="updatetrans.php?bookingid=<?php echo $row["bookingid"]; ?>">Update</a></td>
      </tr>
	<?php
			$i++;
			}
			?>	
	</table>
	</div>
 <?php
}
else
{
    echo "No result found";
}
?>
 </body>
</html> 
