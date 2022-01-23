<?php
$db=mysqli_connect(""sql211.epizy.com", "epiz_28929474", "eWyh9BwPIM", "epiz_28929474_admin"") or die ("The MYSQL server is OFF <br>");

if(isset($_POST['search-update-user'])){
$username = $_POST["username"];

mysqli_query($db, "UPDATE FROM admin_user SET username=$username, firstname=$firstname, lastname=$lastname, icnumber=$icnumber, email=$email, phonenumber=$phonenumber, inpassword=$inpassword, confpassword=$confpassword  WHERE username= $username");
}