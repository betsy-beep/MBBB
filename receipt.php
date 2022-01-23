<?php
$db=mysqli_connect("sql211.epizy.com", "epiz_28929474", "eWyh9BwPIM", "epiz_28929474_mbbb") or die ("The MYSQL server is OFF <br>");

if(isset($_POST['home'])){
	$guestID = $_POST["guestID"];
	$FirstName = $_POST["FirstName"];
	$Time = $_POST["Time"];
	$Date = $_POST["Date"];
	$Room = $_POST["Room"];
	
	
	$sql = "INSERT INTO gbooking (FirstName, Time, Date, Room, guestID) VALUES ('$FirstName', '$Time', '$Date', '$Room', '$guestID')";
	mysqli_query($db, $sql);
	mysqli_query($db, "DELETE FROM receipt WHERE guestID = $guestID");
	echo "<script> 
	document.location.href = 'guestbooking.php?guestID=$guestID';
 </script>";
}
 
function query($query)
    {
        global $db;

        $result  = mysqli_query($db,$query);

        $rows = [];

        while ($row = mysqli_fetch_assoc($result))
        {
            $rows[] = $row;
        }

        return $rows;
    }
	
$receipts=query("SELECT * FROM receipt");
?>

<html>
<head>
<title>Receipt</title>
</head>
<style>
body{
	background-color: #99CCFF;
	margin: 84px;
	color: black;	
	font-family: "Gill Sans", sans-serif;
	font-weight: bold;
}
.receipt
{
	margin: auto;
	max-width:650px;
	background-color: white;
	padding:30px;
	box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
}
.table{
	font-weight: bold;
}
.printbtn{
	margin-left:800px;
	text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
	justify-content: center;
	background-color: #E1BEE7;
	color: white;
	border-color: white;
	cursor: pointer;
	padding: 10px;
	opacity:0.8;
	border-radius: 15px;
}
.clearbtn{
	text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
	background-color: #E1BEE7;
	color: white;
	border-color: white;
	cursor: pointer;
	padding: 10px;
	opacity:0.8;
	border-radius: 15px;
}
.printbtn:hover
{
	opacity:0.6;
}
.clearbtn:hover
{
	opacity:0.6;
}
</style>
<body>

<div class="receipt">
<h3>FCSIT MEETING ROOM BOOKING</h3>
<form action="" method="post">
<table class="table">
<?php foreach($receipts as $receipt): 
?>
<?php if($_GET["guestID"] == $receipt["guestID"]){ ?>
<input type="hidden" name="guestID" value="<?= $_GET["guestID"]; ?>">
<input type="hidden" name="FirstName" value="<?= $receipt["FirstName"]; ?>">
<input type="hidden" name="Time" value="<?= $receipt["Time"]; ?>">
<input type="hidden" name="Date" value="<?= $receipt["Date"]; ?>">
<input type="hidden" name="Room" value="<?= $receipt["Room"]; ?>">
<tr>
<td> First Name: </td>
<td><?php echo $receipt["FirstName"];?></td>
</tr>
<tr>
<td> Time: </td>
<td><?php echo $receipt["Time"];?></td>
</tr>
</table>
<br><br>
<table class="table">
<tr>
<td> Date: </td>
<td><?php echo $receipt["Date"];?></td>
</tr>
<tr>
<td> Room Type: </td>
<td><?php echo $receipt["Room"];?></td>
</tr>
<?php } ?>
<?php endforeach; ?>
</table>
<br><br><br><br><br>
<p>PAYMENT METHOD:</p>
<p>Credit Card / Paypal</p><br>
<p>TOTAL:</p>
<p>RM5</p><br><br><br><br>
<p>Thank you for purchasing!</p>
</div>
<input type="button" name="Print" value="Print Receipt" id="Print" class="printbtn" onclick="window.location.href='receiptprint.php?guestID=<?= $_GET["guestID"]; ?>';"><input name="home" type="submit" value="Home" class="clearbtn">
</form>
</body>
</html>