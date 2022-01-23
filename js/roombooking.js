function validateBooking() {
	var room = document.getElementById('room');
	var ddlText = room.options[room.selectedIndex].text;
    var time = document.getElementById('time');
    var ddlText2 = time.options[time.selectedIndex].text;
 	var capacity = document.getElementById('capacity');
    var ddlText3 = capacity.options[capacity.selectedIndex].text;
	
	if(ddlText == "-Select-" || ddlText2 == "-Select-" || ddlText3 == "-Select-"){
		alert("Please fill all the blank");
		return false;
	}
	else if(ddlText.value == "-Select-"){
		alert("Please select a room!");
        document.myform.room.focus();
        return false;
	}
   	else if (ddlText2 == "-Select-") {
        alert("Please select booking time!");
        document.myform.time.focus();
        return false;
   	}
    else if (ddlText3 == "-Select-") {
        alert("Please select capacity!");
         document.myform.capacity.focus();
        return false;
   	}
  
}