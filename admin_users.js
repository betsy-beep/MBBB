var prevSelected, prevFormViewed;

document.addEventListener("DOMContentLoaded", function(a){

    prevSelected = document.getElementById('create-users');
    prevSelected.classList.remove('action');
    prevSelected.classList.add('action-disabled');
    prevFormViewed = document.getElementById('form-create-users');

    document.getElementById('create-user-modal-button').addEventListener("mousedown", function(b){

        anime({targets: '#create-user-modal-bg', opacity: ['100%','0%'], duration: 200, easing: 'linear', complete: function(){

            document.getElementById('create-user-modal').removeChild(document.getElementById('create-user-modal').childNodes[0]);
            document.getElementById('create-user-modal-bg').style.display = 'none';
        }});
    });
	

    document.getElementById('view-user-modal-button').addEventListener("mousedown", function(b){

        anime({targets: '#view-user-modal-bg', opacity: ['100%','0%'], duration: 200, easing: 'linear', complete: function(){
            
            document.getElementById('view-user-modal').removeChild(document.getElementById('view-user-modal').childNodes[0]);
            document.getElementById('view-user-modal-bg').style.display = 'none';
        }});
    });

    document.getElementById('delete-user-modal-button').addEventListener("mousedown", function(b){

    	var search_username = document.getElementById('deleteusername').value;
		var modal = document.getElementById('delete-user-modal');
		var delete_buttons_group = document.getElementById('delete-modal-buttons');

		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){

			if(this.readyState == 4 && this.status == 200){

				var feedback = this.responseText;
				var message_pack = document.createElement('DIV');
				message_pack.innerHTML = feedback;
				document.getElementById('delete-user-modal').removeChild(document.getElementById('delete-user-modal').childNodes[0]);
				modal.insertBefore(message_pack, modal.childNodes[0]);
				delete_buttons_group.style.display = 'none';
			}
		};

		xmlhttp.open('GET', 'admin_delete_users.php?username='+ search_username);
		xmlhttp.send();

        anime({targets: '#delete-user-modal-bg', opacity: ['100%','0%'], duration: 2500, easing: 'linear', delay:2500, complete: function(){

            document.getElementById('delete-user-modal').removeChild(document.getElementById('delete-user-modal').childNodes[0]);
            document.getElementById('delete-user-modal-bg').style.display = 'none';
        }});
    });

    document.getElementById('not-delete-user-modal-button').addEventListener("mousedown", function(b){

        anime({targets: '#delete-user-modal-bg', opacity: ['100%','0%'], duration: 200, easing: 'linear', complete: function(){
            
            document.getElementById('delete-user-modal').removeChild(document.getElementById('delete-user-modal').childNodes[0]);
            document.getElementById('delete-user-modal-bg').style.display = 'none';
        }});
    });

    document.getElementById('not-found-delete-button').addEventListener("mousedown", function(c){

    	anime({targets: '#delete-user-modal-bg', opacity: ['100%','0%'], duration: 200, easing: 'linear', complete: function(){
            
            document.getElementById('delete-user-modal').removeChild(document.getElementById('delete-user-modal').childNodes[0]);
            document.getElementById('delete-user-modal-bg').style.display = 'none';
            document.getElementById('delete-modal-buttons').style.display = 'flex';
			document.getElementById('not-found-delete-button').style.display = 'none';
        }});
    });

    document.getElementById('cancel-update').addEventListener("mousedown", function(d){

    	anime({targets: '#update-form', opacity:['100%','0%'], duration: 200, easing: 'linear', complete: function(){

    		document.getElementById('update-form').style.display = 'none';
			document.getElementById('search-update-user').style.display = 'flex';
			anime({targets: '#search-update-user', opacity:['0%','100%'], duration: 200, easing: 'linear'});
		}});
    });
});

function selectThisForm(form_element, form_load){
    
    if(prevSelected != form_element){
        
        prevSelected.classList.remove('action-disabled');
        prevSelected.classList.add('action');

        anime({targets: '#'+prevFormViewed.id, opacity:['100%','0%'], duration: 200, easing: 'linear', complete: function(){

    		prevFormViewed.style.display = 'none';
    		form_element.classList.remove('action');
	        form_element.classList.add('action-disabled');
	        form_load.style.display = 'flex';

	        prevSelected = form_element;
	        prevFormViewed = form_load;
			anime({targets: '#'+form_load.id, opacity:['0%','100%'], duration: 200, easing: 'linear'});
		}});
    }
}

