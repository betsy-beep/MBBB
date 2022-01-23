function validateRegister() {
	var uname = document.getElementById('uname');
	var fname = document.getElementById('fname');
	var lname = document.getElementById('lname');
	var nmcheck = /^[A-Z]/;
	var email = document.getElementById('email');
	var emcheck = /(?:[a-z0-9!#$%&'*+=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;
	var phoneNo = document.getElementById('phoneNo');
	var nocheck = /^\d{9,10}$/;
	var matricNo = document.getElementById('matricNo');
	var matriccheck = /[^a-zA-Z@$!%*?&,.]$/;
	var psw = document.getElementById('psw');
	var pswcheck = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])([a-zA-Z0-9@$!%*?&]{6,})$/;
	var cpsw = document.getElementById('cpsw');
  
  
if (document.myform.uname.value=="" ||document.myform.uname.value==null) {
		alert("Please enter your username.");
		document.myform.uname.focus();
		return false;
	}
	
  if (document.myform.fname.value=="") {
		alert("Please enter your first name.");
		document.myform.fname.focus();
		return false;
	} if (!nmcheck.test(fname.value)) {
		alert("Use uppercase letter for first character in first name.");
		document.myform.fname.focus();
		return false;
	}



	else if (document.myform.lname.value=="") {
		alert("Please enter your last name.");
		document.myform.lname.focus();
		return false;
	} if (!nmcheck.test(lname.value)){
		alert("Use uppercase letter for first character in last name.");
		document.myform.lname.focus();
		return false;
	}

	
	else if (document.myform.email.value=="") {
		alert("Please enter your email address.");
		document.myform.email.focus();
		return false;
	} if (!emcheck.test(email.value)) {
		alert("Please enter a valid email address in a correct format.");
		document.myform.email.focus();
		return false;
	}

	else if (document.myform.phoneNo.value=="") {
		alert("Please enter your phone number.");
		document.myform.phoneNo.focus();
		return false;
	} if (!nocheck.test(phoneNo.value)) {
		alert("Please enter phone number with a correct format.");
		document.myform.phoneNo.focus();
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

	else if (document.myform.cpsw.value=="") {
		alert("Please enter your confirmed password.");
		document.myform.cpsw.focus();
		return false;
	} if (!pswcheck.test(cpsw.value)) {
		if (psw==cpsw) {
			return true;
		} else{
			alert("Password must be the same.");
			document.myform.cpsw.focus();
			return false;
		}
	}

	else if (document.myform.matricNo.value=="") {
		alert("Please enter your matric Number!");
		document.myform.matricNo.focus();
		return false;
	} if (!matriccheck.test(matricNo.value)) {
		alert("Please enter matric Number number with a correct format.");
		document.myform.matricNo.focus();
		return false;
	}

    
	else {
		alert("You have successfully registered.");
	}

}
