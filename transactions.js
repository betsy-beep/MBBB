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
	return valid;
}