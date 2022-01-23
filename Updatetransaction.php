
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Admin - Manage Transactions Record
        </title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/transactions.css">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Autour One">
        <!--<script src="anime.min.js"></script>-->
        <script src="transactions.js"></script>
    </head>
    <body>
	
	<div class="header">
	 <h1><center>Admin(Manage Transaction)</center></h1>
	 </div>
	<?php
			$bookingid = $transactiondate = $transactiontime = "";
			$bookingidErr = $transactiondateErr = $transactiontimeErr ="";
			
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
			 if (empty($_POST["bookingid"])) 
				{
					$bookingidErr = "Booking ID is required";
				} 
			 else
			     { 
			         $bookingid = test_input($_POST["bookingid"]);
				 }
			if (empty($_POST["transactiondate"])) 
				{
					$transactiondateErr = "Transaction date is required";
				} 
			 else
			     { 
			         $transactiondate = test_input($_POST["Transactiondate"]);
				 }
			if (empty($_POST["transactiontime"])) 
				{
					$transactiontimeErr = "Transaction time is required";
				} 
			 else
			     { 
			         $transactiontime = test_input($_POST["transactiontime"]);
				 }
			
				if ($bookingid !="")
				{
					include "admin_update_transactions.php";
				}
			}
				function test_input($data) 
			{
				  $data = trim($data);
				  $data = stripslashes($data);
				  $data = htmlspecialchars($data);
				  return $data;
			} 
	 ?>
	<div id="admin-action">
                <div class="action" onClick="location.href = 'Admin.php'">
                    <p><b>Back</b></p>
                </div>
                <div class="action" id="create-transactions" onClick="location.href = 'Createtransaction.php' ">
                    <p><b>Create Transactions</b></p>
                </div>
                <div class="action" id="view-transactions" onClick="location.href = 'Viewtransaction.php' ">
                    <p><b>View Transaction Record</b></p>
                </div>
                <div class="action" id="delete-transactions" onClick="location.href = 'Deletetransaction.php' ">
                    <p><b>Delete Transaction</b></p>
                </div>
                <div class="action" id="update-transactions" onClick="location.href = 'Updatetransaction.php' ">
                    <p><b>Update Transaction Record</b></p>
                </div>
            </div>
			<center>
			<div id="forms">
			<div id="form-update-transactions">
			<p><b>Update Transaction</b></p>
			<form autocomplete="off" onSubmit="return registerTransactions()" method="post" id="update-transactions-form">
                        
						<?php
	include "admin_update_transactions.php";
	
	?>
						</center>
                    </form>
					</div>
                </div>
				<footer><center>&copy; Developed By Betsy Pati, Nur Baqiyah, Siti Hamizah and Nurain Batrisyia</center></footer></div>
				</body>
				</html>