var attempt = 3; // Variable to count number of attempts.
// Below function Executes on click of login button.
function validate(){
var username = document.getElementById("username").value;
var password = document.getElementById("myInput").value;
if ( username == "Admin" && password == "P@s&42"){
alert ("Login successfully");
window.location = "Homepage.php"; 
return false;
}
else{
attempt --;
alert("You have left "+attempt+" attempt;");
// Disabling fields after 3 attempts.
if( attempt == 0){
document.getElementById("username").disabled = true;
document.getElementById("myInput").disabled = true;
document.getElementById("submit").disabled = true;
return false;
}
}
}