

window.onload = function()
{
	// alert('hellow');
}

function editclick(val)
{
	// alert(val.getAttribute('data-payment-id'));

	var paymentid = val.getAttribute('data-payment-id');

	var request = $.ajax({
        url:"<?php echo base_url('index.php/Admin_controller/paymentmethodmodalinfo');?>",
        type: "post",
        data: "val="+paymentid,

        success:function(data)
        {
            // $("#clickid").attr('data-target','#exampleModalLong');
           // alert(data);
           var obj = JSON.parse(data);
            // console.log(obj);
            if(obj !== null){
           
             $("#paymentmethodname").val(obj.payment_method);
             $("#payment_no").val(obj.payment_no);
             $("#user_name").val(obj.user_name);
             $("#imageid").attr('src',obj.file_path);
             $("#paymentid").val(obj.id); 
             
            }

           
           
           
        }
    });

	// $("#clickid").attr('data-target','#exampleModalLong');
}



//Ajax 
var ajx;
$("#formId").submit(function(event){
    // Prevent default posting of form - put here to work in case of errors
    event.preventDefault();



    var data = new FormData(this);

    var ajx = $.ajax({
        url:"<?php echo base_url('index.php/Admin_controller/update_paymentmethoddetails');?>",
        type: "post",
        // dataType: "json",
        // data: jsonobj,
        processData:false,
        contentType:false,
        cache:false,
        async:true,
        data: data,

        success:function(data)
        {
           alert(data);
           window.location.reload();

        }
    });

 

//  $('#formid').trigger("reset");
// alert('Successfully submitted');

    // Callback handler that will be called on success
    ajx.done(function (response, textStatus, jqXHR){
        console.log("Hooray, it worked!");
    });



    // Callback handler that will be called on failure
    ajx.fail(function (jqXHR, textStatus, errorThrown){
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });


});



function deleteclick(val)
{
	$("#deleteclickid").attr('data-target','#deletemodalid');
	var paymentid = val.getAttribute('data-payment-id');

	$("#deleteid").attr('data-pay-id',paymentid);
	
}



function deleteokclick(val)
{
	var paymentid = val.getAttribute('data-pay-id');

	// alert(paymentid);

	var request = $.ajax({
        url:"<?php echo base_url('index.php/Admin_controller/deletepaymentmethod');?>",
        type: "post",
        data: "val="+paymentid,

        success:function(data)
        {
            
           alert(data);
           window.location.reload();

           
           
           
        }
    });


}



