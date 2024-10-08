//  TIME IN

function time_image(id){
	document.querySelector('.container-time-in').style.display='Flex';


$.ajax({
        type: "GET",
        url: "driver_view_img_entry.php",
        data: {
          time_in_id: id,
        },
        dataType: "json",
        success:function(data){

            
            id = data.id;
            Image = data.image_in;

            console.log(data.id);
         
            console.log(Image);
            
     	
    
        // document.getElementById('img').src = "../../mobile-application/option-entry/Image-entry/640ae4bee3caa9.89009731.jpg";
        document.getElementById('img-in').src = "../../mobile-application/option-entry/Image-entry/".concat(Image);

        }
    });

}

// TIME OUT


// function time_out_img(id){
//     document.querySelector('#Time_Out').style.display='Flex';


//     $.ajax({
//         type: "GET",
//         url: "driver_view_img_entry.php",
//         data: {
//           time_out_id: id,
//         },
//         dataType: "json",
//         success:function(data){

            
//             id = data.id;
//             Image = data.image_out;
            
        
    
//         // document.getElementById('img').src = "../../mobile-application/option-entry/Image-entry/640ae4bee3caa9.89009731.jpg";
//         document.getElementById('img-out').src = "../../mobile-application/option-entry/Image-entry/".concat(Image);

//         }
//     });




// }

// // OT


// function time_ot_img(id){
//     document.querySelector('#Time_OT').style.display='Flex';


//     $.ajax({
//         type: "GET",
//         url: "driver_view_img_entry.php",
//         data: {
//           time_ot_id: id,
//         },
//         dataType: "json",
//         success:function(data){

            
//             id = data.id;
//             Image = data.image_ot;
            
        
    
//         // document.getElementById('img').src = "../../mobile-application/option-entry/Image-entry/640ae4bee3caa9.89009731.jpg";
//         document.getElementById('img-ot').src = "../../mobile-application/option-entry/Image-entry/".concat(Image);

//         }
//     });




// }







// // 


function close(){
    document.querySelector('.container-time-in').style.display='None';
}