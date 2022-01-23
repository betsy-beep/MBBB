
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Admin - Manage Transactions Record
        </title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/admin_transactions.css">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Autour One">
        <script src="anime.min.js"></script>
        <script src="admin_transactions.js"></script>
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
	
        <div id="bg"><div id="bg-overlay"></div></div>
        <div id="content">
            <div id="create-transaction-modal-bg">
                <div id="create-transaction-modal">
                    <button id="create-transaction-modal-button">Okay</button>
                </div>
            </div>
            <div id="view-transaction-modal-bg">
                <div id="view-transaction-modal">
                    <button id="view-transaction-modal-button">Continue</button>
                </div>
            </div>
            <div id="delete-transaction-modal-bg">
                <div id="delete-transaction-modal">
                    <table id="delete-transaction-table">

                    </table>
                    <div class="field-column" id="delete-modal-buttons">
                        <button id="delete-transaction-modal-button">Confirm Delete</button>
                        <button id="not-delete-transaction-modal-button">Cancel</button>
                    </div>
                    <button id="not-found-delete-button">Okay</button>
                </div>
            </div>
            <div id="admin-page-header">
                <h1>Admin (Manage Transaction Record)</h1>
            </div>
            <div id="admin-action">
                <div class="action" onClick="location.href = 'Admin.php'">
                    <p><b>Back</b></p>
                </div>
                <div class="action" id="create-transactions" onClick="selectThisForm(this, getElementById('form-create-transactions'))">
                    <p><b>Create Transactions</b></p>
                </div>
                <div class="action" id="view-transactions" onClick="selectThisForm(this, getElementById('form-view-transactions'))">
                    <p><b>View Transaction Record</b></p>
                </div>
                <div class="action" id="delete-transactions" onClick="selectThisForm(this, getElementById('form-delete-transactions'))">
                    <p><b>Delete Transaction</b></p>
                </div>
                <div class="action" id="update-transactions" onClick="selectThisForm(this, getElementById('form-update-transactions'))">
                    <p><b>Update Transaction Record</b></p>
                </div>
            </div>
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
                                <option value="">Booking time...</option>
							
                                <option value="07:00">8.00am-11.00am</option>
                                <option value="08:00">11.00am-2.00pm</option>
                                <option value="09:00">2.00pm-5.00pm</option>
                                <option value="10:00">7.00pm-10pm</option>
								
                            </select>
                        </div>
						
                        <div class="field-column">
                            <button id='create-transaction-button'>Create Transaction</button>
                            <button type="button" style="margin-top: 20px;" onClick="removeAllRows('ordered-time-table','ordered-time-table','transaction-desc','create-transaction-hour')">Clear Form</button>
                        </div>
                    </form>
                </div>
                <div id="form-view-transactions">
                    <p><b>View Transaction</b></p>
                    <form autocomplete="off" onSubmit="return viewTransactions('view-transaction-id','view-transaction-modal','view-transaction-modal-bg')">
                        <div class="field-row">
                            <img src="image/process.png" width="8%" height="auto">
                            <input placeholder="Transaction ID" type="number" name="transaction-id" id="view-transaction-id" required>
                        </div>
                        <div class="field-column">
                            <button>View Transaction</button>
                            <button type="reset" style="margin-top: 20px;">Clear Form</button>
                        </div>
                    </form>
                </div>
                <div id="form-delete-transactions">
                    <p><b>Delete Transaction</b></p>
                    <form autocomplete="off" onSubmit="return viewTransactions('delete-transaction-id','delete-transaction-modal','delete-transaction-modal-bg')">
                        <div class="field-row">
                            <img src="image/process.png" width="8%" height="auto">
                            <input placeholder="Transaction ID" type="number" name="transaction-id" id="delete-transaction-id" required>
                        </div>
                        <div class="field-column">
                            <button>Delete Transaction</button>
                            <button type="reset" style="margin-top: 20px;">Clear Form</button>
                        </div>
                    </form>
                </div>
                <div id="form-update-transactions">
                    <p><b>Update Transaction</b></p>
                    <form autocomplete="off" onSubmit="return retrieveInfo()" id="search-update-transaction">
                        <div class="field-row">
                            <img src="image/process.png" width="8%" height="auto">
                            <input placeholder="Transaction ID" type="number" name="transaction-id" id="search-update-transaction-id" required>
                        </div>
                        <div class="field-column">
                            <button>Update Item</button>
                            <button type="reset" style="margin-top: 20px;">Clear Form</button>
                        </div>
                    </form>
                    <form autocomplete="off" onSubmit="return updateTransactions()" method="post" id="update-form">
                        <div class="field-row">
                            <img src="image/online-meeting.png" width="8%" height="auto">
                            <input value="1234" placeholder="Booking ID" type="number" name="booking-id" id="update-transaction-bookingid" disabled>
                        </div>
                        <div class="field-row">
                            <img src="image/schedule.png" width="8%" height="auto">
                            <input value="2021-01-02" placeholder="Booking date" type="date" name="booking-date" id="update-transaction-date" disabled>
                        </div>
						<div class="field-row">
                            <img src="image/clock.png" width="8%" height="auto">
                            <select id="update-transaction-time">
                                <option value="">Booking time...</option>
                                <option value="07:00">8.00am-11.00am</option>
                                <option value="08:00">11.00am-2.00pm</option>
                                <option value="09:00">2.00pm-5.00pm</option>
                                <option value="10:00">7.00pm-10pm</option>
								
                            </select>
                        </div>
						
                        
                        <div class="field-column">
                            <button>Update Transaction</button>
                            <button type="button" style="margin-top: 20px;" id="cancel-update">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
		</div>
		</div>
		<footer><center>&copy; Developed By Betsy Pati, Nur Baqiyah, Siti Hamizah and Nur Batrisyia</center></footer></div>
    </body>
</html>