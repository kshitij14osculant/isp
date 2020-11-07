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

'<?php
include('include/css.php');
include('include/header.php'); ?>
<div class="back-button"><a href="#!"><i class="fa fa-arrow-left" title="Back"></i><span>Back</span></a></div>
<div class="logo-margin-top">
    <div class="heading-md">
        <h1 class="heading1 gradient">You are almost done</h1>
        <h2 class="heading2">Choose a payment method and complete your recharge</h2>
    </div>
</div>
<div class="center">
    <div class="section payopt">
        <div class=" mB10">
            <h2 class="heading2">Pay using UPI</h2>
        </div>
        <div >
            <p id="fl">In your UPI app, you will receive a payment request from Billdesk / TechProcess. Kindly authorise and confirm request to make payment. To continue, click on Pay Now</p>

            <div style="display: flex;flex-wrap: wrap;justify-content:center; padding: 2%">

        <?php foreach ($paymentmethoddetails as $key) {?>
             <div style="margin:0 auto;max-width:300px;box-shadow: 3px 3px 3px 3px rgba(0,0,0,0.3);text-align: left;padding: 2%;box-sizing: border-box;">
                <?php if($key['file_path'])
                {
                    ?>
                 <img src="<?php echo $key['file_path'];?>" width=200 height=200>
             <?php }else{?>
                 <img src="<?php echo base_url('assets/images/image_bg.png');?>" width=200 height=200>
             <?php } ?>
                 <div>
                     <h3 style="color:white;padding:1%;background: -webkit-linear-gradient(330deg,#ff9000 0,red 50%,#0a00b2 100%);"><?php echo $key['payment_method'];?></h3>
                     <p><span>Payment no: &nbsp;</span><?php echo $key['payment_no'];?></p>
                     <p><span>User: &nbsp;</span><?php echo $key['user_name'];?></p>
                     
                 </div>
                 <!-- <button class="" style="width:100%;" onclick="addclick()" >Add</button> -->
             </div>
        <?php } ;?>
         
     </div>


            <div style="margin-top: 30px;">
                <a class="home-btn-link"  href="<?php echo base_url().'index.php/Recharge_controller/recharge';?>">Pay Now</a>
            </div>
        </div>
    </div>
    <div>

    </div>
</div>

<?php
include('include/footer.php');
include('include/footerjs.php');
?>