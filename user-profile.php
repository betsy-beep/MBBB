<?php session_start (); 
?>
<?php include "do-session.php"; 
$matricNo = $_SESSION["matricNo"];
?>

<!DOCTYPE html>
<html>
<head>
<title>Profile</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Autour One' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>

<?php 
include "dbconnection.php";

$query = "select * from internaluser where matricNo='$matricNo'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);


$fname = $row["firstname"];
$lname = $row["lastname"];
$name = $fname . ' ' . $lname;
$matricNo = $row["matricNo"];
$email = $row["email"];
$psw = $row["password"];
$phoneNo = $row["phoneNo"];
?>

<div class="header">
  <a href="home.php" class="logo">RoomNow</a>
  <div class="header-right">
    <a class="active" href="home.php">Dashboard</a>
    <a href="index.html">Logout</a>
  </div>
</div>
<div class="input-container">
           <td width="556"><table width="775" height="248" align="center" >
    <tr>
                     <td width="152" height="32">Name</td>
                     <td width="18">:</td>
                     <td><?php echo $name; ?></td>
                   </tr>
                   <tr>
                     <td height="33">Matric Number</td>
                     <td>:</td>
                     <td><?php echo $row["matricNo"]; ?></td>
                   </tr>
                   <tr>
                     <td height="33">Email</td>
                     <td>:</td>
           <td><?php echo $row["email"]; ?></td>
                     <td><button class="button"><?php echo "<a href=\"javascript:window.open('editemail.php?matricNo=$matricNo', 'Edit Email', 'width=700, height=570, top=50, left=375');\">Edit Email</a>";?></button></td>
                     </td>
                   </tr>
                   <tr>
                     <td height="32">Password</td>
           <td>:</td>
           <td><input type="password" value="<?php echo $row["password"]; ?>" disabled></td>
                     <td><button class="button"><?php echo "<a href=\"javascript:window.open('editpassword.php?matricNo=$matricNo', 'Edit Password', 'width=700, height=570, top=50, left=375');\">Edit Password</a>";?></button></td>
                   </tr>
                
                   <tr>
                     <td height="34">Phone Number</td>
                     <td>:</td>
           <td><?php echo $row["phoneNo"]; ?></td>
                     <td><button class="button"><?php echo "<a href=\"javascript:window.open('editphonenumber.php?matricNo=$matricNo', 'Edit Phone Number', 'width=700, height=570, top=50, left=375');\">Edit Phone Number</a>";?></button></td>
                   </tr>
                  </table>
 
  </tr>
  </div>
<footer><center>&copy; Developed By Betsy Pati, Nur Baqiyah, Siti Hamizah and Nurain Batrisyia</center></footer></div>
<br>
</body>
</html>