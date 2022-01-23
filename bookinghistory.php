<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Autour One' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="css/bookinghistory.css">
     <title>Booking History</title>

  <?php 
include "dbconnection.php";

$query = "select internaluser.userID, internaluser.matricNo, booking.bookID, internaluser.matricNo, booking.room, booking.time, booking.roomCapacity, booking.date from internaluser, booking where internaluser.matricNo = booking.matricNo";
$result = mysqli_query($db, $query);
$count = mysqli_num_rows($result);

?>
</head>



<body>

<div class="header">
  <a href="home.php" class="logo">RoomNow</a>

  <div class="header-right">
    <a class="active" href="home.php">Dashboard</a>
    <a href="index.html">Logout</a>
  </div>
</div>

  <main>
  <section class="glass">
  <div class="box">
    <p class="sign" align="center"> Our Room Booking History</p>
    <table>
      <tr>
        <td>userID</td>
        <td>matricNo</td>
        <td>room</td>
        <td>time</td>
        <td>capacity</td>
        <td>date</td>
      </tr>
      <?php while($row=mysqli_fetch_array($result)){ ?>
          <?php $count; ?>
        <tr>
          <td><?php echo $row["userID"]; ?></td>
            <td><?php echo $row["matricNo"]; ?></td>
            <td><?php echo $row["room"]; ?></td>
            <td><?php echo $row["time"]; ?></td>
            <td><?php echo $row["roomCapacity"]; ?></td>
            <td><?php echo $row["date"]; ?></td>
        </tr>
        <?php $count++; } ?>
  </table>
    </table>
        </div>
              

   </section> 
   </main>
    <footer><center>&copy; Developed By Betsy Pati, Nur Baqiyah, Siti Hamizah and Nurain Batrisyia</center></footer></div>
<br>
</body>
</html>
