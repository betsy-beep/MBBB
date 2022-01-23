var prevSelected, prevFormViewed;

document.addEventListener("DOMContentLoaded", function(a){

    prevSelected = document.getElementById('create-items');
    prevSelected.classList.remove('action');
    prevSelected.classList.add('action-disabled');
    prevFormViewed = document.getElementById('form-create-items');
	
	
	document.getElementById('create-item-modal-button').addEventListener("mousedown", function(b){

        anime({targets: '#create-item-modal-bg', opacity: ['100%','0%'], duration: 200, easing: 'linear', complete: function(){

            document.getElementById('create-item-modal').removeChild(document.getElementById('create-item-modal').childNodes[0]);
            document.getElementById('create-item-modal-bg').style.display = 'none';
        }});
    });

	    document.getElementById('bookingdate').addEventListener("focusin", function(e){

        var date = '';
        if(document.getElementById('bookingdate').value != ""){

            date = document.getElementById('bookingdate').value;
        }
        document.getElementById('bookingdate').type = 'date';
        document.getElementById('bookingdate').value = date;
    });

    document.getElementById('bookingdate').addEventListener("focusout", function(e){

        var date = '';
        if(document.getElementById('bookingdate').value != ""){

            date = document.getElementById('bookingdate').value;
        }
        document.getElementById('bookingdate').type = 'text';
        document.getElementById('bookingdate').value = date;
    });


   

    document.getElementById('view-item-modal-button').addEventListener("mousedown", function(b){

        anime({targets: '#view-item-modal-bg', opacity: ['100%','0%'], duration: 200, easing: 'linear', complete: function(){
            
            document.getElementById('view-item-modal').removeChild(document.getElementById('view-item-modal').childNodes[0]);
            document.getElementById('view-item-modal-bg').style.display = 'none';
        }});
    });

    document.getElementById('delete-item-modal-button').addEventListener("mousedown", function(b){

    	var search_id = document.getElementById('delete-item-id').value;
		var modal = document.getElementById('delete-item-modal');
		var delete_buttons_group = document.getElementById('delete-modal-buttons');

		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){

			if(this.readyState == 4 && this.status == 200){

				var feedback = this.responseText;
				var message_pack = document.createElement('DIV');
				message_pack.innerHTML = feedback;
				document.getElementById('delete-item-modal').removeChild(document.getElementById('delete-item-modal').childNodes[0]);
				modal.insertBefore(message_pack, modal.childNodes[0]);
				delete_buttons_group.style.display = 'none';
			}
		};

		xmlhttp.open('GET', 'admin_delete_items.php?itemid='+ search_id);
		xmlhttp.send();

        anime({targets: '#delete-item-modal-bg', opacity: ['100%','0%'], duration: 2500, easing: 'linear', delay:2500, complete: function(){

            document.getElementById('delete-item-modal').removeChild(document.getElementById('delete-item-modal').childNodes[0]);
            document.getElementById('delete-item-modal-bg').style.display = 'none';
        }});
    });

    document.getElementById('not-delete-item-modal-button').addEventListener("mousedown", function(b){

        anime({targets: '#delete-item-modal-bg', opacity: ['100%','0%'], duration: 200, easing: 'linear', complete: function(){
            
            document.getElementById('delete-item-modal').removeChild(document.getElementById('delete-item-modal').childNodes[0]);
            document.getElementById('delete-item-modal-bg').style.display = 'none';
        }});
    });

    document.getElementById('not-found-delete-button').addEventListener("mousedown", function(c){

    	anime({targets: '#delete-item-modal-bg', opacity: ['100%','0%'], duration: 200, easing: 'linear', complete: function(){
            
            document.getElementById('delete-item-modal').removeChild(document.getElementById('delete-item-modal').childNodes[0]);
            document.getElementById('delete-item-modal-bg').style.display = 'none';
            document.getElementById('delete-modal-buttons').style.display = 'flex';
			document.getElementById('not-found-delete-button').style.display = 'none';
        }});
    });

    document.getElementById('cancel-update').addEventListener("mousedown", function(d){

    	anime({targets: '#update-form', opacity:['100%','0%'], duration: 200, easing: 'linear', complete: function(){

    		document.getElementById('update-form').style.display = 'none';
			document.getElementById('search-update-item').style.display = 'flex';
			anime({targets: '#search-update-item', opacity:['0%','100%'], duration: 200, easing: 'linear'});
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

function registerItems(){

    var data = {
		
		'username' : document.getElementById('username').value,
		'bookingtype' : document.getElementById('bookingtype').value,
		'bookingdate' : document.getElementById('bookingdate').value,
		'bookingtime' : document.getElementById('bookingtime').value,
		'bookingcapacity' : document.getElementById('bookingcapacity').value,
		
	};
	//alert(data['booking-type']);
    var modal = document.getElementById('create-item-modal');
    
	if(validate(data, modal)){

		var xmlhttp = new XMLHttpRequest();
    	var url = 'AdminBooking.php';
    	var parameters = '&username='+data['username']+'&bookingtype='+data['bookingtype']+'&bookingdate='+data['bookingdate']+'&bookingtime='+data['bookingtime']+'&bookingcapacity='+data['bookingcapacity'];
    		
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
	document.getElementById('create-item-modal-bg').style.display = 'flex';
    anime({targets: '#create-item-modal-bg', opacity: ['0%','100%'], duration: 200, easing: 'linear'});
	return false;
}

function validate(data, modal){

    var valid = true;

    var message_pack = document.createElement('DIV');

     
	if(data['username'] == ""){

        var err = document.createElement('P');
        err.innerHTML = "Must <b>have</b><b> Username</b>!";
        message_pack.appendChild(err);
        modal.insertBefore(message_pack, modal.childNodes[0]);
        valid = false;
    }else if(data['username'].includes('^')){

        var err = document.createElement('P');
        err.innerHTML = "Character \"^\" is <b>not allowed</b>!";
        message_pack.appendChild(err);
        modal.insertBefore(message_pack, modal.childNodes[0]);
        valid = false;
    }

    if(data['bookingtype'] == ""){

        var err = document.createElement('P');
        err.innerHTML = "Please select <b>room name</b>!";
        message_pack.appendChild(err);
        modal.insertBefore(message_pack, modal.childNodes[0]);
        valid = false;
    }
    //alert(parseFloat(data['bookingtype']));
    if(parseFloat(data['bookingdate']) == 0){
 
        var err = document.createElement('P');
        err.innerHTML = "<strong>Are you <b>sure</b> to book the room on this date </strong>?";
        message_pack.appendChild(err);
        modal.insertBefore(message_pack, modal.childNodes[0]);
        valid = false;
    }else if(parseFloat(data['bookingdate']) < 0){

        var err = document.createElement('P');
        err.innerHTML = "Booking date <b>must</b> be in a<b>date form</b>!";
        message_pack.appendChild(err);
        modal.insertBefore(message_pack, modal.childNodes[0]);
        valid = false;
    }
	if(data['bookingtime'] == ""){

        var err = document.createElement('P');
        err.innerHTML = "Please select <b>booking time</b>!";
        message_pack.appendChild(err);
        modal.insertBefore(message_pack, modal.childNodes[0]);
        valid = false;
    }
    //alert(parseFloat(data['bookingtime']));

	if(data['bookingcapacity'] == ""){

        var err = document.createElement('P');
        err.innerHTML = "Please select <b>booking capacity</b>!";
        message_pack.appendChild(err);
        modal.insertBefore(message_pack, modal.childNodes[0]);
        valid = false;
    }
    //alert(parseFloat(data['bookingcapacity']));

	   
    
    return valid;
}

function viewItems(input_id, form_modal, modal_bg){

    var search_id = document.getElementById(input_id).value;
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

				if(form_modal == 'delete-item-modal'){

					document.getElementById('delete-modal-buttons').style.display = 'none';
					document.getElementById('not-found-delete-button').style.display = 'flex';
				}
				result_pack.innerHTML = '<div><p><b>Booking with this username '+search_id+' does not exist!</b></p></div>';
			}
			//alert(show_result.innerHTML);
			modal.insertBefore(result_pack, modal.childNodes[0]);
		}
	};

	xmlhttp.open('GET', 'admin_view_items.php?itemid='+ search_id);
	xmlhttp.send();
	document.getElementById(modal_bg).style.display = 'flex';
    anime({targets: '#'+modal_bg, opacity: ['0%','100%'], duration: 200, easing: 'linear'});
    return false;
}

function retrieveInfo(){

    var search_id = document.getElementById('search-update-item-id').value;
	var modal = document.getElementById('create-item-modal');
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function(){

		if(this.readyState == 4 && this.status == 200){

			if(this.responseText != "" && this.responseText != "Database query error!"){

				var result = (this.responseText).split(' ');
				
				document.getElementById('update-booking-uid').value = result[0];
				//alert(document.getElementById('update-booking-uid').value);
				document.getElementById('update-booking-type').value = result[1];
				document.getElementById('update-booking-date').value = result[2].replace(/\^/g,' ');
				document.getElementById('update-booking-time').value = result[3];
				document.getElementById('update-booking-capacity').value = result[4];
				

				anime({targets: '#search-update-item', opacity:['100%','0%'], duration: 200, easing: 'linear', complete: function(){

					document.getElementById('search-update-item').style.display = 'none';
					document.getElementById('update-form').style.display = 'flex';
					anime({targets: '#update-form', opacity:['0%','100%'], duration: 200, easing: 'linear'});
				}});
			}else if(this.responseText == "Database query error!"){

				var message_pack = document.createElement('DIV');
				var err = document.createElement('P');
		        err.innerHTML = "<b>Database query error</b>!";
		        message_pack.appendChild(err);
		        modal.insertBefore(message_pack, modal.childNodes[0]);
		        document.getElementById('create-item-modal-bg').style.display = 'flex';
    			anime({targets: '#create-item-modal-bg', opacity: ['0%','100%'], duration: 200, easing: 'linear'});
			}else{

				var message_pack = document.createElement('DIV');
				var err = document.createElement('P');
		        err.innerHTML = "<b>Booking with this username "+search_id+" does not exist</b>!";
		        message_pack.appendChild(err);
		        modal.insertBefore(message_pack, modal.childNodes[0]);
		        document.getElementById('create-item-modal-bg').style.display = 'flex';
    			anime({targets: '#create-item-modal-bg', opacity: ['0%','100%'], duration: 200, easing: 'linear'});
			}
		}
	};

	xmlhttp.open('GET', 'admin_retrieve_item_info.php?itemid='+ search_id);
	xmlhttp.send();

	return false;
}

function updateItems(){

	var data = {
		'username' : document.getElementById('update-booking-uid').value,
		'booking-type' : document.getElementById('update-booking-type').value,
		'booking-date' : document.getElementById('update-booking-date').value,
		'booking-time' : document.getElementById('update-booking-time').value,
		'booking-capacity' : document.getElementById('update-booking-capacity').value,
		
	};
	//alert(data['item-type']);
    var modal = document.getElementById('create-item-modal');
    
	if(validate(data, modal)){

		var xmlhttp = new XMLHttpRequest();
    	var url = 'admin_update_items.php';
    	var parameters = '&username='+data['username']+'&booking-type='+data['booking-type']+'&booking-date='+data['booking-date']+'&booking-time='+data['booking-time']+'&booking-capacity='+data['booking-capacity'];
    		
    	xmlhttp.open('POST',url,true);

    	xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    	xmlhttp.onreadystatechange = function(){

    		if(this.readyState == 4 && this.status == 200) {
				
				var feedback = document.createElement('P');
		        feedback.innerHTML = this.responseText;
				modal.insertBefore(feedback, modal.childNodes[0]);
				
				anime({targets: '#search-update-item', opacity:['0%','100%'], duration: 200, easing: 'linear', complete: function(){

					document.getElementById('search-update-item').style.display = 'flex';
					document.getElementById('update-form').style.display = 'none';
					anime({targets: '#update-form', opacity:['100%','0%'], duration: 200, easing: 'linear'});
				}});
			}
    	};

    	xmlhttp.send(parameters);
	}
	document.getElementById('create-item-modal-bg').style.display = 'flex';
    anime({targets: '#create-item-modal-bg', opacity: ['0%','100%'], duration: 200, easing: 'linear'});
	return false;
}