

<!DOCTYPE html>
<html>
    <head>
        <title>
            Admin - Review Report
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/admin_report.css">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Autour One">
        <script src="anime/anime.min.js"></script>
        <script type="text/javascript" src="chart/Chart.js"></script>
        <script type="text/javascript" src="admin_report.js"></script>
    </head>
    <body>
        <div id="bg"><div id="bg-overlay"></div></div>
        <div id="content">
            <div id="error-modal-bg">
                <div id="err or-modal">
                    <button id="error-modal-button">Okay</button>
                </div>
            </div>
			
            <div id="admin-page-header">
                <h1>Admin (Weekly/Monthly Report)</h1>
            </div>
            <div id="admin-action">
                <div class="action" onClick="location.href = 'Admin.php'">
                    <p><b>Back</b></p>
                </div>
            </div>
			
            <div id="canvas-container">
                <canvas id="sales-chart"></canvas>
                <form style="display: flex; flex-direction: column; justify-content: flex-start;" onSubmit="return changeDataSet()">
                    <input placeholder="Year" value="2020" id="year" type="number" min="2020">
                    <input type="submit" value="Set Chart">
                </form>
            </div>
        </div>
		<footer><center>&copy; Developed By Betsy Pati, Nur Baqiyah, Siti Hamizah and Nur Batrisyia</center></footer></div>
    </body>
</html>