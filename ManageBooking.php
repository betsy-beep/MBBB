
<link rel="icon" type="image/ico" href="img/anclogo.ico" />
<!DOCTYPE html>
<html>
    <head>
        <title>
            Admin - Manage Booking
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/admin_booking.css">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Autour One">
        <script src="anime.min.js"></script>
        <script src="admin_booking.js"></script>
    </head>
    <body>
	
	<?php
			$username = $bookingtype = $bookingdate = $bookingtime = $bookingcapacity ="";
			$usernameErr = $bookingtypeErr = $bookingdateErr = $bookingtimeErr = $bookingcapacityErr ="";
			
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
			 if (empty($_POST["username"])) 
				{
					$usernameErr = "Username is required";
				} 
			 else
			     { 
			         $username = test_input($_POST["username"]);
				 }
				 
			if (empty($_POST["bookingtype"])) 
				{
					$bookingtypeErr = "Booking type is required";
				} 
			 else
			     { 
			         $bookingtype = test_input($_POST["bookingtype"]);
				 }
			if (empty($_POST["bookingdate"])) 
				{
					$bookingdateErr = "Booking date is required";
				} 
			 else
			     { 
			         $bookingdate = test_input($_POST["bookingdate"]);
				 }
			if (empty($_POST["bookingtime"])) 
				{
					$bookingtimeErr = "Booking time is required";
				} 
			 else
			     { 
			         $bookingtime = test_input($_POST["bookingtime"]);
				 }
			if (empty($_POST["bookingcapacity"])) 
				{
					$bookingcapacityErr = "Booking capacity is required";
				} 
			 else
			     { 
			         $bookingcapacity = test_input($_POST["bookingcapacity"]);
				 }
				 
				 if ($username != "" )
				 {
					include "AdminBooking.php";
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
            <div id="create-item-modal-bg">
                <div id="create-item-modal">
                    <button id="create-item-modal-button">Okay</button>
                </div>
            </div>
            <div id="view-item-modal-bg">
                <div id="view-item-modal">
                    <button id="view-item-modal-button">Continue</button>
                </div>
            </div>
            <div id="delete-item-modal-bg">
                <div id="delete-item-modal">
                    <div class="field-column" id="delete-modal-buttons">
                        <button id="delete-item-modal-button">Confirm Delete</button>
                        <button id="not-delete-item-modal-button">Cancel</button>
                    </div>
                    <button id="not-found-delete-button">Okay</button>
                </div>
            </div>
            <div id="admin-page-header">
                <h1>Admin (Manage Booking)</h1>
            </div>
            <div id="admin-action">
                <div class="action" onClick="location.href = 'Admin.php'">
                    <p><b>Back</b></p>
                </div>
                <div class="action" id="create-items" onClick="selectThisForm(this, getElementById('form-create-items'))">
                    <p><b>Create Booking</b></p>
                </div>
                <div class="action" id="view-items" onClick="selectThisForm(this, getElementById('form-view-items'))">
                    <p><b>View Booking Details</b></p>
                </div>
                <div class="action" id="delete-items" onClick="selectThisForm(this, getElementById('form-delete-items'))">
                    <p><b>Delete Booking </b></p>
                </div>
                <div class="action" id="update-items" onClick="selectThisForm(this, getElementById('form-update-items'))">
                    <p><b>Update Booking Details</b></p>
                </div>
            </div>
            <div id="forms">
                <div id="form-create-items">
                    <p><b>Create Booking</b></p>
                    <form autocomplete="off" onSubmit="return registerItems()" method="post" id="registration-form">
                        
						<div class="field-row">
                            <img src="image/user.png" width="8%" height="auto">
                            <input placeholder="Username" type="text" name="username" id="username" required>
                        </div>
                        <div class="field-row">
                            <img src="image/door.png" width="8%" height="auto">
                            <select id="bookingtype" name="bookingtype">
                                <option value="">Room name...</option>
                                <option value="Bilik Sejinjang">Bilik Sejinjang</option>
                                <option value="Bilik Santubong">Bilik Santubong</option>
                                <option value="Bilik Serapi">Bilik Serapi</option>
                                <option value="Bilik Rentap">Bilik Rentap</option>
                                
                            </select>
                        </div>
						<div class="field-row">
                            <img src="image/schedule.png" width="8%" height="auto">
                            <input placeholder="Booking date" type="date" name="bookingdate" id="bookingdate" required>
                        </div>
						<div class="field-row">
                            <img src="image/clock.png" width="8%" height="auto">
                            <select id="bookingtime" name="bookingtime">
                                <option value="">Booking time...</option>
                                <option value="8.00am-11.00am">8.00am-11.00am</option>
                                <option value="11.00am-2.00pm">11.00am-2.00pm</option>
                                <option value="2.00pm-5.00pm">2.00pm-5.00pm</option>
                                <option value="7.00pm-10pm">7.00pm-10pm</option>
								
                            </select>
                        </div>
						<div class="field-row">
                            <img src="image/capacity.png" width="8%" height="auto">
                            <select id="bookingcapacity" name="bookingcapacity">
                                <option value="">Booking capacity...</option>
                                <option value="10">max 10</option>
                                <option value="20">max 20</option>
                                <option value="30">max 30</option>
                                <option value="40">max 40</option>
								<option value="50">max 50</option>
								
								
                            </select>
                        </div>

						
                        <div class="field-column">
                            <button>Create Booking</button>
                            <button type="reset" style="margin-top: 20px;">Clear Form</button>
                        </div>
                    </form>
                </div>
                <div id="form-view-items">
                    <p><b>View Booking Details</b></p>
                    <form autocomplete="off" onSubmit="return viewItems('view-item-id','view-item-modal','view-item-modal-bg')">
                        <div class="field-row">
                            <img src="image/online-meeting.png" width="8%" height="auto">
                            <input placeholder="Username" type="text" name="item-id" id="view-item-id" required>
                        </div>
                        <div class="field-column">
                            <button>View Booking</button>
                            <button type="reset" style="margin-top: 20px;">Clear Form</button>
                        </div>
                    </form>
                </div>
                <div id="form-delete-items">
                    <p><b>Delete Booking</b></p>
                    <form autocomplete="off" onSubmit="return viewItems('delete-item-id','delete-item-modal','delete-item-modal-bg')">
                        <div class="field-row">
                            <img src="image/online-meeting.png" width="8%" height="auto">
                            <input placeholder="Username" type="text" name="item-id" id="delete-item-id" required>
                        </div>
                        <div class="field-column">
                            <button>Delete Booking</button>
                            <button type="reset" style="margin-top: 20px;">Clear Form</button>
                        </div>
                    </form>
                </div>
                <div id="form-update-items">
                    <p><b>Update Booking</b></p>
                    <form autocomplete="off" onSubmit="return retrieveInfo()" id="search-update-item">
                        <div class="field-row">
                            <img src="image/online-meeting.png" width="8%" height="auto">
                            <input placeholder="Username" type="text" name="item-id" id="search-update-item-id" required>
                        </div>
                        <div class="field-column">
                            <button>Update Booking</button>
                            <button type="reset" style="margin-top: 20px;">Clear Form</button>
                        </div>
                    </form>
                    <form autocomplete="off" onSubmit="return updateItems()" method="post" id="update-form">
                        
						<div class="field-row">
                            <img src="image/hashtag.png" width="8%" height="auto">
                            <input placeholder="Username" type="text" name="username" id="update-booking-uid" >
                        </div>
						<div class="field-row">
                            <img src="image/door.png" width="8%" height="auto">
                            <select id="update-booking-type" name="bookingtype">
                                <option value="">Room name...</option>
                                <option value="Bilik Sejinjang">Bilik Sejinjang</option>
                                <option value="Bilik Santubong">Bilik Santubong</option>
                                <option value="Bilik Serapi">Bilik Serapi</option>
                                <option value="Bilik Rentap">Bilik Rentap</option>
                                
                            </select>
                        </div>
                        <div class="field-row">
                            <img src="image/schedule.png" width="8%" height="auto">
                            <input placeholder="Booking date" type="date" name="bookingdate" id="update-booking-date" required>
                        </div>
						<div class="field-row">
                            <img src="image/clock.png" width="8%" height="auto">
                            <select id="update-booking-time" name="bookingtime">
                                <option value="">Booking time...</option>
                                <option value="8.00am-11.00am">8.00am-11.00am</option>
                                <option value="11.00am-2.00pm">11.00am-2.00pm</option>
                                <option value="2.00pm-5.00pm">2.00pm-5.00pm</option>
                                <option value="7.00pm-10pm">7.00pm-10pm</option>
								
                            </select>
                        </div>
						<div class="field-row">
                            <img src="image/capacity.png" width="8%" height="auto">
                            <select id="update-booking-capacity" name="bookingcapacity">
                                <option value="">Booking capacity...</option>
                                <option value="10">max 10</option>
                                <option value="20">max 20</option>
                                <option value="30">max 30</option>
                                <option value="40">max 40</option>
								<option value="50">max 50</option>
								
								
                            </select>
                        </div>
                        
                        <div class="field-column">
                            <button>Update Booking</button>
                            <button type="button" style="margin-top: 20px;" id="cancel-update">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
		<footer><center>&copy; Developed By Betsy Pati, Nur Baqiyah, Siti Hamizah and Nurain Batrisyia</center></footer></div>
    </body>
</html>