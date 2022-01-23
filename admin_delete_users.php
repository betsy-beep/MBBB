<?php
include 'adminconnection.php';
$result = mysqli_query($db,"SELECT * FROM admin_user WHERE username ='Afiffa'");
?>
<!DOCTYPE html>
<html>
<head>
 <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" type="text/css" href="css/admin_users.css">
	<title>Delete User</title>
	</head>
	<body>
	
<table>
<tr>
	<td>Username:</td>
	<td>First Name:</td>  
	<td>Last Name:</td>
	<td>IC No:</td>
	<td>Email:</td>
	<td>Phone No:</td>
	<td>Password:</td>
	<td>Confirm Password:</td>
	</tr>
	<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
    <td><?php echo $row["username"]; ?></td>
    <td><?php echo $row["firstname"]; ?></td>
    <td><?php echo $row["lastname"]; ?></td>
	<td><?php echo $row["icnumber"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
	<td><?php echo $row["phonenumber"]; ?></td>
	<td><?php echo $row["inpassword"]; ?></td>
	<td><?php echo $row["confpassword"]; ?></td>
	<td><a href="deleteuser.php?username=<?php echo $row["username"]; ?>">Delete</a></td>
</tr>
<?php
$i++;
}
?>
</table>
<input type="button" value="Continue" onclick="window.location.href='ManageUser.php'" />
</body>
</html>

