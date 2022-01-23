
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" type="text/css" href="css/admin_users.css">
	<script src="anime.min.js"></script>
    <script src="admin_users.js"></script>
	
    <title>Registration</title>
</head>    
<body>


<?php 
			$username = $firstname = $lastname = $email = $icnumber  = $phonenumber = $inpassword = $confpassword ="";
			$usernameErr = $firstnameErr = $lastnameErr = $emailErr = $icnumberErr  = $phonenumberErr = $inpasswordErr = $confpasswordErr = "";
		 
		 
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			if (empty($_POST["username"])) {
				$usernameErr = "You Forgot to Enter Your Username!";
			} else {
				$username = test_input($_POST["username"]);
			//Checks if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
            $usernameErr = "Only letters and white space allowed"; 
			}
		}
			
			
			
			 if (empty($_POST["firstname"])) 
				{
					$firstnameErr = "First name is required";
				} 
			 else
			    { 
			         $firstname = test_input($_POST["firstname"]);
					 if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
						$firstnameErr = "Only letters and white space allowed"; 
					}
				}
				 
			 if (empty($_POST["lastname"])) 
				{
					$lastnameErr = "Last name is required";
					
				} 
			 else
			    { 
			         $lastname = test_input($_POST["lastname"]);
					 if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
						$lastnameErr = "Only letters and white space allowed"; 
					}
				}
				 
			 if (empty($_POST["email"])) 
				{
					$emailErr = "Email is required";
				} 
			 else
			     { 
			         $email = test_input($_POST["email"]);
					 if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
						$emailErr = "You Entered An Invalid Email Format"; 
					}
				 }
				 
			if (empty($_POST["icnumber"])) 
				{
					$icnumberErr = "IC number is required";
				} 
			 else
			    { 
			         $icnumber = test_input($_POST["icnumber"]);
					 if (!preg_match("/^[0-9]{6}-[0-9]{2}-[0-9]{4}$/",$icnumber)) {
						$icnumberErr = "You Entered An Invalid IC No"; 
					}
				}
				 
				 
			 if (empty($_POST["phonenumber"])) 
				{
					$phonenumberErr = "Mobile phone is required";
				} 
			 else
			    { 
			         $phonenumber = test_input($_POST["phonenumber"]);
					 if(!preg_match('/^[0-9]{9,10}+$/', $phonenumber)) {
						$phonenumberErr = "You Entered Invalid Mobile Number!";
					}
				}
				 
			 if (empty($_POST["inpassword"]) && isset( $_POST['inpassword'] )) 
				{
					$inpassword = $_POST["inpassword"];
					$confpassword = $_POST["confpassword"];
					if (mb_strlen($_POST["inpassword"]) <= 6) {
					$inpasswordErr = "Your Password Must Contain At Least 8 Characters!";
					
				} 
				elseif(!preg_match("#[0-9]+#",$inpassword)) {
				$inpasswordErr = "Your Password Must Contain At Least 1 Number!";
				}
				elseif(!preg_match("#[A-Z]+#",$inpassword)) {
				$inpasswordErr = "Your Password Must Contain At Least 1 Capital Letter";
				}
				elseif(!preg_match("#[a-z]+#",$inpassword)) {
				$inpasswordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
				}
				elseif(!preg_match("#[\W]+#",$inpassword)) {
				$inpasswordErr = "Your Password Must Contain At Least 1 Special Character!";
				} 
				elseif (strcmp($inpassword, $confpassword) !== 0) {
				$inpasswordErr = "Passwords must match!";
				}
				}
			 else
			     { 
			         $inpassword = "Please enter password";
				 }
			 
			
				if ($username != "" && $firstname != "" && $lastname !="" ){
				include "AdminUser.php";
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
            <div id="create-user-modal-bg">
                <div id="create-user-modal">
                    <button id="create-user-modal-button">Okay</button>
                </div>
            </div>
            <div id="view-user-modal-bg">
                <div id="view-user-modal">
                    <button id="view-user-modal-button">Continue</button>
                </div>
            </div>
            <div id="delete-user-modal-bg">
                <div id="delete-user-modal">
                    <div class="field-column" id="delete-modal-buttons">
                        <button id="delete-user-modal-button">Confirm Delete</button>
                        <button id="not-delete-user-modal-button">Cancel</button>
                    </div>
                    <button id="not-found-delete-button">Okay</button>
                </div>
            </div>
            <div id="admin-page-header">
                <h1>Admin (Manage Users)</h1>
            </div>
            <div id="admin-action">
                <div class="action" onClick="location.href = 'Admin.php'">
                    <p><b>Back</b></p>
                </div>
                <div class="action" id="create-users" onClick="selectThisForm(this, getElementById('form-create-users'))">
                    <p><b>Create Users</b></p>
                </div>
                <div class="action" id="view-users" onClick="selectThisForm(this, getElementById('form-view-users'))">
                    <p><b>View Users Info</b></p>
                </div>
                <div class="action" id="delete-users" onClick="selectThisForm(this, getElementById('form-delete-users'))">
                    <p><b>Delete Users</b></p>
                </div>
                <div class="action" id="update-users" onClick="selectThisForm(this, getElementById('form-update-users'))">
                    <p><b>Update Users Info</b></p>
                </div>
            </div>
            <div id="forms">
                <div id="form-create-users">
                    <p><b>Create User Account</b></p>
                    <form autocomplete="off" onSubmit="return registerUsers()" method="post" id="registration-form">
					<div class="field-row">
                            <img src="image/user.png" width="8%" height="auto">
                            <input placeholder="Username" type="text" name="username" id="username" required>
                        </div>
					
                        <div class="field-row">
                            <img src="image/user.png" width="8%" height="auto">
                            <input placeholder="First name" type="text" name="firstname" id="firstname" required>
                        </div>
                        <div class="field-row">
                            <img src="image/user.png" width="8%" height="auto">
                            <input placeholder="Last name" type="text" name="lastname" id="lastname" required>
                        </div>
						<div class="field-row">
                            <img src="image/address.png" width="8%" height="auto">
                            <input placeholder="Email address" type="email" name="email" id="email" required>
                        </div>
                        <div class="field-row">
                            <img src="image/id-card.png" width="8%" height="auto">
                            <input placeholder="IC number" type="number" name="icnumber" id="icnumber" maxlength="12" required>
                        </div>
                        <div class="field-row">
                            <img src="image/telephone.png" width="8%" height="auto">
                            <input placeholder="Phone number" type="tel" name="phonenumber" id="phonenumber" maxlength="11" required>
                        </div>
                        
                        
                        <div class="field-row">
                            <img src="image/password.png" width="8%" height="auto">
                            <input placeholder="Password" type="password" name="inpassword" id="inpassword" maxlength="6" required>
                        </div>
                        <div class="field-row">
                            <img src="image/password.png" width="8%" height="auto">
                            <input placeholder="Confirm password" type="password" name="confpassword" id="confpassword" required>
                        </div>
						
						
						 
                        <div class="field-column">
                            <button>Create Account</button>
                            <button type="reset" style="margin-top: 20px;">Clear Form</button>
                        </div>
                    </form>
                </div>
                <div id="form-view-users">
                    <p><b>View User Account</b></p>
                    <form autocomplete="off" onSubmit="return viewUsers('searchusername','view-user-modal','view-user-modal-bg')">
                        <div class="field-row">
                            <img src="image/user.png" width="8%" height="auto">
                            <input placeholder="Username" type="text" name="username" id="searchusername" required>
                        </div>
                        <div class="field-column">
                            <button>View Account</button>
                            <button type="reset" style="margin-top: 20px;">Clear Form</button>
                        </div>
                    </form>
                </div>
                <div id="form-delete-users">
                    <p><b>Delete User Account</b></p>
                    <form autocomplete="off" onSubmit="return viewUsers('deleteusername','delete-user-modal','delete-user-modal-bg')">
                        <div class="field-row">
                            <img src="image/user.png" width="8%" height="auto">
                            <input placeholder="Username" type="text" name="username" id="deleteusername" required>
                        </div>
                        <div class="field-column">
                            <button>Delete Account</button>
                            <button type="reset" style="margin-top: 20px;">Clear Form</button>
                        </div>
                    </form>
                </div>
				
                <div id="form-update-users">
                    <p><b>Update User Account</b></p>
                    <form autocomplete="off" onSubmit="return retrieveInfo()" id="search-update-user">
                        <div class="field-row">
                            <img src="image/user.png" width="8%" height="auto">
                            <input placeholder="Username" type="text" name="username" id="update-account-username" required>
                        </div>
						
                        <div class="field-column">
                            <button>Update Account</button>
                            <button type="reset" style="margin-top: 20px;">Clear Form</button>
                        </div>
                    </form>
                    <form autocomplete="off" onSubmit="return updateUsers()" method="post" id="update-form">
                        <div class="field-row">
                            <img src="image/user.png" width="8%" height="auto">
                            <input placeholder="First name" type="text" name="firstname" id="updatefirstname" required>
                        </div>
                        <div class="field-row">
                            <img src="image/user.png" width="8%" height="auto">
                            <input placeholder="Last name" type="text" name="lastname" id="updatelastname" required>
                        </div>
                        <div class="field-row">
                            <img src="image/id-card.png" width="8%" height="auto">
                            <input placeholder="IC number" type="number" name="icnumber" id="updateicnumber" maxlength="12" required>
                        </div>
                        <div class="field-row">
                            <img src="image/telephone.png" width="8%" height="auto">
                            <input placeholder="Phone number" type="tel" name="phonenumber" id="updatephonenumber" maxlength="11" required>
                        </div>
                        
                        <div class="field-row">
                            <img src="image/address.png" width="8%" height="auto">
                            <input placeholder="Email address" type="email" name="email" id="updateemail" required>
                        </div>
                        
                        <div class="field-row">
                            <img src="image/user.png" width="8%" height="auto">
                            <input placeholder="Username" type="text" name="username" id="updateusername" disabled>
                        </div>
                        <div class="field-row">
                            <img src="image/password.png" width="8%" height="auto">
                            <input placeholder="Password" type="password" name="inpassword" id="updateinpassword" maxlength="6" required>
                        </div>
                        <div class="field-row">
                            <img src="image/password.png" width="8%" height="auto">
                            <input placeholder="Confirm password" type="password" name="confpassword" id="updateconfpassword" required>
                        </div>
                        <div class="field-column">
                            <button>Update Account</button>
                            <button type="button" style="margin-top: 20px;" id="cancel-update">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
			<footer><center>&copy; Developed By Betsy Pati, Nur Baqiyah, Siti Hamizah and Nurain Batrisyia</center></footer></div>
        </div>
    </body>
</html>