function registerUsers(){

	var data = {
		'firstname' : document.getElementById('firstname').value,
		'lastname' : document.getElementById('lastname').value,
		'icnumber' : document.getElementById('icnumber').value,
		'phonenumber' : document.getElementById('phonenumber').value,
		
		'email' : document.getElementById('email').value,
		
		'username' : document.getElementById('username').value,
		'inpassword' : document.getElementById('inpassword').value,
		'confpassword' : document.getElementById('confpassword').value
		
		
	};
	
    var modal = document.getElementById('create-user-modal');

	if(validate(data, modal)){

		var xmlhttp = new XMLHttpRequest();
    	var url = 'AdminUser.php';
    	var parameters = 'firstname='+data['firstname']+'&lastname='+data['lastname']+'&icnumber='+data['icnumber']+'&phonenumber='+data['phonenumber']+'&email='+data['email']+'&username='+data['username']+'&inpassword='+data['inpassword']+'&confpassword='+data['confpassword'];
    		
    	xmlhttp.open('POST',url,true);

    	xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    	xmlhttp.onreadystatechange = function(){

    		if(this.readyState == 4 && this.status == 200) {
				
				var feedback = document.createElement('P');
		        feedback.innerHTML = this.responseText;
		        modal.insertBefore(feedback, modal.childNodes[0]);
			}
    	};

    	xmlhttp.send(parameters);
	}
	document.getElementById('create-user-modal-bg').style.display = 'flex';
    anime({targets: '#create-user-modal-bg', opacity: ['0%','100%'], duration: 200, easing: 'linear'});
	return false;
}

function retrieveInfo(){

	var search_username = document.getElementById('update-account-username').value;
	var modal = document.getElementById('create-user-modal');
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function(){

		if(this.readyState == 4 && this.status == 200){

			if(this.responseText != "" && this.responseText != "Database query error!"){

				var result = (this.responseText).split(' ');

				document.getElementById('firstname').value = result[0];
				document.getElementById('lastname').value = result[1];
				document.getElementById('icnumber').value = result[2];
				document.getElementById('phonenumber').value = result[3];
				document.getElementById('email').value = result[5];
				document.getElementById('username').value = result[7];
				document.getElementById('inpassword').value = result[8];
				document.getElementById('confpassword').value = result[9];


				anime({targets: '#search-update-user', opacity:['100%','0%'], duration: 200, easing: 'linear', complete: function(){

					document.getElementById('search-update-user').style.display = 'none';
					document.getElementById('update-form').style.display = 'flex';
					anime({targets: '#update-form', opacity:['0%','100%'], duration: 200, easing: 'linear'});
				}});
			}else if(this.responseText == "Database query error!"){

				var message_pack = document.createElement('DIV');
				var err = document.createElement('P');
		        err.innerHTML = "<b>Database query error</b>!";
		        message_pack.appendChild(err);
		        modal.insertBefore(message_pack, modal.childNodes[0]);
		        document.getElementById('create-user-modal-bg').style.display = 'flex';
    			anime({targets: '#create-user-modal-bg', opacity: ['0%','100%'], duration: 200, easing: 'linear'});
			}else{

				var message_pack = document.createElement('DIV');
				var err = document.createElement('P');
		        err.innerHTML = "<b>Account does not exist</b>!";
		        message_pack.appendChild(err);
		        modal.insertBefore(message_pack, modal.childNodes[0]);
		        document.getElementById('create-user-modal-bg').style.display = 'flex';
    			anime({targets: '#create-user-modal-bg', opacity: ['0%','100%'], duration: 200, easing: 'linear'});
			}
		}
	};

	xmlhttp.open('GET', 'admin_retrieve_user_info.php?username='+ search_username);
	xmlhttp.send();

	return false;
}

function updateUsers(){

	

	var data = {
		'firstname' : document.getElementById('updatefirstname').value,
		'lastname' : document.getElementById('updatelastname').value,
		'icnumber' : document.getElementById('updateicnumber').value,
		'phonenumber' : document.getElementById('updatephonenumber').value,
		
		'email' : document.getElementById('updateemail').value,
		
		'username' : document.getElementById('updateusername').value,
		'inpassword' : document.getElementById('updateinpassword').value,
		'confpassword' : document.getElementById('updateconfpassword').value
	};
	//alert(data['birthdate']);
    var modal = document.getElementById('create-user-modal');

	if(validate(data, modal)){

		var xmlhttp = new XMLHttpRequest();
    	var url = 'admin_update_users.php';
    	var parameters = 'firstname='+data['firstname']+'&lastname='+data['lastname']+'&icnumber='+data['icnumber']+'&phonenumber='+data['phonenumber']+'&email='+data['email']+'&username='+data['username']+'&inpassword='+data['inpassword']+'&confpassword='+data['confpassword'];
    		
    	xmlhttp.open('POST',url,true);

    	xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    	xmlhttp.onreadystatechange = function(){

    		if(this.readyState == 4 && this.status == 200) {
				
				var feedback = document.createElement('P');
		        feedback.innerHTML = this.responseText;
		        modal.insertBefore(feedback, modal.childNodes[0]);
		        anime({targets: '#search-update-user', opacity:['0%','100%'], duration: 200, easing: 'linear', complete: function(){

					document.getElementById('search-update-user').style.display = 'flex';
					document.getElementById('update-form').style.display = 'none';
					anime({targets: '#update-form', opacity:['100%','0%'], duration: 200, easing: 'linear'});
				}});
			}
    	};

    	xmlhttp.send(parameters);
	}
	document.getElementById('create-user-modal-bg').style.display = 'flex';
    anime({targets: '#create-user-modal-bg', opacity: ['0%','100%'], duration: 200, easing: 'linear'});
	return false;
}

