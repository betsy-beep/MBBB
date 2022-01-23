function validateLogin() {
	var matricNo = document.getElementById('matricNo');
	var matriccheck = /[^a-zA-Z@$!%*?&,.]$/;
	var psw = document.getElementById('psw');
	var pswcheck = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])([a-zA-Z0-9@$!%*?&]{6,})$/;

	if (document.myform.matricNo.value=="") {
		alert("Please enter your matric Number!");
		document.myform.matricNo.focus();
		return false;
	} if (!matriccheck.test(matricNo.value)) {
		alert("Please enter matric Number number with a correct format.");
		document.myform.matricNo.focus();
		return false;
	}
	
	else if (document.myform.psw.value=="") {
		alert("Please enter your password.");
		document.myform.psw.focus();
		return false;
	} if (!pswcheck.test(psw.value)) {
		alert("Your password must have only 6 characters that contain one uppercase letter, one lowercase letter, one special character and one number.");
		document.myform.psw.focus();
		return false;
	}
}


