<?php 
//connect to mysql server
$db=mysqli_connect("sql211.epizy.com", "epiz_28929474", "eWyh9BwPIM", "epiz_28929474_mbbb") or die ("The MYSQL server is OFF <br>");

if ($db == true) {
	echo " ";
}

if(isset($_POST['register'])){
	$ICNumber = $_POST["ICNumber"];
	$FirstName = $_POST["FirstName"];
	$LastName = $_POST["LastName"];
	$Email = $_POST["Email"];
	$Mobile = $_POST["Mobile"];
	
	
	$sql = "INSERT INTO guestregister (ICNumber, FirstName, LastName, Email, Mobile) VALUES ('$ICNumber', '$FirstName', '$LastName', '$Email', '$Mobile')";
	mysqli_query($db, $sql);
	
	

	echo "<script> 
	alert('Registered!');
	</script>";
	
	
	echo "<script> 
	document.location.href = 'guestregistration.php';
	</script>";
}

if(isset($_POST['Cart'])){
	$FirstName = $_POST["FirstName"];
	$Time = $_POST["Time"];
	$Date = $_POST["Date"];
	$Room = $_POST["Room"];
	$guestID = $_POST["guestID"];
	
	$sql = "INSERT INTO cart (guestID, FirstName, Time, Date, Room) VALUES ('$guestID', '$FirstName', '$Time', '$Date', '$Room')";
	mysqli_query($db, $sql);
	
	echo "<script> 
	alert('Added to cart!');
	</script>";
	echo "<script> 
	document.location.href = 'cart.php?guestID=$guestID';
	</script>";
}


if(isset($_POST['pay'])){
	$card = $_POST["card"];
	$name = $_POST["name"];
	$cardno = $_POST["cardno"];
	$expiry = $_POST["expiry"];
	$cvv = $_POST["cvv"];
	$guestID = $_POST["guestID"];
	
	$sql = "INSERT INTO payment (card, name, cardno, expiry, cvv, guestID) VALUES ('$card', '$name', '$cardno', '$expiry', '$cvv', '$guestID')";
	mysqli_query($db, $sql);
	mysqli_query($db, "DELETE FROM cart WHERE guestID = $guestID");

	echo "<script> 
	alert('Payment Succesful!');
	</script>";
	echo "<script> 
	document.location.href = 'receipt.php?guestID=$guestID';
	</script>";
}
?>