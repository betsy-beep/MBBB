
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="css/login.css">
   <script src="AdminLogin.js"></script>
  <title>Sign in (Admin) </title>
  <script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

</script>
</head>

<body>

  
  <div class="main">
    <p class="sign" align="center">ADMIN LOGIN</p>
    <form  name="myform" id="myform"   onsubmit="return validateForm()" method="POST" autocomplete="on" action="validate.php">
      <input class="un " type="text" placeholder="Username" name="adminname" id="username" required>
      <input class="pass" type="password" placeholder="password" name="password" id="myInput" required>
      <center><input type="checkbox" onClick="myFunction()" style="width:10px"; >Show </center><br>
      <button type="submit" class="submit" id="submit" name="loginButton" align="center" ><a href="Homepage.php">Log In</a> </button>
      <p class="forgot" align="center">not an admin?<a href="index.html">click here</a></p>
            
    </div>
     </form>
</body>

</html>