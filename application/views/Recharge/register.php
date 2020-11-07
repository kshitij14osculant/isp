<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css" href="css/style.css">
        <!-- <?php include'css/style.css'; ?> -->
    </style>

</head>
<body>

</body>
</html>


<?php
include('include/css.php');
include('include/header.php'); ?>
<div class="back-button"><a href="#!"><i class="fa fa-arrow-left" title="Back"></i><span>Back</span></a></div>
<div class="logo-margin-top">
    <div class="heading-md">
        <h1 class="heading1 gradient">Quick & easy recharge</h1>
        <h2 class="heading2">Enter your details below and get started</h2>
    </div>
</div>
<div class="center">
    <form id="formId" method="post">
        <div class="body-container">
            <div class="save-user-details">
                <div class="form-group">
                    <div class="form-group phone-field">
                        <label class="sel active">Subscriber ID / Registered Mobile Number </label>
                        <input class="form-control" type="tel" id="Inputsubscriber_id" placeholder=""  value="">
                    </div>
                </div>
            </div>
            <div class="save-user-details">
                <div class="form-group">
                    <div class="form-group phone-field">
                        <label class="sel active">Full name</label>
                        <input class="form-control" type="text" id="fullname" placeholder="" value="">
                    </div>
                </div>
            </div>

            <div class="save-user-details">
                <div class="form-group">
                    <div class="form-group phone-field">
                        <label class="sel active">email</label>
                        <input class="form-control" type="email" id="email" placeholder=""  value="">
                    </div>
                </div>
            </div>

            <div class="save-user-details">
                <div class="form-group">
                    <div class="form-group phone-field">
                        <label class="sel active">mobile</label>
                        <input class="form-control" type="Number" id="mobile" placeholder=""  value="">
                    </div>
                </div>
            </div>

            <div class="save-user-details">
                <div class="form-group">
                    <div class="form-group phone-field">
                        <label class="sel active">Pincode</label>
                        <input class="form-control" type="text" id="pincode" placeholder=""  value="">
                    </div>
                </div>
            </div>


        </div>
        <div class="footer-contr text-center">
            <div class="footer-contr btn-contr text-center">
                <button class="home-btn-link" type="submit">
                    <span class="MuiButton-label">Submit</span>
                </button>
            </div>
        </div>
    </form>
    <p class="heading2">
        Keep your Tata Sky set top box switched on before recharge
        <br>
        As per Kerala Finance Bill 2019, 1% Cess would be applicable on Tata Sky recharges wef 1st Aug'19 for subscribers registered in Kerala
    </p>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
        //Ajax 
var request;
$("#formId").submit(function(event){
    // Prevent default posting of form - put here to work in case of errors
    event.preventDefault();

    // alert('check');


    // var data = new FormData(this);
    var jsonobj = {
        'subscriber_id':$('#Inputsubscriber_id').val(),
        'fullname':$('#fullname').val(),
        'email':$('#email').val(),
        'mobile':$('#mobile').val(),
        'pincode':$('#pincode').val(),
    }

    // alert(jsonobj.email);
    // alert(jsonobj.subscriber_id);

    $.ajax({
        url:"<?php echo  base_url().'index.php/Recharge_controller/registeration';?>",
        type: "post",
        dataType: "json",
        data: jsonobj,

        success:function(data)
        {
          
           window.location = "<?php echo base_url('index.php/Recharge_controller/login'); ?>";

        }
    });

 




});
</script>

<?php
// include('./include/footer.php');
include('include/footerjs.php');
?>