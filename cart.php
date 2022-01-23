<?php
$db=mysqli_connect("sql211.epizy.com", "epiz_28929474", "eWyh9BwPIM", "epiz_28929474_mbbb") or die ("The MYSQL server is OFF <br>");

if(isset($_POST['delete'])){
	//$FirstName = $_POST["FirstName"];
	$guestID = $_POST["guestID"];

		 
	mysqli_query($db, "DELETE FROM cart WHERE guestID = $guestID");
	 
}
	
if(isset($_POST['Checkout'])){
	$guestID = $_POST["guestID"];
	$FirstName = $_POST["FirstName"];
	$Time = $_POST["Time"];
	$Date = $_POST["Date"];
	$Room = $_POST["Room"];
	
	
	$sql = "INSERT INTO receipt (guestID, FirstName, Time, Date, Room) VALUES ('$guestID', '$FirstName','$Time', '$Date', '$Room')";
	mysqli_query($db, $sql);
	echo "<script> 
	document.location.href = 'payment.php?guestID=$guestID';
 </script>";}


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

$carts=query( "SELECT * FROM cart"); 
?>
<html>
<head>
<title>Cart</title>
<link href='https://fonts.googleapis.com/css?family=Autour One' rel='stylesheet' >
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<style>
body{
	background-color: #99CCFF;
	margin: 0px;
	text-align: center;
	font-family: 'Autour One';
	color: #8C55AA;	
}
.header{
	 overflow: hidden;
     background-color: #f1f1f1;
     padding: 20px 10px;
}
.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}
.header a:hover {
  background-color: #ddd;
  color: black;
}
.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
 float: right;
}
.cart{
	margin: auto;
	max-width:650px;
	background-color: #f1f1f1;
	text-align: center;
	border-radius: 20px;
	width:450px;
	padding:5px;
	box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
}

.chckoutbtn{
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
.clearbtn
{
	text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
	justify-content: center;
	background-color: #E1BEE7;
	color: white;
	border-color: white;
	cursor: pointer;
	padding: 10px;
	opacity:0.8;
	margin:10px;
	text-align: center;
	border-radius: 15px;
}
.deletebtn
{
	text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
	justify-content: center;
	background-color: #E1BEE7;
	color: white;
	border-color: white;
	cursor: pointer;
	padding: 10px;
	opacity:0.8;
	margin-bottom:5px;
	margin-right:2px;
	text-align: center;
	border-radius: 15px;
}

.chckoutbtn:hover
{
	opacity:0.6;
}
.clearbtn:hover
{
	opacity:0.6;
}
.deletebtn:hover
{
	opacity:0.6;
}
footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
}
</style>
<body>
<div class="header">
  <a onclick="window.location.href='guestbooking.php?guestID=<?= $_GET["guestID"]; ?>';" class="logo"><b>Room Now</b></a>
    <div class="header-right">
    <a class="active" onclick="window.location.href='cart.php?guestID=<?= $_GET["guestID"]; ?>';"><i class='fas fa-shopping-cart'></i></a>
	<a href="index.html" onclick="return confirm('Confirm Logout?')">Logout</a>
  </div></div>
<h1><span class='fas fa-shopping-cart'></span> Your Cart </h1>
<div class="cart">

<form action="" method="post">

<table>
<?php foreach($carts as $cart): 
?>
<?php if($_GET["guestID"] == $cart["guestID"]){ ?>
<input type="hidden" name="guestID" value="<?= $_GET["guestID"]; ?>">
<input type="hidden" name="FirstName" value="<?php echo $cart["FirstName"]; ?>">
<input type="hidden" name="Time" value="<?= $cart["Time"]; ?>">
<input type="hidden" name="Date" value="<?= $cart["Date"]; ?>">
<input type="hidden" name="Room" value="<?= $cart["Room"]; ?>">
<tr>
<td> First Name: </td>
<td><?php echo $cart["FirstName"];?></td>
</tr>
<tr>
<td> Time: </td>
<td><?php echo $cart["Time"];?></td>
</tr>
<tr>
<td> Date: </td>
<td><?php echo $cart["Date"];?></td>
</tr>
<tr>
<td> Room Type: </td>
<td><?php echo $cart["Room"];?></td>
</tr></table>
<table>
<tr>
<td><input type="submit" name="Checkout" value="Checkout" id="Checkout" class="chckoutbtn"></td>
<td><input type="button" name="clear" value="Back to Guest Booking" id="clear" class="clearbtn" onclick="window.location.href='guestbooking.php?guestID=<?= $_GET["guestID"]; ?>';"></td>
<td><input type="submit" name="delete" value="Delete Booking" id="delete" class="deletebtn" onclick="return confirm('Confirm Delete?')"></td> 	
</tr>
<?php } ?>
<?php endforeach; ?>
</table>
</form>
</div>
<footer><center>&copy; Developed By Betsy Pati, Nur Baqiyah, Siti Hamizah and Nurain Batrisyia</center></footer></div>
</body>