<?php
//1. Connection to database
$con=mysqli_connect("sql211.epizy.com","epiz_28929474","eWyh9BwPIM","epiz_28929474_mbbb");

//2. Username and katalaluan sent login form (2-frmlogin.php)
$username = $_POST["matricNo"];
$password = $_POST["psw"];

//3. To protect MYSQ: injection
$username=stripslashes ($username);
$password=stripslashes ($password);

//4. SQL query
$query = "SELECT * FROM internaluser WHERE matricNo = '$username' and password='$password'";
$result=mysqli_query($con,$query);
$data = mysqli_fetch_array($result);

//5. Count record
//$count=mysql_num_rows($result);

if ($password == $data['password'])
{
    // menyimpan username dan level ke dalam session
	 session_start ();
  	 $_SESSION['matricNo'] = $data['matricNo'];
	echo "<script>window.location='home.php'</script>";
}
else
{
	include "wrongid.php";
}
?>