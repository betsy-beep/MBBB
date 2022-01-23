<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <script src="register.js"></script>

 <?php include "dbconnection.php"; ?>

    <title>Registration</title>

</head>    
<body>
<!----------------php validation code-------------------->
<?php
// define variables and set to empty values
$fname = $lname = $email = $matricNo = $phoneNo =  $psw = $cpsw =  "";
$fnameErr = $lnameErr = $emailErr = $matricNoErr = $phoneNoErr = $pswErr = $cpswErr =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
     if (empty($_POST["fname"])) {
        $fnameErr = "You Forgot to Enter Your First Name!";
     } else {
        $fname = test_input($_POST["fname"]);
        //Checks if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
            $fnameErr = "Only letters and white space allowed"; 
        }
      }

      if (empty($_POST["lname"])) {
        $lnameErr = "You Forgot to Enter Your Last Name!";
     } else {
        $lname = test_input($_POST["lname"]);
        //Checks if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
            $lnameErr = "Only letters and white space allowed"; 
        }
      }

       if (empty($_POST["email"])) 
        {
          $emailErr = "email is required";
        } 

       if (empty($_POST["email"])) {
        $emailErr = "You Forgot to Enter Your Email!";
       } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address syntax is valid
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
            $emailErr = "You Entered An Invalid Email Format"; 
        }
       }

       if (empty($_POST["phoneNo"])) 
        {
          $phoneNoErr = "Mobile Number is required";
        } 
       else
           { 
               $phoneNo = test_input($_POST["phoneNo"]);
         if(!preg_match('/^[0-9]{9,10}+$/', $phoneNo))
         {
          $phoneNoErr = "You Entered Invalid Mobile Number!";
       }
     }
         
       if(!empty($_POST["psw"]) && isset( $_POST['psw'] )) {
    $psw = $_POST["psw"];
    $cpsw = $_POST["cpsw"];
    if (mb_strlen($_POST["psw"]) <= 6) {
        $pswErr = "Your Password Must Contain At Least 8 Characters!";
    }
    elseif(!preg_match("#[0-9]+#",$psw)) {
        $pswErr = "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#",$psw)) {
        $pswErr = "Your Password Must Contain At Least 1 Capital Letter";
    }
    elseif(!preg_match("#[a-z]+#",$psw)) {
        $pswErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }
    elseif(!preg_match("#[\W]+#",$psw)) {
        $pswErr = "Your Password Must Contain At Least 1 Special Character!";
    } 
    elseif (strcmp($psw, $cpsw) !== 0) {
        $pswErr = "Passwords must match!";
    }
} else {
    $pswErr = "Please enter password   ";
}
         
 if (empty($_POST["matricNo"])) 
        {
          $matricNoErr = "Matric Number is required";
        } 
       else
           { 
               $matricNo = test_input($_POST["matricNo"]);
         if(!preg_match('/[^a-zA-Z@$!%*?&,.]$/', $matricNo))
         {
          $matricNoErr = "You Entered Invalid Matric Number!";
       }
     }
        
if($fname != "" && $lname != "" && $email != "" && $phoneNo != "" && $psw != "" && $cpsw != "" && $matricNo != "" ){
    include "register-process.php";
  }
  }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


    <main>
    <section class="glass"> <!-----glass for the form background----> 
    
    <form  name="myform" id="myform"  style="max-width:500px; margin:auto;" onsubmit="return validateRegister()" method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    
    <h2><span class="fi-rr-user"></span>User Registration Form</h2>


<!-------------------------------------------------firstname & lastname------------------------------------------>
<span class="error"><?php echo $fnameErr;?><br></span><span class="error"><?php echo $lnameErr;?></span>
<div class="input-container">
    <i class="fi-rr-portrait"></i>
    <input class="input-field" type="text" id="fname" placeholder="Firstname" name="fname">
    <input class="input-field" type="text" id="lname" placeholder="Lastname" name="lname">
</div>

<!-------------------------------------------------email--------------------------------------------------------->
<span class="error"><?php echo $emailErr;?></span>
<div class="input-container">
    <i class="fi-rr-envelope"></i>
    <input class="input-field" type="text" id="email" placeholder="abcd40@gmail.com" name="email">
</div>


<!------------------------------------------------phone no-------------------------------------------------------->
<span class="error"><?php echo $phoneNoErr;?></span>
<div class="input-container">
    <i class="fi-rr-smartphone"></i>
    <select placeholder="+60" class="phoneNo">
    <option value="+60">+60</option>
   <input type="tel" id="phoneNo" name="phoneNo" placeholder="112345674">
</div>

<!-------------------------------------------matric No--------------------------------------->
<span class="error"><?php echo $matricNoErr;?><br></span>
<div class="input-container">
    <i class="fi-rr-credit-card"></i>
    <input type="text" name="matricNo" id="matricNo" placeholder="Matric num or staff num">
</div>

<!------------------------------------------------password-------------------------------------------------------->
<span class="error"><?php echo $cpswErr;?></span><span class="error"><?php echo $pswErr;?></span>
<div class="input-container">
    <i class="fi-rr-key"></i>
    <input class="input-field" type="password" placeholder="Password"  id="psw" name="psw">
    <input class="input-field" type="password" placeholder="Confirm Password" id="cpsw" name="cpsw" >
</div>



<!------------------------------------------------button:register & clear----------------------------------------------------->
 <button type="submit" class="registerButton" name="registerButton" ><a href="home.html"></a>Register</button>
  <button type="reset" class="clearButton" name="clearButton">Clear
</button>
<p class="forgot" align="center">already have account?<a href="index.html">click here</a> to login</p>
    </form>
    </section>
    </main>
</body>
</html>