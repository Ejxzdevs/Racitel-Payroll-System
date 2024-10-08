function open_record_view(id){
	document.querySelector('.container_view_record_info').style.display="Flex";	
	
	// console.log("HELLO");
	console.log(id);

	$.ajax({
        type: "GET",
        url: "record_view_entry.php",
        data: {
          id: id,
        },
        dataType: "json",
        success:function(data){

        // console.log(data.id);
        // console.log(data.emp_id);

  			//console.log(data.id);	
  			//console.log(data.image);
        // document.getElementById('image').src = "../employees/".concat(data.image);
       	document.getElementById('emp_id').textContent = data.id;
       	document.getElementById('name').textContent = data.firstname + " " + data.lastname;
       	document.getElementById('date').textContent = data.date;
       	// document.getElementById('department').textContent = data.department;
     		// document.getElementById('position').textContent = data.position;
      // document.getElementById('schedule_type').textContent = data.sched_id;
     // document.getElementById('schedule_time').textContent = data.time_start + " - " + data.time_end;
		document.getElementById('time_in').textContent = data.in;
		document.getElementById('late').textContent = data.late;
		document.getElementById('time_out').textContent = data.out;
		document.getElementById('undertime').textContent = data.undertime;
		document.getElementById('regular_hours').textContent = data.regular;
		document.getElementById('overtime_hours').textContent = data.overtime;
		document.getElementById('total_hours').textContent = data.hours_worked;

      
         
      
          }
    });

}
function close_record_view(){
		document.querySelector('.container_view_record_info').style.display="None";	
	}