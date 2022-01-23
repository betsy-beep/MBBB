<?php
 
require("dbconn.php");
 
$query = "select jan,feb,march,april,may,june from  chart";
$result = mysqli_query($db,$query);
 
if(mysqli_num_rows($result) >= 1) {
    while ($row = mysqli_fetch_assoc($result)) {
 
        $jan = $row['jan'];
        $feb = $row['feb'];
        $march = $row['march'];
        $april = $row['april'];
        $may = $row['may'];
        $june = $row['june'];
    }
}
    else
    {
    echo "someting went wrong";
 
    }
?>
 
 
<html>
 
<head>
 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/admin_report.css">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Autour One">
		
        <script type="text/javascript" src="chart/Chart.js"></script>
        <script type="text/javascript" src="admin_report.js"></script>
 <title>
            Admin - Review Report
        </title>
</head>
<!--<style>

body{
	background-color: #99CCFF;
	margin-top: 200px;
	margin-left:0;
}
</style>-->
<body>
 <div id="admin-page-header">
                <h1>Admin (Monthly Report)</h1>
            </div>
 <div id="admin-action">
                <div class="action" onClick="location.href = 'Admin.php'">
                    <p><b>Back</b></p>
                </div>
            </div>
<center><canvas id="myChart" style="height: 350px; width: 2500px;"></canvas></center>
 
<?php
 
echo "<input type='hidden' id= 'jan' value = '$jan' >";
echo "<input type='hidden' id= 'feb' value = '$feb' >";
echo "<input type='hidden' id= 'march' value = '$march' >";
echo "<input type='hidden' id= 'april' value = '$april' >";
echo "<input type='hidden' id= 'may' value = '$may' >";
echo "<input type='hidden' id= 'june' value = '$june' >";
 
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
 
 
<script>
    var jan = document.getElementById("jan").value;
    var feb = document.getElementById("feb").value;
    var march = document.getElementById("march").value;
    var april = document.getElementById("april").value;
    var may = document.getElementById("may").value;
    var june = document.getElementById("june").value;
 
    window.onload = function()
    {
        var randomScalingFactor = function() {
            return Math.round(Math.random() * 100);
        };
        var config = {
            type: 'bar',
            data: {
                borderColor : "#fffff",
                datasets: [{
                    data: [
                        jan,
                        feb,
                        march,
                        april,
                        may,
                        june
                    ],
                    borderColor : "#fff",
                    borderWidth : "2",
                    hoverBorderColor : "#000",
 
                    label: 'Monthly Booking Report 2021',
 
                    backgroundColor: [
                        "#0190ff",
                        "#56d798",
                        "#ff8397",
                        "#6970d5",
                        "#f312cb",
                        "#ff0060"
 
                    ],
                    hoverBackgroundColor: [
                        "#f38b4a",
                        "#56d798",
                        "#ff8397",
                        "#6970d5",
                        "#ffe400"
                    ]
                }],
 
                labels: [
                    'Jan',
                    'Feb',
                    'March',
                    'April',
                    'May',
                    'June'
                ]
            },
 
            options: {
                responsive: true
 
            }
        };
        var ctx = document.getElementById('myChart').getContext('2d');
        window.myPie = new Chart(ctx, config);
 
 
    };
</script>
 <footer><center>&copy; Developed By Betsy Pati, Nur Baqiyah, Siti Hamizah and Nurain Batrisyia</center></footer></div>
</body>
 
</html>