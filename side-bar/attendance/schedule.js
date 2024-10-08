// time in /////////////////////////////////
document.getElementById("time-in").addEventListener("click", function(){
document.querySelector(".pop-up").style.display="flex";

	setInterval(()=>{ 
	
	const time = document.querySelector('#clock-in');
	let date = new Date();
	let hours = date.getHours();
	let minutes = date.getMinutes();
	let seconds = date.getSeconds();
	let day_night = "AM";

		if(hours > 12 ){
			day_night = "PM";
			hours = hours - 12;
			}
		if(hours < 10 ){
			hours = "0" + hours;
		}
		if(minutes < 10 ) {
			minutes = "0" + minutes;
		}
		if(seconds < 10 ) {
		seconds = "0" + seconds;
		}

		time.textContent = hours + ":" + minutes +":" + seconds + " " + day_night;
		}

);

	
})

document.getElementById("time-close").addEventListener("click",function(){
document.querySelector(".pop-up").style.display="none"; })





// time out ////////////////////////////////////////////
document.getElementById("time-out").addEventListener("click", function(){
document.querySelector(".pop-up-time-out").style.display="flex";

setInterval( ()=> { 


	const time = document.querySelector('#clock-out');
	let date = new Date();
	let hours = date.getHours();
	let minutes = date.getMinutes();
	let seconds = date.getSeconds();
	let day_night = "AM";

	if (hours > 12 ){
		day_night = "PM";
		hours = hours - 12;
	}
	if (hours < 10 ){
		hours = "0" + hours;
	}
	if (minutes < 10 ) {
		minutes = "0" + minutes;
	}
	if (seconds < 10 ) {
		seconds = "0" + seconds;
	}

	time.textContent = hours + ":" + minutes +":" + seconds + " " + day_night;
});

})

document.getElementById("time-out-close").addEventListener("click",function(){
document.querySelector(".pop-up-time-out").style.display="none";
		
})



// time ot ///////////////////////////////////////
document.getElementById("ot").addEventListener("click", function(){
document.querySelector(".pop-up-ot").style.display="flex";

setInterval(()=> { 


	const time = document.querySelector('#clock-ot');
	let date = new Date();
	let hours = date.getHours();
	let minutes = date.getMinutes();
	let seconds = date.getSeconds();
	let day_night = "AM";

	if (hours > 12 ){
		day_night = "PM";
		hours = hours - 12;
	}
	if (hours < 10 ){
		hours = "0" + hours;
	}
	if (minutes < 10 ) {
		minutes = "0" + minutes;
	}
	if (seconds < 10 ) {
		seconds = "0" + seconds;
	}

	time.textContent = hours + ":" + minutes +":" + seconds + " " + day_night;
});

})



document.getElementById("ot-close").addEventListener("click",function(){
document.querySelector(".pop-up-ot").style.display="none";
})









// view time entry info

function time_info(id){
	document.querySelector('.container_view_time_info').style.display="Flex";	
	
	console.log("HELLO");
	console.log(id);

	$.ajax({
        type: "GET",
        url: "view_time_entry.php",
        data: {
          id: id,
        },
        dataType: "json",
        success:function(data){


        console.log(data.id);	
        console.log(data.image);
        document.getElementById('image').src = "../employees/".concat(data.image);
       	document.getElementById('emp_id').textContent =data.id;
       	document.getElementById('name').textContent = data.firstname + " " + data.lastname;
       	document.getElementById('department').textContent = data.department;
       	document.getElementById('position').textContent = data.position;
       	document.getElementById('schedule_type').textContent = data.schedule;
       	document.getElementById('schedule_time').textContent = data.time_start + " - " + data.time_end;
		document.getElementById('time_in').textContent = data.time_in;
		document.getElementById('late').textContent = data.late;
		document.getElementById('time_out').textContent = data.time_out;
		document.getElementById('undertime').textContent = data.undertime;
		document.getElementById('regular_hours').textContent = data.regular_hours;
		document.getElementById('overtime_hours').textContent = data.overtime;
		document.getElementById('total_hours').textContent = data.total_hours;
		document.getElementById('status').textContent = data.status;
      
         
      
          }
    });
}


function close_time_info(){
	document.querySelector('.container_view_time_info').style.display="None";	
}


// driver

function time_entry_image(id){
	document.querySelector('.container-driver-image').style.display="Flex";

	console.log(id);
$.ajax({
        type: "GET",
        url: "driver_view_img_entry.php",
        data: {
         id: id,
        },
        dataType: "json",
        success:function(data){

            
            id = data.id;
            Image = data.image_in;

            console.log(data.id);
         
            console.log(Image);
            
     	console.log(data.time_in);
    
        // document.getElementById('img').src = "../../mobile-application/option-entry/Image-entry/640ae4bee3caa9.89009731.jpg";
        document.getElementById('img-in').src = "../../mobile-application/option-entry/Image-entry/".concat(data.image_in);
        document.getElementById('in').textContent = data.time_in;
         document.getElementById('img-out').src = "../../mobile-application/option-entry/Image-entry/".concat(data.image_out);
        document.getElementById('out').textContent = data.time_out;
         document.getElementById('img-ot').src = "../../mobile-application/option-entry/Image-entry/".concat(data.image_ot);
        // document.getElementById('ot').textContent = data.time_ot;

        }
    });

}

function close_time_entry_image(){
	document.querySelector('.container-driver-image').style.display="None";
}