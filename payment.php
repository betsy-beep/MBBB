<html>

<head>
    <?php require "dbconnect.php"; ?>
    <title> Payment </title>
    <script>
	function validatePayment() {
	var ccard = document.getElementById("ccard");
	var paypal = document.getElementById("paypal");
	var name = document.getElementById("name");
	var checkname = /^[A-Z]/;
	var cardno = document.getElementById('cardno');
	var cardcheck =/^([0-9]{16})$/;
	var expiry = document.getElementById('expiry');
	var expirycheck = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/; 
	var cvv = document.getElementById('cvv');
	var checkcvv = /^([0-9]{3,4})$/;
	
	if (ccard.checked==false && paypal.checked==false)
	{
		alert("You must select your payment card");
		return false;
	}
	else if (document.myform.name.value=="") {
		alert("Please enter your name on card");
		name.focus();
		return false;
	}
	else if (!checkname.test(name.value)) {
		alert("First character of name must be uppercase");
		name.focus();
		return false;
	}
	else if (document.myform.cardno.value=="") {
		alert("Please enter your card number");
		cardno.focus();
		return false;
	}
	else if (!cardcheck.test(cardno.value)) {
		alert("Please enter correct card number format (eg. 0011221500167788)");
		cardno.focus();
		return false;
	}
	else if (document.myform.expiry.value=="") {
		alert("Please enter your card's expiry date");
		expiry.focus();
		return false;
	}
	else if (!expirycheck.test(expiry.value)) {
		alert("Please enter correct expiry date format (DD/MM/YYYY)");
		expiry.focus();
		return false;
	}
	else if (document.myform.cvv.value=="") {
		alert("Please enter your cvv number");
		cvv.focus();
		return false;
	}
	else if (!checkcvv.test(cvv.value)) {
		alert("Please enter CVV code 3-4 digits");
		cvv.focus();
		return false;
	}
} </script>
	<link href='https://fonts.googleapis.com/css?family=Autour One' rel='stylesheet' >
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
.payment{
	margin-left: 25%;
	background-color: #f1f1f1;
	border-radius: 20px;
	padding: 10px;
	box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
	width: 50%;
	margin-bottom:45px;
}

.icon-container {
  margin-bottom: 20px;
  padding: 0px;
  font-size: 24px;
}

input[type=radio] 
{
	cursor: pointer;
}

.name{
	text-align: center;
	border-radius: 20px;
	padding: 10px;
	width: 390px;
}

.cardno{
	text-align: center;
	border-radius: 20px;
	padding: 10px;
	width: 390px;
}

.expiry{
	text-align: center;
	border-radius: 20px;
	padding: 10px;
	width:390px;
}

.cvv{
	text-align: center;
	border-radius: 20px;
	padding: 10px;
	width:390px;
}

.paybtn{
	text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
	justify-content: center;
	background-color: #E1BEE7;
	color: white;
	border-color: white;
	cursor: pointer;
	padding: 10px;
	opacity:0.8;
	border-radius: 15px;
}

.cartbtn{
	text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
	justify-content: center;
	background-color: #E1BEE7;
	color: white;
	border-color: white;
	cursor: pointer;
	padding: 10px;
	opacity:0.8;
	border-radius: 15px;
}

.cartbtn:hover
{
	opacity:0.6;
}

.paybtn:hover
{
	opacity:0.6;
}

.clearbtn{
	text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
	justify-content: center;
	background-color: #E1BEE7;
	color: white;
	border-color: white;
	cursor: pointer;
	padding: 10px;
	opacity:0.8;
	border-radius: 15px;
}

.clearbtn:hover
{
	opacity:0.6;
}

footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
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
<?php
$card = $name = $cardno = $expiry = $cvv = "";
$cardErr = $nameErr = $cardnoErr = $expiryErr = $cvvErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if (empty($_POST["card"])) {
        $cardErr = "You must select your payment card";
     } else {
        $card = test_input($_POST["card"]);
	 }
	 
	 if (empty($_POST["name"])) {
        $nameErr = "Please enter your name on card";
     } else {
        $name = test_input($_POST["name"]);
        
        if (!preg_match("/^[A-Z]/",$name)) {
            $nameErr = "First character of name must be uppercase"; 
        }
      }
	  
	  if (empty($_POST["cardno"])) {
        $cardnoErr = "Please enter your card number";
     } else {
        $cardno = test_input($_POST["cardno"]);
        
        if (!preg_match("/^([0-9]{16})$/",$cardno)) {
            $cardnoErr = "Please enter correct card number format (eg. 001122150016)"; 
        }
      }
	  
	  if (empty($_POST["expiry"])) {
        $expiryErr = "Please enter your card's expiry date";
     } else {
        $cardno = test_input($_POST["cardno"]);
        
        if (!preg_match("/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/",$cardno)) {
            $cardnoErr = "Please enter correct expiry date format (DD/MM/YYYY)"; 
        }
      }
	  
	   if (empty($_POST["cvv"])) {
        $cvvErr = "Please enter your cvv number";
     } else {
        $cvv = test_input($_POST["cvv"]);
        
        if (!preg_match("/^([0-9]{3,4})$/",$cardno)) {
            $cvvErr = "Please enter CVV code 3-4 digits"; 
        }
      }
}
?>
<form name="myform" id="myform" onSubmit="return validatePayment()" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
<input type="hidden" name="guestID" value="<?= $_GET["guestID"]; ?>">
<div class="header">
  <a onclick="window.location.href='guestbooking.php?guestID=<?= $_GET["guestID"]; ?>';" class="logo">Room Now</a>

  <div class="header-right">
    <a class="active" onclick="window.location.href='cart.php?guestID=<?= $_GET["guestID"]; ?>';"><i class='fas fa-shopping-cart'></i></a>
	<a href="index.html" onclick="return confirm('Confirm Logout?')">Logout</a></div>
</div> <br><br><br>
    <div class="payment">
	<h1> PAYMENT DETAILS </h1>
	<label for="name">Accepted Payment</label>
	<div class="icon-container"><span class="error"><?php echo $cardErr;?></span>
             <input type="radio" name="card" value="credit card" id="ccard"><i class="fa fa-credit-card" style="color:maroon"></i>
             <input type="radio" name="card" value="paypal" id="paypal"><i class="fab fa-cc-paypal" style="color:navy"></i>
            </div>
	<input class="name" type="text" name="name" id="name" placeholder="Name on Card"><span class="error"><?php echo $nameErr;?></span>
	<br><br><input class="cardno" type="text" name="cardno" id="cardno" placeholder="Card Number"><span class="error"><?php echo $cardnoErr;?></span>
	<br><br><input class="expiry" type="text" name="expiry" id="expiry" placeholder="Expiry Date"><span class="error"><?php echo $expiryErr;?></span>
	<br><br><input class="cvv" type="text" name="cvv" id="cvv" placeholder="CVV"><span class="error"><?php echo $cvvErr;?></span>
	
	<br><br><br><br>
	<input type="Submit" name="pay" value="Pay" id="pay" class="paybtn" onclick="return confirm('Confirm Payment?')">
	 <input type="reset" value="Clear" class="clearbtn" onclick="window.location.href='payment.php?guestID=<?= $_GET["guestID"]; ?>';">
	 <input type="button" name="cart" value="Back to Cart" id="cart" class="cartbtn" class="cartbtn" onclick="window.location.href='cart.php?guestID=<?= $_GET["guestID"]; ?>';">
	</div>
	<footer><center>&copy; Developed By Betsy Pati, Nur Baqiyah, Siti Hamizah and Nurain Batrisyia</center></footer></div>
	</form>
</body>
</html>
	
	