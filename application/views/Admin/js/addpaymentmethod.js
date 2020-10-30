//Ajax 
var request;
$("#formId").submit(function(event){
    // Prevent default posting of form - put here to work in case of errors
    event.preventDefault();



    var data = new FormData(this);

    var request = $.ajax({
        url:"<?php echo base_url('index.php/Admin_controller/insert_paymentmethoddetails');?>",
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

 

 $('#formid').trigger("reset");
alert('Successfully submitted');

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        console.log("Hooray, it worked!");
    });



    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });


});

