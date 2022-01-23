<?php
include_once 'adminconnection.php';
if(count($_POST)>0) {
mysqli_query($db,"UPDATE admin_user set  firstname='" . $_POST['firstname'] . "', lastname='" . $_POST['lastname'] . "', icnumber='" . $_POST['icnumber'] . "' ,email='" . $_POST['email'] . "',phonenumber='". $_POST['phonenumber']."',inpassword='". $_POST['inpassword']."',confpassword='".$_POST['confpassword']."' WHERE username='" . $_POST['username'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($db,"SELECT * FROM admin_user WHERE username='" . $_GET['username'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update User Data</title>
</head>
<body>
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
<a href="admin-retrieve-user.php">User List</a>
</div>
Username: <br>
<input type="hidden" name="username" class="text" value="<?php echo $row['username']; ?>">
<input type="text" name="username"  value="<?php echo $row['username']; ?>">
<br>
First Name: <br>
<input type="text" name="firstname" class="text" value="<?php echo $row['firstname']; ?>">
<br>
Last Name :<br>
<input type="text" name="lastname" class="text" value="<?php echo $row['lastname']; ?>">
<br>
IC No:<br>
<input type="text" name="icnumber" class="text" value="<?php echo $row['icnumber']; ?>">
<br>
Email:<br>
<input type="text" name="email" class="text" value="<?php echo $row['email']; ?>">
<br>
<br>
Phone No:<br>
<input type="text" name="phonenumber" class="text" value="<?php echo $row['phonenumber']; ?>">
<br>
<br>
Password:<br>
<input type="text" name="inpassword" class="text" value="<?php echo $row['inpassword']; ?>">
<br>
<br>
Confirm Password:<br>
<input type="text" name="confpassword" class="text" value="<?php echo $row['confpassword']; ?>">
<br>
<input type="submit" name="submit" value="Submit" class="button">

</form>
</body>
</html>