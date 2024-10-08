function give_allowance(){
	document.querySelector('.pop-up-give-allowance').style.display="FLEX";
}
function close_allowance(){
	document.querySelector('.pop-up-give-allowance').style.display="NONE";
}

function single_employee(){
	var choose = document.querySelector('#select_emp').value
	
	if(choose == 'All' || choose == 'Regular' || choose == 'Driver' || choose == 'Casual' ){
		document.querySelector('#emp_id').style.display="NONE";
	}else if(choose == 'Single'){
		document.querySelector('#emp_id').style.display="FLEX";
	}
}