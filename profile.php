<?php 
ob_start();

include 'sidebar.php';
include 'php/id.php';

if (!($player -> LoggedIn()))
{
	header('location: index.php');
	die();
}

?>


<!DOCTYPE html>
<html lang="zxx">

<head>
</head>

<body>
    <div id="wrapper">

        <!-- content begin -->
        <div class="no-bottom" id="content">
            <div id="top"></div>

            <section aria-label="section">
                <div class="container">
					<div class="row">
					    <div class="col-md-12">
                           <div class="d_profile de-flex">
                                <div class="de-flex-col">
                                    <div class="profile_avatar">
                                    <img src="photos/<?php echo $profile->getPhoto($pdo);?>" alt="" class="img-fluid img-rounded mb-sm-30">
                                        <i class="fa fa-check"></i>
                                        <div class="profile_name">
                                            <h4>
                                            <?php echo $profile -> getIcName($pdo);?>                                               
                                                <span class="profile_username"><?php echo $profile -> getName($pdo);?></span>
                                                <span id="wallet" class="profile_wallet"><?php echo $profile -> getIdentifier($pdo);?></span>
                                                
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile_follow de-flex">
                                    <div class="de-flex-col">
                                        <a href="actions.php" class="btn-main">Actions</a>
                                    </div>               
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="de_tab tab_simple">
    
                                <ul class="de_nav">
                                    <li class="active"><span>Character</span></li>
                                    <?php if($inventory){ ?>
                                    <li><span>Inventory</span></li>
                                    <?php } ?>
                                    <?php if($vehicles){ ?>
                                    <li><span>Vehicles</span></li>
                                    <?php } ?>
                                    <?php if($fines){ ?>
                                    <li><span>Fines</span></li>
                                    <?php } ?>
                                    <?php if($jobs){ ?>
                                    <li><span>Job</span></li>
                                    <?php } ?>
                                </ul>
                                
                                <div class="de_tab_content">
                                    
                                    <div class="tab-1">
                                        <div class="row">
                                                <div class="row gx-2">
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <a href="#" class="nft_attr">
                                                    <h5>Cash</h5>
                                                    <h4>$<?php echo $profile -> getTotalCash($pdo);?></h4>
                                                    <span>Cash</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <a href="#" class="nft_attr">
                                                    <h5>Money</h5>
                                                    <h4>$<?php echo $profile -> getTotalBank($pdo);?></h4>
                                                    <span>Money in the Bank</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <a href="#" class="nft_attr">
                                                    <h5>Date of Birth</h5>
                                                    <h4><?php echo $profile -> getBirthday($pdo);?></h4>
                                                    <span>Date of birth</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <a href="#" class="nft_attr">
                                                    <h5>Sex</h5>
                                                    <h4><?php echo $profile -> getSex($pdo);?></h4>
                                                    <span>Your sex :)</span>
                                                </a>
                                            </div>
                                            <?php if($esx_legacy) { ?>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <a href="#" class="nft_attr">
                                                    <h5>Height</h5>
                                                    <h4><?php echo $profile -> getHeight($pdo);?></h4>
                                                    <span>Centimeters :P</span>
                                                </a>
                                            </div>
                                            <?php } ?>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <a href="#" class="nft_attr">
                                                    <h5>Phone Number</h5>
                                                    <h4><?php echo $profile -> getPhoneNumber($pdo);?></h4>
                                                    <span>Whatsapp</span>
                                                </a>
                                            </div>
                                            <?php if($petwidget) {?>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <a href="#" class="nft_attr">
                                                    <h5>Pet</h5>
                                                    <h4><?php echo $profile -> getPet($pdo);?></h4>
                                                    <span>Your best friend</span>
                                                </a>
                                            </div>
                                            <?php } ?>
                                            <?php if($battlepass) {?>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <a href="#" class="nft_attr">
                                                    <h5>Battlepass</h5>
                                                    <h4><?php echo $profile -> getBattlePass($pdo);?></h4>
                                                    <span>Xp</span>
                                                </a>
                                            </div>
                                            <?php } ?>      
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <a href="#" class="nft_attr">
                                                    <h5>Group</h5>
                                                    <h4><?php echo $profile -> getGroup($pdo);?></h4>
                                                    <span>Your group</span>
                                                </a>
                                            </div>                                   
                                        </div>                  
                                    </div>
                                </div>
                                    
                                <?php if($inventory){ ?>
                                <div class="tab-2">
                                    <div class="row">
                                        <div class="row gx-2">
                                            <?php 
                                            if ($simpleinventory) {
                                                if ($inventory -> rowCount() > 1) {
                                                    while ($rowinv = $inventory -> fetch()) {
                                                        if ($rowinv['count'] > 1) {   ?>

                                                <div class="col-lg-4 col-md-6 col-sm-6">
                                                <a href="#" class="nft_attr">
                                                    <h5>Item</h5>
                                                    <h4><?php echo $rowinv['item'];?></h4>
                                                    <span>Amount: <?php echo $rowinv['count'];?></span>
                                                </a>
                                            </div>    
                                            <?php } } } } ?>  
                                            
                                            <?php 
                                            if ($inventoryjson) {
                                                $jsoninv = $row['inventory'];
                                                $invjson = json_decode($jsoninv, true);
                                                foreach ($invjson as $item) { ?>

                                                <div class="col-lg-4 col-md-6 col-sm-6">
                                                <a href="#" class="nft_attr">
                                                    <h5><?php 
                                                             $itemType = $item['type'];
                                                             echo $itemType;
                                                    ?></h5>
                                                    <h4><?php         
                                                            $itemName = $item['name'];
                                                            echo $itemName;
                                                    ?></h4>
                                                    <span>Amount:
                                                         <?php $itemAmount = $item['amount'];
                                                           echo $itemAmount;?></span>
                                                </a>
                                            </div>    
                                            <?php } } ?>  

                                        </div>                  
                                    </div>
                                  </div>
                                  <?php } ?>
 
                                  <?php if($vehicles){ ?>
                                    <div class="tab-3">
                                        <div class="row">
                                                <div class="row gx-2">   
                                                <?php 
                                            if($vehicle -> rowCount() > 1) {  
                                                while ($rowveh = $vehicle -> fetch()) {
                                                   ?>  
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <a href="#" class="nft_attr">
                                                    <h5>Vehicle</h5>
                                                    <span><?php echo $rowveh['plate'];?></span>
                                                </a>
                                            </div>  
                                            <?php } } ?>                                   
                                        </div>                  
                                    </div>
                                </div>
                                <?php } ?>

                                <?php if($fines){ ?>
                                <div class="tab-4">
                                        <div class="row">
                                                <div class="row gx-2">   
                                                <?php 
                                            if($fines -> rowCount() > 1) {  
                                                while ($rowfin = $fines -> fetch()) {
                                                   ?>  
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <a href="#" class="nft_attr">
                                                    <h5>Fine</h5>
                                                    <h4><?php echo $rowfin['label'];?></h4>
                                                    <span>$<?php echo $rowfin['amount'];?></span>
                                                </a>
                                            </div>  
                                            <?php } } ?>                                   
                                        </div>                  
                                    </div>
                                </div>
                                <?php } ?> 

                                <?php if($jobs){ ?>
                                    <div class="tab-5">
                                        <div class="row">
                                                <div class="row gx-2">   
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <a href="#" class="nft_attr">
                                                    <h5>Job</h5>
                                                    <h4><?php echo $profile -> getJob($pdo);?></h4>
                                                </a>
                                            </div>  
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <a href="#" class="nft_attr">
                                                    <h5>Job Grade</h5>
                                                    <h4><?php echo $profile -> getJobgrade($pdo);?></h4>
                                                </a>
                                            </div>                                    
                                        </div>                  
                                    </div>
          
                                </div>
                                <?php } ?> 
                                
                            </div>
                        </div>
                    </div>
				</div>
            </section>
			
			
        </div>
        <!-- content close -->

        <a href="#" id="back-to-top"></a>
        
        <!-- footer begin -->
        <?php include 'footer.php';?>
        <!-- footer close -->
        
    </div>


    
    <!-- Javascript Files
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/easing.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/validation.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/enquire.min.js"></script>
    <script src="js/jquery.plugin.js"></script>
    <script src="js/jquery.countTo.js"></script>
    <script src="js/jquery.countdown.js"></script>
    <script src="js/jquery.lazy.min.js"></script>
    <script src="js/jquery.lazy.plugins.min.js"></script>
    <script src="js/designesia.js"></script>

</body>

</html>