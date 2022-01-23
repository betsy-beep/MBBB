<?php
//session_start();
if(!isset($_SESSION['matricNo'])){
	header('Location:index.html');
	die();
}
?>