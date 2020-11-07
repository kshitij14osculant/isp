<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        <?php include'css/style.css'; ?>

        .content p
        {
            margin:2%;
        }
    </style>

</head>
<body>

</body>
</html>


<?php
include('include/css.php');
include('include/header.php'); ?>
<!-- <div class="back-button"><a href="#!"><i class="fa fa-arrow-left" title="Back"></i><span>Back</span></a></div> -->




<div class="logo-margin-top">
    <div class="heading-md">
        <h1 class="heading1 gradient"><?php echo $this->session->userdata('username'); ?></h1>
        <!-- <h2 class="heading2">Welcome back to Tata Sky and select your next action</h2> -->
    </div>
</div>
<div class="center">
    <!-- <div>
        <h2 class="headdinglog">Subscriber Id :</h2><?php echo $this->session->userdata('subscriber_id'); ?><br>
        <h2 class="headdinglog">Monthly Recharge Amount:</h2><strong> ₹ 344</strong>
    </div>
    <div class="bel">
        <div class="belleft">
            <h2 class="heading2 ">Account balance</h2>
            <strong> ₹ 344</strong>
        </div>
        <div class="belright">
        <h2 class="heading2 ">Recharge due on</h2>
            <strong> Nov 9, 20</strong>
        </div>
    </div> -->
   

     <div style="display: flex;flex-wrap: wrap;justify-content:center; padding: 2%">

        <?php foreach ($userpackage as $key) {?>
             <div style="margin:0 auto;max-width:300px;box-shadow: 3px 3px 3px 3px rgba(0,0,0,0.3);text-align: left;padding: 2%;box-sizing: border-box;">
                <?php if($key['file_path'])
                {
                    ?>
                 <img src="<?php echo $key['file_path'];?>" style="width: 250px;height: 200px;">
             <?php }else{?>
                 <img src="<?php echo base_url('assets/images/image_bg.png');?>" style="width: 250px;height: 200px;">
             <?php } ?>
                 <div class="content">
                     <h3 style="color:white;padding:1%;background: -webkit-linear-gradient(330deg,#ff9000 0,red 50%,#0a00b2 100%);"><span></span><?php echo $key['package_name'];?></h3>
                     <p><span>Price: &nbsp;</span><?php echo $key['package_price'];?></p>
                     <p><span>Speed: &nbsp;</span><?php echo $key['speed'];?></p>
                     <p><span>Month: &nbsp;</span><?php echo $key['month'];?></p>
                     <p><span>Data per day: &nbsp;</span><?php echo $key['data_per_day'];?></p>
                     <p><span>Installation: &nbsp;</span><?php echo $key['installation_charge'];?></p>
                 </div>
                 <button class="" style="padding: 6px 12px;" onclick="addclick()" >Add pack</button>
             </div>
        <?php } ;?>
         
     </div>
</div>


<script type="text/javascript">
    function addclick(){
 // window.location = "<?php echo base_url().'index.php/Recharge_controller/recharge';?>";
window.location = "<?php echo base_url('index.php/Recharge_controller/paymentmethod'); ?>"; 
    }
</script>

<!-- <?php  print_r($userpackage);?> -->

<?php
include('include/footer.php');
include('include/footerjs.php');
?>