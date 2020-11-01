<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        <?php include('css/style.css');?>
    </style>
</head>
<body>

</body>
</html>

<?php
include('include/css.php');
include('include/header.php'); ?>
<div class="back-button backbutton"><a href="#!"><i class="fa fa-arrow-left" title="Back"></i><span>Back</span></a></div>
<div class="logo-margin-top">
    <div class="heading-md">
        <h1 class="heading1 gradient">Welcome to a new & exciting Jetway!</h1>
        <h2 class="heading2">Log in to manage your Jetway account</h2>
    </div>
</div>
<div class="center">
    <form >
        <div class="body-container">
            <div class="save-user-details">

                <div class="form-group">
                     <label class="sel active">Subscriber Email</label>
                      <input type="email" class="form-control form-control-user" id="InputEmail" aria-describedby="emailHelp" name= "email"placeholder="Enter Email Address...">
                </div>

                <div class="form-group">
                    <div class="form-group phone-field">
                        <label class="sel active">Subscriber ID / Registered Mobile Number </label>
                        <input class="form-control" type="tel" id="Inputsubscriber_id" name="subscriber_id" placeholder="Subscriber Id" maxlength="10" tabindex="0" value="">
                    </div>
                </div>


            </div>
        </div>

        <button class="home-btn-link" tabindex="0" type="button" id="formId">
                    <!-- <span class="MuiButton-label">Continue</span> -->
                    Continue
       </button>


        <div class="footer-contr text-center">
           <!--  <div class="footer-contr btn-contr text-center">
                <button class="home-btn-link" tabindex="0" type="button" onclick="">
                    <span class="MuiButton-label">Continue</span>
                    
                </button>
            </div> -->
            <p class="mT10">Not registered yet? <a href="<?php echo base_url('index.php/Recharge_controller/register'); ?>">Click here</a></p>
        </div>
    </form>
</div>

<?php
include('include/footerjs.php');
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    //Ajax 
var request;
$("#formId").click(function(event){
    // Prevent default posting of form - put here to work in case of errors
    event.preventDefault();

    alert('check');


    // var data = new FormData(this);
    var jsonobj = {
        'email':$('#InputEmail').val(),
        'subscriber_id':$('#Inputsubscriber_id').val(),
    }

    alert(jsonobj.email);
    alert(jsonobj.subscriber_id);

    $.ajax({
        url:"<?php echo  base_url().'index.php/Welcome/isvalid';?>",
        type: "post",
        dataType: "json",
        data: jsonobj,

        success:function(data)
        {
          
           window.location = "<?php echo base_url('index.php/Recharge_controller/myacc'); ?>";

        }
    });

 




});


</script>