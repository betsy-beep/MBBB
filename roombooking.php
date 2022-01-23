<?php session_start (); 
?>
<?php include "do-session.php"; 
$matricNo = $_SESSION["matricNo"];
?>
<!DOCTYPE html>
<html>
<head>
<title>Booking</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Autour One' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
	<script type="text/javascript" src="js/roombooking.js"></script>
	<link rel="stylesheet" href="css/roombooking.css">
</head>
<body>  
<?php 
include "dbconnection.php";

$query = "select * from internaluser where matricNo = '$matricNo'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
?>
<div class="header">
	<a href="home.php" class="logo">RoomNow</a>
	<div class="header-right">
		<a class="active" href="home.php">Dashboard</a>
		<a href="index.html">Logout</a>
	</div>
</div>
<main>
	<section class="glass"> <!-----glass for the form background----> 
		<form name="myform" id="myform"  style="max-width:500px; margin:auto;" onSubmit="return validateBooking()" method="POST" autocomplete="on" action="booking-process.php?matricNo=<?php echo $matricNo; ?>">
			<h2><span class="fi-rr-user"></span>Booking Form</h2>
			<!-------------------------------------------------firstname--lastname---------------------------------------->
			<div class="input-container">
				<i class="fi-rr-portrait"></i>
				<input class="input-field" type="text" id="fname" value="<?php echo $row["firstname"]; ?>" disabled>
			</div>
			<div class="input-container">
				<i class="fi-rr-portrait"></i>
				<input class="input-field" type="text" id="lname" value="<?php echo $row["lastname"]; ?>" disabled>
			</div>
			<!-------------------------------------------matric No--------------------------------------->
			<div class="input-container">
				<i class="fi-rr-credit-card"></i>
				<input type="text" name="matricNo" id="matricNo" value="<?php echo $row["matricNo"]; ?>" disabled>
			</div>
			<!----------------------------------------------date----------------------------------------------------->
			<div class="date" method="POST">
				<div class="input-container">
					<i class="fi-rr-credit-card"></i>
					<input type="date" name="date" id="date" placeholder="date">
				</div>
			</div>
			<!--------------------------------------------------room---------------------------------------------------->
			<div class="dropdown" method="POST">
				<label>Room  :</label>
				<select name="room" id="room">
					<option value="-1" selected>-Select-</option>
					<option value="Bilik Santubong">Bilik Santubong</option>
					<option value="Bilik Sejinjang">Bilik Sejinjang</option>
					<option value="Bilik Serapi">Bilik Serapi</option>
					<option value="Bilik Rentap">Bilik Rentap</option>
				</select>
			</div><br>
			<!-----------------------------------------------time----------------------------------------------------->
			<div class="dropdown" method="POST">
				<label> TIME        :</label>
				<select name="time" id="time">
					<option value="-1" selected>-Select-</option>
					<option value="8am-11am">8.00am-11.00am</option>
					<option value="11am-2pm">11.00am-2.00pm</option>
					<option value="2pm-5pm">2.00pm-5.00pm</option>
					<option value="7pm-10pm">7.00pm-10.00pm</option>
				</select>
			</div><br>
			<!----------------------------------------------capacity---------------------------------------------------->
			<div class="dropdown" method="POST">
				<label>room capacity :</label>
				<select name="capacity" id="capacity">
					<option value="-1" selected>-Select-</option>
					<option value="max 10">max 10</option>
					<option value="max 20">max 20</option>
					<option value="max 30">max 30</option>
					<option value="max 40">max 40</option>
					<option value="max 50">max 50</option>
				</select>
			</div><br>
			<!------------------------------------------------button:register & clear----------------------------------------------------->
			<button type="submit" class="bookingButton" name="bookingButton">save</button>
			<button type="reset" class="clearButton" name="clearButton">Clear</button>
		</form>
	</section>
</main>
<footer>Copyrighted &copy;2021 Developed By Betsy Pati, Nur Baqiyah, Siti Hamizah and Nurain Batrisyia</footer></div>
<br>
</body>
</html>