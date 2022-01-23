<?php
$db=mysqli_connect("sql211.epizy.com", "epiz_28929474", "eWyh9BwPIM", "epiz_28929474_mbbb") or die ("The MYSQL server is OFF <br>");

function query($query)
    {
        global $db;

        $result  = mysqli_query($db,$query);

        $rows = [];

        while ($row = mysqli_fetch_assoc($result))
        {
            $rows[] = $row;
        }

        return $rows;
    }
	
$guests = query("SELECT * FROM guestregister");
$ID = query("SELECT * FROM guestregister ORDER BY guestID DESC limit 0,1");


//$i=0;

    if (isset($_POST["submit"]))
    {
        foreach ($guests as $guest)
        {
            if ($_POST["ICNumber"] == $guest["ICNumber"] && $_POST["Email"] == $guest["Email"] && $_POST["Mobile"] == $guest["Mobile"])
            {
				$guestID = $guest['guestID'];
                echo "
                    <script>
                        document.location.href = 'guestbooking.php?guestID=$guestID';
                    </script>
                ";
            }
			
			foreach ($ID as $id){
			if ($guest["guestID"]==$id["guestID"]){
				echo "
                    <script>
                        alert('No data found!');
                    </script>
                ";
				echo "
                    <script>
                        document.location.href = 'glogin.php';
                    </script>";
            }
			}			
            
        }

    }

?>
<html>

<head>

     <title> Guest Login </title>
	  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	 <link href='https://fonts.googleapis.com/css?family=Autour One' rel='stylesheet' >
	 <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
	 </head>
	 <style>
body{
	margin: 0;
	background-color: #99CCFF;
	font-family: 'Autour One';
	color: #8C55AA;
	text-align: center;
    } 
	
.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
 float: right;
}
input[type=text]
{
	width: 200px;
	border-radius: 20px;
}
.table{
	margin: auto;
}
.guestLogin{
    
	margin: 7em auto;
	max-width:650px;
	background-color: #f1f1f1;
	text-align: center;
	border-radius: 20px;
	padding: 10px;
	box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
	width: 500px;
    }
footer {
  background-color: #777;
  padding: 12px;
  text-align: center;
  color: white;
  margin-top:17%;
}
.loginbtn
{
	text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
	justify-content: center;
	background-color: #E1BEE7;
	color: white;
	border-color: white;
	cursor: pointer;
	padding: 5px;
	opacity:0.8;
	border-radius: 10px;
}
.loginbtn:hover
{
	opacity:0.6;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
</style>
	 <body>
	 <div class="header">
   <a href="index.html" class="logo">Room Now</a>

  <div class="header-right">
    <a class="active" href="guestregistration.php">First Time?</a></div>
</div>
	 <form action="" method="post">
	 <div class="guestlogin">
	 <h1><span class="fi-rr-user"></span>Guest Login</h1>
            <table class="table" align="center">
                <ul>
                    <tr>
                        <td>
                            <label for="ICNumber">IC Number: </label>
                        </td>
                        <td>
                            <input type="text" name="ICNumber" id="ICNumber">
                        </td>
                    </tr>
                </ul>
				<ul>
				<tr>
                        <td>
                            <label for="Email">Email: </label>
                        </td>
                        <td>
                            <input type="text" name="Email" id="Email">
                        </td>
                    </tr>
					</ul>
					<ul>
				<tr>
                        <td>
                            <label for="Mobile">Mobile Phone: </label>
                        </td>
                        <td>
                            <input type="text" name="Mobile" id="Mobile">
                        </td>
                    </tr>
					</ul>
            </table>
            <br>
            <div align="center">
                <button type="submit" name="submit" id="button" class="loginbtn">Enter</button>
            </div>
        </form>
		</div>
	 <footer>Copyrighted &copy;2021 Developed By Betsy Pati, Nur Baqiyah, Siti Hamizah and Nurain Batrisyia</footer>
	 </body>
		</html>