<?php

$conn ="";

try{
	$servername = "sql211.epizy.com";
	$dbname = "epiz_28929474_loginpage";
	$username = "epiz_28929474";
	$password = "eWyh9BwPIM";
	
	$conn = new PDO(
	"mysql:host=$servername; dbname=epiz_28929474_loginpage",
	$username,$password
	);
	
	$conn->setAttribute(PDO::ATTR_ERRMODE,
						PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo "Connection failed:" . $e->getMessage();
		}
		
		?>