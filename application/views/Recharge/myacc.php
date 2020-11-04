<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        <?php include'css/style.css'; ?>
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
    <div>
        <h2 class="headdinglog">Subscriber Id :</h2><strong>1274256682</strong><br>
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
    </div>
   

     <div style="display: flex;flex-wrap: wrap;justify-content:center; padding: 2%">

        <?php foreach ($userpackage as $key) {?>
             <div style="margin: 1%">
                <?php if($key['file_path'])
                {
                    ?>
                 <img src="<?php echo $key['file_path'];?>" width=200 height=200>
             <?php }else{?>
                 <img src="<?php echo base_url('assets/images/image_bg.png');?>" width=200 height=200>
             <?php } ?>
                 <div>
                     <h3><?php echo $key['package_name'];?></h3>
                     <p><?php echo $key['package_price'];?></p>
                     <p><?php echo $key['speed'];?></p>
                     <p><?php echo $key['month'];?></p>
                     <p><?php echo $key['data_per_day'];?></p>
                     <p><?php echo $key['installation_charge'];?></p>
                 </div>
                 <button class="" style="width:100%;" onclick="addclick()" >Add</button>
             </div>
        <?php } ;?>
         
     </div>
</div>


<script type="text/javascript">
    function addclick(){
 window.location = "<?php echo base_url().'index.php/Recharge_controller/recharge';?>";
    }
</script>

<!-- <?php  print_r($userpackage);?> -->

<?php
include('include/footer.php');
include('include/footerjs.php');
?>