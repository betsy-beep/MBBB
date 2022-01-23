<!DOCTYPE html>
<html>
<head>
<title>Profile</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Autour One' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script type="text/javascript" src="js/validateEUP.js"></script>
  
</head>

<style type="text/css">
.main {
        background-color: #FFFFFF;
        width: 400px;
        height: 300px;
        margin: 7em auto;
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
    } 

.option {
    width: 25%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 40px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    } 

.phoneNo {
    width: 50%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 30px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
  
  
.b{
  display: flex;
  justify-content: center;
  margin: auto;
}

</style>

<body>

<?php 
include "dbconnection.php";

$matricNo = $_REQUEST['matricNo'];

?>

<div class="main">
    <h2 align="center">Edit User Profile</h2>
    <form  name="myform" id="myform" onsubmit="return validateEUP()" method="POST" autocomplete="on" action="editphonenumber-process.php?matricNo=<?php echo $matricNo; ?>">
    <center><h2>Phone Number : </h2></center>
  
  <select placeholder="+60" class="option">
    <option class="option" value="+60">+60</option>
    <input class="phoneNo" type="tel" id="phoneNo" name="phoneNo" placeholder="112345674">
   
  <div class="b">
  <button class="button" type="submit">Save</button>&nbsp;<button class="button" onClick ="cancel()">Cancel</button> 
          
  </form>
  </div>
            
    </div>

<footer><center>&copy; Developed By Betsy Pati, Nur Baqiyah, Siti Hamizah and Nurain Batrisyia</center></footer></div>
<br>
</body>
</html>