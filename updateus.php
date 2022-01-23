<?php
include 'adminconnection';
if(count($_POST)>0){
mysqli_query($db,"UPDATE admin_user set username='" . $_POST['username']."',firstname='" .$_POST['firstname']."', lastname='" .$_POST['lastname']."',icnumber='" .$_POST['icnumber']."',email='" .$_POST['email'] . "',phonenumber='" . $_POST['phonenumber']."', inpassword='" . $_POST['inpassword']."',confpassword='" . $_POST['confpassword']."' WHERE username='" . $_POST['username']."'");
$message = "Record Updated Successfully";
}
$result = mysqli_query($db,"SELECT * FROM admin_user WHERE username='" .$_GET['username']."'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
 <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" type="text/css" href="css/admin_users.css">
	<title>Update User</title>
	</head>
	<body>
	<form name="updateuser" method="post" action="">
	<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
<a href="ManageUser.php">Back to main page</a>
</div>
        <div class="field-row">
        <img src="image/user.png" width="8%" height="auto">
        <input type="hidden" name="username" class="txtField" value="<?php echo $row['username']; ?>">
		<input type="text" name="username"  value="<?php echo $row['username']; ?>">
        </div>
        <div class="field-row">
        <img src="image/user.png" width="8%" height="auto">
        <input type="text" name="firstname" class="txtField" value="<?php echo $row['firstname']; ?>">
        </div>
        <div class="field-row">
         <img src="image/id-card.png" width="8%" height="auto">
        <input type="text" name="lastname" class="txtField" value="<?php echo $row['lastname']; ?>">
        </div>
        <div class="field-row">
         <img src="image/id-card.png" width="8%" height="auto">
        <input type="number" name="icnumber" class="txtField" value="<?php echo $row['icnumber']; ?>">
        </div>
                        
        <div class="field-row">
        <img src="image/address.png" width="8%" height="auto">
        <input type="email" name="email" class="txtField" value="<?php echo $row['email']; ?>">
        </div>
                        
        <div class="field-row">
        <img src="image/telephone.png" width="8%" height="auto">
        <input type="number" name="phonenumber" class="txtField" value="<?php echo $row['phonenumber']; ?>">
        </div>
        <div class="field-row">
        <img src="image/password.png" width="8%" height="auto">
        <input type="password" name="inpassword" class="txtField" value="<?php echo $row['inpassword']; ?>">
        </div>
        <div class="field-row">
        <img src="image/password.png" width="8%" height="auto">
        <input type="password" name="confpassword" class="txtField" value="<?php echo $row['confpassword']; ?>">
        </div>
		
		<input type="submit" name="submit" value="Submit" class="button" onclick="location.href = 'ManageUser.php'">
		</form>
		</body>
		</html>