
<!DOCTYPE html>
<html>
<head>
	<title>
		Admin Panel
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Autour One">
	 <link rel="stylesheet" type="text/css" href="css/admin.css">
	<script src="anime/anime.min.js"></script>
	<script type="text/javascript" src="admin.js"></script>
</head>
<body>
	<div id="bg"><div id="bg-overlay"></div></div>
	<div id="content">
		
		<div id="admin-page-header">
			<h1>Admin Panel</h1>
		</div>
		<div id="admin-action">
			<div id="action">
				<div onClick="location.href = 'ManageUser.php'">
					<img src="image/team.png" width="30%" height="auto">
					<p><b>Manage Users</b></p>
				</div>
				<div onClick="location.href = 'ManageBooking.php'">
					<img src="image/calendar.png" width="30%" height="auto">
					<p><b>Manage Booking</b></p>
				</div>
				<div onClick="location.href = 'Createtransaction.php'">
					<img src="image/calculator.png" width="30%" height="auto">
					<p><b>Manage Transaction Record</b></p>
				</div>
				<div onClick="location.href = 'Report.php'">
					<img src="image/transaction.png" width="30%" height="auto">
					<p><b>Review Report</b></p>
				</div>
			</div>
			<div id="logout">
				<div onClick="location.href = 'index.html'">
					<img src="image/arrow.png" width="30%" height="auto">
					<p><b>Log out</b></p>
				</div>
			</div>
			<input type="button" value="Homepage" onClick="location.href = 'Homepage.php'" img src= "image/homepage.png" / >
	
	</div>
		</div>
		
	
</body>
</html>