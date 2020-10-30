

window.onload = function()
{
	// alert('hellow');
}

// function editclick()
// {
// 	$("#clickid").attr('data-target','#exampleModalLong');
// }

function editclick(val)
{
	// alert(val.getAttribute('data-payment-id'));

	var paymentid = val.getAttribute('data-payment-id');

	// var request = $.ajax({
 //        url:"<?php echo base_url('index.php/Admin_controller/paymentmethodmodalinfo');?>",
 //        type: "post",
 //        data: "val="+paymentid,

 //        success:function(data)
 //        {
 //            // $("#clickid").attr('data-target','#exampleModalLong');
 //           // alert(data);
 //           var obj = JSON.parse(data);
 //            // console.log(obj);
 //            if(obj !== null){
           
 //             $("#paymentmethodname").val(obj.payment_method);
 //             $("#payment_no").val(obj.payment_no);
 //             $("#user_name").val(obj.user_name);
 //             $("#imageid").attr('src',obj.file_path);
 //             $("#paymentid").val(obj.id); 
             
 //            }

           
           
           
 //        }
 //    });

	// $("#clickid").attr('data-target','#exampleModalLong');
}




function deleteclick(val)
{
	$("#deleteclickid").attr('data-target','#deletemodalid');
	var paymentid = val.getAttribute('data-payment-id');

	$("#deleteid").attr('data-pay-id',paymentid);
	
}
