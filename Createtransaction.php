
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
					$transactiondateErr = "transaction date is required";
				} 
			 else
			     { 
			         $transactiondate = test_input($_POST["transactiondate"]);
				 }
			if (empty($_POST["transactiontime"])) 
				{
					$transactiontimeErr = "transaction time is required";
				} 
			 else
			     { 
			         $transactiontime = test_input($_POST["transactiontime"]);
				 }
			
				if ($bookingid !="")
				{
					include "admin_create_transactions.php";
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
	 <div class="header">
	 <h1><center>Admin(Manage Transaction)</center></h1>
 
</div>
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
                <div id="form-create-transactions">
                    <p><b>Create Transaction</b></p>
                    <form autocomplete="off" onSubmit="return registerTransactions()" method="post" id="create-transactions-form">
                        <div class="field-row">
                            <img src="image/online-meeting.png" width="8%" height="auto">
                            <input placeholder="Booking ID" type="number" name="bookingid" id="bookingid" required>
                        </div>  
                        <div class="field-row">
                            <img src="image/schedule.png" width="8%" height="auto">
                            <input placeholder="Booking date" type="date" name="transactiondate" id="transactiondate" required>
                        </div>
						<div class="field-row">
                            <img src="image/clock.png" width="8%" height="auto">
                            <select id="transactiontime" name="transactiontime">
                                <option value="">Transaction time...</option>
							
                                <option value="8.00am-11.00am">8.00am-11.00am</option>
                                <option value="11.00am-2.00pm">11.00am-2.00pm</option>
                                <option value="2.00pm-5.00pm">2.00pm-5.00pm</option>
                                <option value="7.00pm-10pm">7.00pm-10pm</option>
								
                            </select>
                        </div>
						
                        <div class="field-column">
                            <td><input type = "submit" name="submit" value="Create Transaction" id="create" class="createbtn"></td>
							</br>
                            <td><input type="reset" value="Clear Form" class="clearbtn" onclick="window.location.href='Createtransaction.php';"></td>
                        </div>
						</center>
                    </form>
                </div>
				<footer><center>&copy; Developed By Betsy Pati, Nur Baqiyah, Siti Hamizah and Nurain Batrisyia</center></footer></div>
				</body>
				</html>