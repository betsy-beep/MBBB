<?php require "dbconnect.php"; 


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
	
	
$guestID=$_GET["guestID"];
$guests=query( "SELECT * FROM guestregister WHERE guestID=$guestID");?>
<html>

<head>

     <title> Guest Booking </title>
	  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	  <script>
	  function validateGuest() {
	var fname = document.getElementById("fname");
	var nmcheck = /^[A-Z]/;
	var time = document.getElementById("time");
	var date = document.getElementById("Date");
	var biliksantubong = document.getElementById("biliksantubong");
	var biliksejinjang = document.getElementById("biliksejinjang");
	var bilikserapi= document.getElementById("bilikserapi");
	var bilikrentap = document.getElementById("bilikrentap");
	
	if (document.myform.fname.value=="") {
		alert("Please enter your first name");
		fname.focus();
		return false;
	}
	else if (!nmcheck.test(fname.value)) {
		alert("First character of first name must be uppercase");
		fname.focus();
		return false;
	}
	else if (document.myform.time.value=="") {
		alert("Please select time for room booking");
		time.focus();
		return false;
	}
	else if (document.myform.date.value=="") {
		alert("Please select date for room booking");
		time.focus();
		return false;
	}
	else if (biliksantubong.checked==false && biliksejinjang.checked==false && bilikserapi.checked==false && bilikrentap.checked==false)
	{
		alert("You must select room type");
		return false;
	}

	 }
		  </script>
	 <link href='https://fonts.googleapis.com/css?family=Autour One' rel='stylesheet' >
	 <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
</head>

<style>
	
body{
	margin: 0;
	background-color: #99CCFF;
	font-family: 'Autour One';
	color: #8C55AA;
	text-align: center;
    } 
	
.header {
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

.header a.logo {
  font-size: 25px;
  font-weight: bold;
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
input[type=radio]
{
	width:40px;
	cursor:pointer;
}

input[type=date]
{
	width: 200px;
	cursor: pointer;
}

.guestLogin{
    margin-top: 30%;
	margin: auto;
	max-width:650px;
	background-color: #f1f1f1;
	text-align: center;
	border-radius: 20px;
	padding: 10px;
	box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
    }
	.loginbtn
{
	text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
	justify-content: center;
	background-color: #E1BEE7;
	color: white;
	border-color: white;
	cursor: pointer;
	padding: 5px;
	opacity:0.8;
	border-radius: 10px;
}
input[type=text] , input[type=email] , input[type=tel]
{
	width: 200px;
	border-radius: 20px;
}
select
{
	width: 200px;
	cursor: pointer;
}

.room{
	margin-left: 50px;
	margin-top: 10px;
	text-align: center;
}
.clearbtn
{
	text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
	justify-content: center;
	background-color: #E1BEE7;
	color: white;
	border-color: white;
	cursor: pointer;
	padding: 5px;
	opacity:0.8;
	border-radius: 10px;
}

.loginbtn:hover
{
	opacity:0.6;
}

.clearbtn:hover
{
	opacity:0.6;
}

footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
}


@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }

	</style>
<body>

<?php
//define variables and set empty values
$FirstName = $Time = $Date = $Room = "";
$FirstNameErr = $TimeErr = $DateErr = $RoomErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["Time"])) {
        $TimeErr = "Please select time for room booking";
     } else {
        $Time = test_input($_POST["Time"]);
	 }
	 
	 if (empty($_POST["Date"])) {
        $TimeErr = "Please select date for room booking";
     } else {
        $Time = test_input($_POST["Date"]);
	 }
	 
	 if (empty($_POST["Room"])) {
        $RoomErr = "You must select room type";
     } else {
        $Room = test_input($_POST["Room"]);
	 }
	 function test_input($data) 
			{
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}
}
?>
<form name="myform" id="myform" onSubmit="return validateGuest()" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 <?php foreach ($guests as $guest) : ?>
<div class="header">
  <a href="" class="logo">Room Now</a>

  <div class="header-right">
    <a class="active" href="cart.php?guestID=<?php echo $guest['guestID']; ?>"><i class='fas fa-shopping-cart'></i></a>
	<a href="index.html" onclick="return confirm('Confirm Logout?')">Logout</a></div>
</div> <br><br><br>
<div class="guestLogin">
     <center><h1 class="login"><span class="fi-rr-user"></span> GUEST BOOKING </h1>
	 <br>
	 <table>
	  <tr>
		 <td> First Name </td>
		 <td> 
		 <?php echo $guest["FirstName"];?>
		 <input type="hidden" name="FirstName" value="<?= $guest["FirstName"]; ?>" id="fname" required>
		 <span class="error"><?php echo $FirstNameErr;?></span>
	     </td>
		 <input type="hidden" name="guestID" value="<?= $guest["guestID"]; ?>">
	 </tr>
	  <tr>
	     <td class="time"> Time & Date </td>
		 <td>
		 <select name="Time" id="time" required>
            <option value="" selected>-Select-</option>
            <option value="8am-11am">8.00am-11.00am</option>
            <option value="11am-2pm">11.00am-2.00pm</option>
            <option value="2pm-5pm">2.00pm-5.00pm</option>
            <option value="7pm-10pm">7.00pm-10pm</option>
         </select>
		 <span class="error"><?php echo $TimeErr;?></span> 
		 </td>
		 <td><input type="date" name="Date" id="Date" required>
		 <span class="error"><?php echo $DateErr;?></span></td>
	 </tr>
	 </table>
	 <table class="room">
	 <tr>
	     <td><div>Room Type</div></td>
		 <td>
		     <input type="radio" name="Room" value="Bilik Santubong" id="biliksantubong" required>Bilik Santubong<br><img src="meetingroom3.png" alt="Mountains" style="width:40%">
			 <br><input type="radio" name="Room" value="Bilik Sejinjang" id="biliksejinjang">Bilik Sejinjang<br><img src="meetingromm2.jpg" alt="Lights" style="width:40%"></td>
			 <td><input type="radio" name="Room" value="Bilik Serapi" id="bilikserapi">Bilik Serapi<br><img src="meetingroom4.jpg" alt="Nature" style="width:40%">
			 <br><input type="radio" name="Room" value="Bilik Rentap" id="bilikrentap">Bilik Rentap<br><img src="meetingroom5.jpg" alt="Mountains" style="width:40%">
			 <span class="error"><?php echo $RoomErr;?></span></td>
			 </tr>
	 </table>
	 <center> <i><b>Price : RM5/3hour</i></center><br>
	 <table>
	     <tr>
		     <td><input type="submit" name="Cart" value="Add to cart" id="login" class="loginbtn"> <input type="reset" value="Clear" class="clearbtn" onclick="window.location.href='guestbooking.php?guestID=<?= $_GET["guestID"]; ?>';"> </td>
		 </tr>
	 </table>
	 </center>
	 <?php endforeach; ?>
	 </form></div>
	 <footer>Copyrighted &copy;2021 Developed By Betsy Pati, Nur Baqiyah, Siti Hamizah and Nurain Batrisyia</footer>
</body>
</html>