var prevSelected, prevFormViewed;
var order_qty = 0;
var order_list = {};
var latest_id = 0;

document.addEventListener("DOMContentLoaded", function(a){

    prevSelected = document.getElementById('create-transactions');
    prevSelected.classList.remove('action');
    prevSelected.classList.add('action-disabled');
    prevFormViewed = document.getElementById('form-create-transactions');
    
    document.getElementById('transactiondate').addEventListener("focusin", function(e){

        var date = '';
        if(document.getElementById('transactiondate').value != ""){

            date = document.getElementById('transactiondate').value;
        }
        document.getElementById('transactiondate').type = 'date';
        document.getElementById('transactiondate').value = date;
    });

    document.getElementById('transactiondate').addEventListener("focusout", function(e){

        var date = '';
        if(document.getElementById('transactiondate').value != ""){

            date = document.getElementById('transactiondate').value;
        }
        document.getElementById('transactiondate').type = 'text';
        document.getElementById('transactiondate').value = date;
    });

    document.getElementById('create-transaction-modal-button').addEventListener("mousedown", function(b){

        anime({targets: '#create-transaction-modal-bg', opacity: ['100%','0%'], duration: 200, easing: 'linear', complete: function(){

            document.getElementById('create-transaction-modal').removeChild(document.getElementById('create-transaction-modal').childNodes[0]);
            document.getElementById('create-transaction-modal-bg').style.display = 'none';
        }});
    });

    document.getElementById('view-transaction-modal-button').addEventListener("mousedown", function(b){

        anime({targets: '#view-transaction-modal-bg', opacity: ['100%','0%'], duration: 200, easing: 'linear', complete: function(){
            
            document.getElementById('view-transaction-modal').removeChild(document.getElementById('view-transaction-modal').childNodes[0]);
            document.getElementById('view-transaction-modal-bg').style.display = 'none';
        }});
    });

    document.getElementById('delete-transaction-modal-button').addEventListener("mousedown", function(b){

    	var search_id = document.getElementById('delete-transaction-id').value;
		var modal = document.getElementById('delete-transaction-modal');
		var delete_buttons_group = document.getElementById('delete-modal-buttons');

		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){

			if(this.readyState == 4 && this.status == 200){

				var feedback = this.responseText;
				var message_pack = document.createElement('DIV');
				message_pack.innerHTML = feedback;
				document.getElementById('delete-transaction-modal').removeChild(document.getElementById('delete-transaction-modal').childNodes[0]);
				modal.insertBefore(message_pack, modal.childNodes[0]);
				delete_buttons_group.style.display = 'none';
			}
		};

		xmlhttp.open('GET', 'admin_delete_transactions.php?transaction-id='+search_id);
		xmlhttp.send();

        anime({targets: '#delete-transaction-modal-bg', opacity: ['100%','0%'], duration: 200, easing: 'linear', delay:1000, complete: function(){

            document.getElementById('delete-transaction-modal').removeChild(document.getElementById('delete-transaction-modal').childNodes[0]);
            document.getElementById('delete-transaction-modal-bg').style.display = 'none';
        }});
    });

    document.getElementById('not-delete-transaction-modal-button').addEventListener("mousedown", function(b){

        anime({targets: '#delete-transaction-modal-bg', opacity: ['100%','0%'], duration: 200, easing: 'linear', complete: function(){
            
            document.getElementById('delete-transaction-modal').removeChild(document.getElementById('delete-transaction-modal').childNodes[0]);
            document.getElementById('delete-transaction-modal-bg').style.display = 'none';
        }});
    });

    document.getElementById('not-found-delete-button').addEventListener("mousedown", function(c){

    	anime({targets: '#delete-transaction-modal-bg', opacity: ['100%','0%'], duration: 200, easing: 'linear', complete: function(){
            
            document.getElementById('delete-transaction-modal').removeChild(document.getElementById('delete-transaction-modal').childNodes[0]);
            document.getElementById('delete-transaction-modal-bg').style.display = 'none';
            document.getElementById('delete-modal-buttons').style.display = 'flex';
			document.getElementById('not-found-delete-button').style.display = 'none';
        }});
    });

    document.getElementById('cancel-update').addEventListener("mousedown", function(d){

        removeAllRows('update-form','update-ordered-time-table','update-transaction-desc','update-transaction-hour','update-transaction-time');

    	anime({targets: '#update-form', opacity:['100%','0%'], duration: 200, easing: 'linear', complete: function(){

    		document.getElementById('update-form').style.display = 'none';
			document.getElementById('search-update-transaction').style.display = 'flex';
			anime({targets: '#search-update-transaction', opacity:['0%','100%'], duration: 200, easing: 'linear'});
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

function addRow(table,row_prototype,transaction_desc,create-transaction-hour){

    var data = {
        'item-info': document.getElementById(create-transaction-hour).value,
        'item-quantity': document.getElementById(transaction_desc).value
    };

    var modal = document.getElementById('create-transaction-modal');

    if(!validateOrder(data, modal)){

        document.getElementById('create-transaction-modal-bg').style.display = 'flex';
        anime({targets: '#create-transaction-modal-bg', opacity: ['0%','100%'], duration: 200, easing: 'linear'});
    }else{

        var item_info = data['item-info'].split('^');
        var isReplace = false; 
        var replace_index = 'index-';
        for(var index in order_list){

            if(item_info[0] == index){

                replace_index += index;
                order_list[index] = data['item-quantity'];
                isReplace = true;
                break;
            }
        }

        if(isReplace){

            var replace = document.getElementById(replace_index).childNodes[5];
            replace.innerHTML = data['item-quantity'];
            document.getElementById(transaction_desc).value = "";
            document.getElementById(create-transaction-hour).value = "";
            //console.log(order_list);
        }else{

            //console.log("HELLO");
            var clone_element = document.getElementById(row_prototype).cloneNode(true);
            clone_element.setAttribute('id','index-'+item_info[0]);
            clone_element.children[0].innerHTML = item_info[1];
            clone_element.children[1].innerHTML = item_info[0];
            clone_element.children[2].innerHTML = data['item-quantity'];
            document.getElementById(transaction_desc).value = "";
            document.getElementById(create-transaction-hour).value = "";
            document.getElementById(table).appendChild(clone_element);
            anime({targets: '#'+clone_element.id, opacity:['0%','100%'], duration: 200, easing: 'linear'});

            var key = item_info[0];
            order_list[key] = data['item-quantity'];
            //console.log(order_list);
            ++order_qty;
        }
    }
}

function removeRow(button_row){

    var parent_element = button_row.parentElement;
    var key = parent_element.id.substring(parent_element.id.indexOf('-') + 1);
    anime({targets: '#'+parent_element.id, opacity:['100%','0%'], duration: 100, easing: 'linear', complete: function(){

        delete order_list[key];
        parent_element.remove();
        //console.log(order_list);
    }});
    --order_qty;
}

function removeAllRows(form,table,transaction_desc,create-transaction-hour){

    document.getElementById('create-transactions-form').reset();
    var order_rows = document.getElementById('ordered-time-table').children.length;
    var key = '';
    var parent_element = '';
    
    while(document.getElementById('ordered-time-table').children.length > 1){

        parent_element = document.getElementById('ordered-time-table').childNodes[2];
        key = parent_element.id.substring(parent_element.id.indexOf('-') + 1);
        delete order_list[key];
        document.getElementById('ordered-time-table').removeChild(parent_element);
        //console.log(order_list);
    }
    document.getElementById('create-transaction-desc').value = "";
    document.getElementById('create-transaction-hour').value = "";
    order_qty = 0;
}

function viewTransactions(input_id, form_modal, modal_bg){

    var search_id = document.getElementById(input_id).value;
	var modal = document.getElementById(form_modal);

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function(){

		if(this.readyState == 4 && this.status == 200){

			var result_pack = document.createElement('DIV');
			result_pack.setAttribute('style','display:flex; flex-direction:row; justify-content:center; margin-bottom:20px;');
			if((this.responseText).search('error') < 0 && (this.responseText).search('Error') < 0){

				result_pack.innerHTML = this.responseText;
				document.getElementById('not-found-delete-button').style.display = 'none';
			}else{

				if(form_modal == 'delete-transaction-modal'){

					document.getElementById('delete-modal-buttons').style.display = 'none';
					document.getElementById('not-found-delete-button').style.display = 'flex';
                }
                result_pack.innerHTML = this.responseText;
            }
            modal.insertBefore(result_pack, modal.childNodes[0]);
			//alert(show_result.innerHTML);
		}
	};

	xmlhttp.open('GET', 'admin_view_transactions.php?transaction-id='+ search_id);
	xmlhttp.send();
	document.getElementById(modal_bg).style.display = 'flex';
    anime({targets: '#'+modal_bg, opacity: ['0%','100%'], duration: 200, easing: 'linear'});
    return false;
}

function registerTransactions(){

    var data = {
        'bookingid': document.getElementById('bookingid').value,
        'transactiondate': document.getElementById('transactiondate').value
	'transactiontime': document.getElementById('transactiontime').value
	
    };

    for(var index in order_list){

        data[index] = order_list[index];
    }

    var modal = document.getElementById('create-transaction-modal');

    if(validateForm(data, modal)){

        document.getElementById('create-transaction-button').disabled = true;
        order_qty = 0;
        var parameters = '';
        for(var index in data){

            parameters += '&'+index+'='+data[index];
        }
        //console.log(parameters);
        var xmlhttp = new XMLHttpRequest();
    	var url = 'admin_create_transactions.php';
    		
    	xmlhttp.open('POST',url,true);

    	xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    	xmlhttp.onreadystatechange = function(){

    		if(this.readyState == 4 && this.status == 200) {
                
                //alert(this.responseText);
				var feedback = document.createElement('P');
		        feedback.innerHTML = this.responseText;
                modal.insertBefore(feedback, modal.childNodes[0]);
                
                document.getElementById('create-transaction-modal-bg').style.display = 'flex';
                anime({targets: '#create-transaction-modal-bg', opacity: ['0%','100%'], duration: 200, easing: 'linear'});
                document.getElementById('create-transaction-button').disabled = false;
                
                removeAllRows();
			}
    	};

    	xmlhttp.send(parameters);
    }else{

        document.getElementById('create-transaction-modal-bg').style.display = 'flex';
        anime({targets: '#create-transaction-modal-bg', opacity: ['0%','100%'], duration: 200, easing: 'linear'});
    }

	return false;
}

function updateTransactions(){

    var data = {
        'transaction-id': latest_id,
        'transaction-bookingid': document.getElementById('update-transaction-bookingid').value,
        'transaction-date': document.getElementById('update-transaction-date').value
    };

    for(var index in order_list){

        data[index] = order_list[index];
    }

    var modal = document.getElementById('create-transaction-modal');

    if(validateForm(data, modal)){

        document.getElementById('create-transaction-button').disabled = true;
        order_qty = 0;
        var parameters = '';
        for(var index in data){

            parameters += '&'+index+'='+data[index];
        }
        //console.log(parameters);
        var xmlhttp = new XMLHttpRequest();
    	var url = 'admin_update_transactions.php';
    		
    	xmlhttp.open('POST',url,true);

    	xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    	xmlhttp.onreadystatechange = function(){

    		if(this.readyState == 4 && this.status == 200) {
                
                //alert(this.responseText);
				var feedback = document.createElement('P');
		        feedback.innerHTML = this.responseText;
                modal.insertBefore(feedback, modal.childNodes[0]);
                
                document.getElementById('create-transaction-modal-bg').style.display = 'flex';
                anime({targets: '#create-transaction-modal-bg', opacity: ['0%','100%'], duration: 200, easing: 'linear'});
                document.getElementById('create-transaction-button').disabled = false;
                
                removeAllRows();
			}
    	};

    	xmlhttp.send(parameters);
    }else{

        document.getElementById('create-transaction-modal-bg').style.display = 'flex';
        anime({targets: '#create-transaction-modal-bg', opacity: ['0%','100%'], duration: 200, easing: 'linear'});
    }

	return false;
}

function validateOrder(data, modal){

    var valid = true;

    var message_pack = document.createElement('DIV');
    if(data['item-info'] == ""){

        var err = document.createElement('P');
        err.innerHTML = "<b>Please choose the transaction hour<b>!";
        message_pack.appendChild(err);
        modal.insertBefore(message_pack, modal.childNodes[0]);
        valid = false;
    }

    if(data['item-quantity'] == ""){

        var err = document.createElement('P');
        err.innerHTML = "<b>Just put '-' if there is no other request<b>!";
        message_pack.appendChild(err);
        modal.insertBefore(message_pack, modal.childNodes[0]);
        valid = false;
    }else if(parseInt(data['item-quantity']) <= 0){

        var err = document.createElement('P');
        err.innerHTML = "<b>Any specific request?<b>!";
        message_pack.appendChild(err);
        modal.insertBefore(message_pack, modal.childNodes[0]);
        valid = false;
    }

    //console.log(data);

    return valid;
}

function validateForm(data, modal){

    var valid = true;

    var chosen_date = new Date(data['transaction-date']);
    var current_date = new Date();
    //var current_date = date.getFullYear()+'-'+((date.getMonth()+1) < 10 ? ('0'+(date.getMonth()+1)):(date.getMonth()+1))+'-'+(date.getDate() < 10 ? ('0'+date.getDate()):date.getDate());
    //alert(chosen_date);
    var message_pack = document.createElement('DIV');
    if(chosen_date > current_date){

        var err = document.createElement('P');
        err.innerHTML = "<b>Please select another date<b>!";
        message_pack.appendChild(err);
        modal.insertBefore(message_pack, modal.childNodes[0]);
        valid = false;
    }

    if(order_qty == 0){

        var err = document.createElement('P');
        err.innerHTML = "<b>Please insert at least no of participant<b>!";
        message_pack.appendChild(err);
        modal.insertBefore(message_pack, modal.childNodes[0]);
        valid = false;
    }
    return valid;
}

function retrieveInfo(){

    var search_id = document.getElementById('search-update-transaction-id').value;
	var modal = document.getElementById('create-transaction-modal');
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function(){

		if(this.readyState == 4 && this.status == 200){

			if(this.responseText != "" && this.responseText != "Database query error!"){

				var result = (this.responseText).split(' ');
                
                latest_id = result[0];
                document.getElementById('update-transaction-bookingid').value = result[1];
                document.getElementById('update-transaction-date').value = result[2];
                result.splice(0,3);
                //console.log(result);
                var transaction_order_info;
                var i = 0;
                while(i < result.length){

                    transaction_order_info = result[i].split('\\');
                    document.getElementById('update-transaction-hour').value = transaction_order_info[1]+'^'+(transaction_order_info[0].replace(/\^/g,' '));
                    document.getElementById('update-transaction-desc').value = transaction_order_info[2];
                    
                    transaction_order_info.splice(0,transaction_order_info.length);
                    addRow('update-ordered-time-table','update-row-prototype','update-transaction-desc','update-transaction-hour');
                    ++i;
                }
                result.splice(0,result.length);

				anime({targets: '#search-update-transaction', opacity:['100%','0%'], duration: 200, easing: 'linear', complete: function(){

					document.getElementById('search-update-transaction').style.display = 'none';
					document.getElementById('update-form').style.display = 'flex';
					anime({targets: '#update-form', opacity:['0%','100%'], duration: 200, easing: 'linear'});
				}});
			}else if(this.responseText == "Database query error!"){

				var message_pack = document.createElement('DIV');
				var err = document.createElement('P');
		        err.innerHTML = "<b>Database query error</b>!";
		        message_pack.appendChild(err);
		        modal.insertBefore(message_pack, modal.childNodes[0]);
		        document.getElementById('create-transaction-modal-bg').style.display = 'flex';
    			anime({targets: '#create-transaction-modal-bg', opacity: ['0%','100%'], duration: 200, easing: 'linear'});
			}else{
                
				var message_pack = document.createElement('DIV');
				var err = document.createElement('P');
		        err.innerHTML = "<b>Transaction ID "+search_id+" does not exist</b>!";
		        message_pack.appendChild(err);
		        modal.insertBefore(message_pack, modal.childNodes[0]);
		        document.getElementById('create-transaction-modal-bg').style.display = 'flex';
    			anime({targets: '#create-transaction-modal-bg', opacity: ['0%','100%'], duration: 200, easing: 'linear'});
			}
		}
	};

	xmlhttp.open('GET', 'admin_retrieve_transaction_info.php?transaction-id='+search_id);
	xmlhttp.send();

	return false;
}