function validate(data, modal){

    var valid = true;

    var name_regex = /^[A-Z][a-z]*/g;
    var phone_number_regex = /^([0-9]{10,11})/g;
    var ic_regex = /^([0-9]{12})/g;
    //regex taken from RC2822 email validation https://www.w3resource.com/javascript/form/email-validation.php
    var email_regex = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;
    var password_regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,6}$/;
    
    var message_pack = document.createElement('UL');

    if(data['firstname'].match(name_regex) != data['firstname']){

        var err = document.createElement('LI');
        err.setAttribute('style','margin-top:10px;');
        err.innerHTML = "First letter of <u>first name</u> must be <b>capitalised</b>!";
        message_pack.appendChild(err);
        modal.insertBefore(message_pack, modal.childNodes[0]);
        valid = false;
	}

    //alert("HALLO");
    if(data['lastname'].match(name_regex) != data['lastname']){

        var err = document.createElement('LI');
        err.setAttribute('style','margin-top:10px;');
        err.innerHTML = "First letter of <u>last name</u> must be <b>capitalised</b>!";
        message_pack.appendChild(err);
        modal.insertBefore(message_pack, modal.childNodes[0]);
        valid = false;
    }

	if(data['firstname'].includes('^')){

        var err = document.createElement('P');
        err.innerHTML = "Character \"^\" is <b>not allowed</b>!";
        message_pack.appendChild(err);
        modal.insertBefore(message_pack, modal.childNodes[0]);
        valid = false;
    }

	if(data['lastname'].includes('^')){
 
        var err = document.createElement('P');
        err.innerHTML = "Character \"^\" is <b>not allowed</b>!";
        message_pack.appendChild(err);
        modal.insertBefore(message_pack, modal.childNodes[0]);
        valid = false;
    }

    if(data['icnumber'].match(ic_regex) != data['icnumber']){

        var err = document.createElement('LI');
        err.setAttribute('style','margin-top:10px;');
        err.innerHTML = "<u>IC number</u> must be <b>12 characters long</b> and consisted of <b>digits only</b>!";
        message_pack.appendChild(err);
        modal.insertBefore(message_pack, modal.childNodes[0]);
        valid = false;
    }

    if(data['phonenumber'].match(phone_number_regex) != data['phonenumber']){
        
        var err = document.createElement('LI');
        err.setAttribute('style','margin-top:10px;');
        err.innerHTML = "<u>Phone number</u> must contain <b>digits only</b> and <b>10-11 characters long</b>!";
        message_pack.appendChild(err);
        modal.insertBefore(message_pack, modal.childNodes[0]);
        valid = false;
    }

    if(data['email'].match(email_regex) != data['email']){

        var err = document.createElement('LI');
        err.setAttribute('style','margin-top:10px;');
        err.innerHTML = "<u>Email address</u> entered must be <b>valid in format</b>!";
        message_pack.appendChild(err);
        modal.insertBefore(message_pack, modal.childNodes[0]);
        valid = false;
    }

    if(!password_regex.test(data['inpassword'])){

        var err = document.createElement('LI');
        err.setAttribute('style','margin-top:10px;');
        err.innerHTML = "<u>Password</u> must contain <b>ONE uppercase</b>, <b>ONE numeric</b>, <b>ONE special character</b>, <b>number</b>, <b>no whitespace</b>, and must be <b>6 digits long</b>!";
        message_pack.appendChild(err);
        modal.insertBefore(message_pack, modal.childNodes[0]);
        valid = false;
    }else if(data['inpassword'] != data['confpassword']){

        var err = document.createElement('LI');
        err.setAttribute('style','margin-top:10px;');
        err.innerHTML = "<u>Confirmation password</u> <b>does not match</b>!";
        message_pack.appendChild(err);
        modal.insertBefore(message_pack, modal.childNodes[0]);
        valid = false;
    }

    return valid;
}

function viewUsers(input_username, form_modal, modal_bg){

	var search_username = document.getElementById(input_username).value;
	var modal = document.getElementById(form_modal);

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function(){

		if(this.readyState == 4 && this.status == 200){

			var result_pack = document.createElement('DIV');
			result_pack.setAttribute('style','display:flex; flex-direction:row; justify-content:center; margin-bottom:20px;');
			if(this.responseText != ""){

				result_pack.innerHTML = this.responseText;
				document.getElementById('not-found-delete-button').style.display = 'none';
			}else{

				if(form_modal == 'delete-user-modal'){

					document.getElementById('delete-modal-buttons').style.display = 'none';
					document.getElementById('not-found-delete-button').style.display = 'flex';
				}
				result_pack.innerHTML = '<div><p><b>Username does not exist!</b></p></div>';
			}
			//alert(show_result.innerHTML);
			modal.insertBefore(result_pack, modal.childNodes[0]);
		}
	};

	xmlhttp.open('GET', 'admin_view_users.php?username='+ search_username);
	xmlhttp.send();
	document.getElementById(modal_bg).style.display = 'flex';
    anime({targets: '#'+modal_bg, opacity: ['0%','100%'], duration: 200, easing: 'linear'});
	return false;
}