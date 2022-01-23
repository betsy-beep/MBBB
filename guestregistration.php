<html>

<head>

     <title> Guest Registration </title>
	 <script>
	 function validateGuest() {
	var ICnum = document.getElementById("ICnum");
	var ICcheck = /^([0-9]{12})$/;
	var fname = document.getElementById("fname");
	var nmcheck = /^[A-Z]/;
	var lname = document.getElementById("lname");
	var email = document.getElementById("email");
	var emcheck = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var mobilephone = document.getElementById("mobilephone");
	var phonecheck = /^([0-9]{9,10})$/;
	
	
	if (document.myform.ICnum.value=="") {
		alert("Please enter your IC number");
		ICnum.focus();
		return false;
	}
	else if (!ICcheck.test(ICnum.value)) {
		alert("Please enter correct IC number format (eg. 001123108790)");
		ICnum.focus();
		return false;
	}
	else if (document.myform.fname.value=="") {
		alert("Please enter your first name");
		fname.focus();
		return false;
	}
	else if (!nmcheck.test(fname.value)) {
		alert("First character of first name must be uppercase");
		fname.focus();
		return false;
	}
	else if (document.myform.lname.value=="") {
		alert("Please enter your last name");
		lname.focus();
		return false;
	}
	else if (!nmcheck.test(lname.value)) {
		alert("First character of last name must be uppercase");
		lname.focus();
		return false;
	}
	else if (document.myform.email.value=="") {
		alert("Please enter your email");
		email.focus();
		return false;
	}
	else if (!emcheck.test(email.value)) {
		alert("Please provide a valid email address (Example: agraban@gmail.com)");
		email.focus();
		return false;
	}
	else if (document.myform.mobilephone.value=="") {
		alert("Please enter your mobile phone number");
		mobilephone.focus();
		return false;
	}
	else if (!phonecheck.test(mobilephone.value)) {
		alert("Please input mobile number 9-10 digits");
		mobilephone.focus();
		return false;
	}
	else if (document.myform.mobilephone.value=="") {
		alert("Please enter your mobile phone number");
		mobilephone.focus();
	return false;}
	 }
	 </script>
	 
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

.guestLogin{
    
	margin: 6em auto;
	max-width:650px;
	background-color: #f1f1f1;
	text-align: center;
	border-radius: 20px;
	padding: 10px;
	box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
    }
	
.login{
	margin-top: 5%;
	padding-top: 30px;
}
input[type=text] , input[type=email] , input[type=tel]
{
	width: 400px;
	border-radius: 20px;
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

.clearbtn
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

.clearbtn:hover
{
	opacity:0.6;
}


footer {
  background-color: #777;
  padding: 15px;
  text-align: center;
  color: white;
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
<?php require "dbconnect.php"; ?>
<?php
//define variables and set empty values
$ICNumber = $FirstName = $LastNumber = $Email = $Mobile = "";
$ICNumberErr = $FirstNameErr = $LastNameErr = $EmailErr = $MobileErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["ICNumber"])) {
        $ICNumberErr = "Please enter your IC Number";
     } else {
        $ICNumber = test_input($_POST["ICNumber"]);
        
        if (!preg_match("/^([0-9]{12})$/",$ICNumber)) {
            $ICNumberErr = "Please enter correct IC number format (eg. 001123108790)"; 
        }
      }
	  
	  if (empty($_POST["FirstName"])) {
        $FirstNameErr = "Please enter your first name";
     } else {
        $FirstName = test_input($_POST["FirstName"]);
        
        if (!preg_match("/^[A-Z]/",$FirstName)) {
            $FirstNameErr = "First character of first name must be uppercase"; 
        }
      }
	  
	  if (empty($_POST["LastName"])) {
        $LastNameErr = "Please enter your last name";
     } else {
        $LastName = test_input($_POST["LastName"]);
        
        if (!preg_match("/^[A-Z]/",$LastName)) {
            $LastNameErr = "First character of last name must be uppercase"; 
        }
      }
	  
	 if (empty($_POST["Email"])) {
        $EmailErr = "Please enter your email";
     } else {
        $EmailName = test_input($_POST["Email"]);
        
        if (!preg_match("/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;",$Email)) {
            $EmailErr = "Please provide a valid email address (Example: agraban@gmail.com)"; 
        }
      }
	  
	  if (empty($_POST["Mobile"])) {
        $MobileErr = "Please enter your mobile phone number";
     } else {
        $Mobile = test_input($_POST["Mobile"]);
        
        if (!preg_match("/^([0-9]{9,10})$/",$Mobile)) {
            $MobileErr = "Please input mobile number 9-10 digits"; 
        }
      }
	  function test_input($data) 
			{
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}
}
?>
<form name="myform" id="myform" onSubmit="return validateGuest()" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="header">
  <a href="index.html" class="logo">Room Now</a>

  <div class="header-right">
    <a class="active" href="glogin.php">Already Registered?</a>
	</div>
</div>
<div class="guestlogin">
<center><h1 class="login"><span class="fi-rr-user"></span> GUEST FORM</h1>
	 <br>
	 <table>
	 <tr>
		 <td> IC Number </td>
	     <td> 
		     <input type="tel" name="ICNumber" id="ICnum" required>
			 <span class="error"><?php echo $ICNumberErr;?></span>
		 </td>
	 </tr>
	 <tr>
		 <td> First Name </td>
		 <td> 
		 <input type="text" name="FirstName" id="fname" required>
		 <span class="error"><?php echo $FirstNameErr;?></span>
	     </td>
	 </tr>
	 <tr>
		 <td> Last Name </td>
	     <td> 
		 <input type="text" name="LastName" id="lname" required>
		  <span class="error"><?php echo $LastNameErr;?></span>
	     </td>
	 </tr>
	 <tr>
		 <td> Email </td>
		 <td>
			 <input type="text" name="Email" id="email" required>
			 <span class="error"><?php echo $EmailErr;?></span> 
         </td>
	 <tr>
		 <td> Mobile Number </td>
		 <td>
			 <input type="tel" name="Mobile" id="mobilephone" required>
			 <span class="error"><?php echo $MobileErr;?></span> 
			 </td>
			 </table>
			 
			  <table>
	     <tr>
		     <td><input type="submit" name="register" value="Register" id="login" class="loginbtn"> <input type="reset" value="Clear" class="clearbtn" onclick="window.location.href='guestregistration.php';"> </td>
		 </tr>
	 </table>
	</div>
</form>
	 <footer>Copyrighted &copy;2021 Developed By Betsy Pati, Nur Baqiyah, Siti Hamizah and Nurain Batrisyia</footer>
</body>
</html>