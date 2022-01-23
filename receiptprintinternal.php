<?php session_start (); 
?>
<?php include "do-session.php"; 
$matricNo = $_SESSION["matricNo"];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="css/bookingreceipt.css">
     <title>booking receipt</title>
     
</head>
<body>
<?php 
include "dbconnection.php";

$id = $_REQUEST["id"];

$query = "select internaluser.firstname, internaluser.lastname, internaluser.phoneNo, internaluser.matricNo, booking.bookID, booking.matricNo, booking.room, booking.time, booking.date, booking.roomCapacity from internaluser, booking where internaluser.matricNo = '$matricNo' and booking.bookID = '$id'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

if(isset($_POST['Dashboard'])){ 
            
echo "<script>window.location='home.php'</script>";
}


?>
   <div class="box">
    <br><br>
    <center> <img class="logo" src="image/loounimas.png"></center>
    <p class="sign"  align="center">Your Receipt</p>
    <table style="margin: auto;" style="width:50%">
  <tr>
    <th>Firstname:</th>
    <td><?php echo $row["firstname"]; ?></td>
  </tr>
  <tr>
    <th>Lastname:</th>
    <td><?php echo $row["lastname"]; ?></td>
  </tr>
  <tr>
    <th>Telephone:</th>
    <td><?php echo $row["phoneNo"]; ?></td>
  </tr>
  <tr>
    <th>matricNo:</th>
    <td><?php echo $row["matricNo"]; ?></td>
  </tr>
  <tr>
    <th>Date:</th>
    <td><?php echo $row["date"]; ?></td>
  </tr>
   <tr>
    <th>Room:</th>
    <td><?php echo $row["room"]; ?></td>
  </tr>
  <tr>
    <th>Time:</th>
    <td><?php echo $row["time"]; ?></td>
  </tr>
   <tr>
    <th>Room Capacity:</th>
    <td><?php echo $row["roomCapacity"]; ?></td>
  </tr>
</table><br><br><br>
   </div>

<center><center><input class="input" type="submit" name="receipt" value="Print" onClick="window.print();">&nbsp;<label class="a"  ><a href="home.php">Home</a></label>
   <br><br><br>
 
</body>
</html>