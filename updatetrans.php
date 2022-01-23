<?php
include 'dbconn.php';
if(count($_POST)>0) {
mysqli_query($db,"UPDATE admin_transaction set bookingid='" . $_POST['bookingid'] . "', transactiondate='" . $_POST['transactiondate'] . "', transactiontime='" . $_POST['transactiontime'] . "'  WHERE bookingid='" . $_POST['bookingid'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($db,"SELECT * FROM admin_transaction WHERE bookingid='" . $_GET['bookingid'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>

<title>Update Transaction Data</title>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Autour One">
   <link rel="stylesheet" href="transactions.css">
	<link rel="stylesheet" href="transactionupdatenewpage.css">
</head>
<body>
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;" class="update">
<a href="Updatetransaction.php">Back to update page</a>
</div>
<div class="input">
Booking ID: <br>
<input type="hidden" name="bookingid" class="txtField" value="<?php echo $row['bookingid']; ?>">
<input type="text" name="bookingid"  value="<?php echo $row['bookingid']; ?>">
<br>
Transaction Date: <br>
<input type="date" name="transactiondate" class="txtField" value="<?php echo $row['transactiondate']; ?>">
<br>
Transaction Time :<br>
<input type="text" name="transactiontime" class="txtField" value="<?php echo $row['transactiontime']; ?>">
<br>
</div>
<input type="submit" name="submit" value="Submit" class="button" onclick="location.href = 'Updatetransaction.php'">

</form>
</body>
</html>