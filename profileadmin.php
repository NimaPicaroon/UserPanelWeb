<?php 
ob_start();

require('php/admininit.php');

if (isset($_POST['editprofile'])) {
    if ($esx_legacy) {
        if (empty($_POST['cash'])) {
            $update_money = $adminProfile -> getTotalCash($pdo);
        } else {
            $update_money = $_POST['cash'];
        }

        if (empty($_POST['money'])) {
            $update_bank = $adminProfile -> getTotalBank($pdo);
        } else {
            $update_bank = $_POST['money'];
        }

        if (empty($_POST['birth'])) {
            $update_birth = $adminProfile -> getBirthday($pdo);
        } else {
            $update_birth = $_POST['birth'];
        }

        if (empty($_POST['sex'])) {
            $update_sex = $adminProfile -> getSex($pdo);
        } else {
            $update_sex = $_POST['sex'];
        }

        if (empty($_POST['height'])) {
            $update_height = $adminProfile -> getHeight($pdo);
        } else {
            $update_height = $_POST['height'];
        }

        if (empty($_POST['phone'])) {
            $update_phone = $adminProfile -> getPhoneNumber($pdo);
        } else {
            $update_phone = $_POST['phone'];
        }

        if (empty($_POST['pet'])) {
            $update_pet = $adminProfile -> getPet($pdo);
        } else {
            $update_pet = $_POST['pet'];
        }

        if (empty($_POST['group'])) {
            $update_group = $adminProfile -> getGroup($pdo);
        } else {
            $update_group = $_POST['group'];
        }

        $ide = $adminProfile -> getIdentifier($pdo);
        $SQL = $pdo -> prepare("UPDATE users SET 
    money = '$update_money',  bank = '$update_bank', dateofbirth = '$update_birth', phone_number = '$update_phone'
    WHERE identifier = '$ide'");
        $SQL -> execute();
    }



    if ($qbcore) {
        if (empty($_POST['cash'])) {
            $update_money = $adminProfile -> getTotalCash($pdo);
        } else {
            $update_money = intval($_POST['cash']);
        }

        if (empty($_POST['money'])) {
            $update_bank = $adminProfile -> getTotalBank($pdo);
        } else {
            $update_bank = intval($_POST['money']);
        }

        if (empty($_POST['birth'])) {
            $update_birth = $adminProfile -> getBirthday($pdo);
        } else {
            $update_birth = $_POST['birth'];
        }

        if (empty($_POST['sex'])) {
            $update_sex = $adminProfile -> getPureSex($pdo);
        } else {
            $update_sex = $_POST['sex'];
        }

        if (empty($_POST['height'])) {
            $update_height = $adminProfile -> getHeight($pdo);
        } else {
            $update_height = $_POST['height'];
        }

        if (empty($_POST['phone'])) {
            $update_phone = $adminProfile -> getPhoneNumber($pdo);
        } else {
            $update_phone = $_POST['phone'];
        }

        if (empty($_POST['pet'])) {
            $update_pet = $adminProfile -> getPet($pdo);
        } else {
            $update_pet = $_POST['pet'];
        }

        if (empty($_POST['group'])) {
            $update_group = $adminProfile -> getGroup($pdo);
        } else {
            $update_group = $_POST['group'];
        }

       
        // Money Decode/Encode

        $moneyinfo = $adminProfile -> getMoneyInfo($pdo);
        $money_arr = json_decode($moneyinfo);

        $money_arr->{'cash'} = $update_money;
        $money_arr->{'bank'} = $update_bank;

        $moneyEncode = json_encode($money_arr);

        
        // Character Info Decode/Encode
       
        $charinfo = $adminProfile -> getCharInfo($pdo);
        $char_arr = json_decode($charinfo);

        $char_arr->{'phone'} = "$update_phone";
        $char_arr->{'birthdate'} = "$update_birth";
        $char_arr->{'gender'} = "$update_sex";

        $charEncode = json_encode($char_arr);

        // Update Query.
        $ide = $adminProfile -> getIdentifier($pdo);

        $SQL = $pdo -> prepare("UPDATE players SET money = '$moneyEncode', charinfo = '$charEncode'
        WHERE citizenid = '$ide'");
        $SQL -> execute();
    }
}



?>

<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Example Roleplay</title>
    <link rel="icon" href="images/icon.png" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Example Roleplay" name="description" />
    <meta content="" name="keywords" />
    <meta content="" name="author" />
    <!-- CSS Files
    ================================================== -->
    <link id="bootstrap" href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link id="bootstrap-grid" href="css/bootstrap-grid.min.css" rel="stylesheet" type="text/css" />
    <link id="bootstrap-reboot" href="css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css" />
    <link href="css/animate.css" rel="stylesheet" type="text/css" />
    <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="css/owl.theme.css" rel="stylesheet" type="text/css" />
    <link href="css/owl.transitions.css" rel="stylesheet" type="text/css" />
    <link href="css/magnific-popup.css" rel="stylesheet" type="text/css" />
    <link href="css/jquery.countdown.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/de-grey.css" rel="stylesheet" type="text/css" />
    <!-- color scheme -->   
    <link id="colors" href="css/colors/scheme-01.css" rel="stylesheet" type="text/css" />
    <link href="css/coloring.css" rel="stylesheet" type="text/css" />
</head>

<body class="dark-scheme de-grey">
    <div id="wrapper">
            <!-- header begin -->
        <header class="transparent scroll-dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="de-flex sm-pt10">
                            <div class="de-flex-col">
                                <div class="de-flex-col">
                                    <!-- logo begin -->
                                    <div id="logo">
                                        <a href="index.php">
                                            <img alt="" src="images/logo-light.png" />
                                        </a>
                                    </div>
                                    <!-- logo close -->
                                </div>
                            </div>
                            <div class="de-flex-col header-col-mid">
                                <!-- mainmenu begin -->
                                <ul id="mainmenu">
                                    <li>
                                        <a href="admin.php">Exit Profile<span></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
<body>
    <div id="wrapper">
        <div class="no-bottom" id="content">
            <div id="top"></div>
            <section aria-label="section">
                <div class="container">
                <form id="form-editprofile" class="form-border" method="post" action="profileadmin.php?identifier=<?php echo $adminProfile -> getIdentifier($pdo);?>" enctype="multipart/form-data">
					<div class="row">
					    <div class="col-md-12">
                           <div class="d_profile de-flex">
                                <div class="de-flex-col">
                                    <div class="profile_avatar">
                                    <img src="photos/<?php echo $adminProfile->getPhoto($pdo);?>" alt="">
                                        <i class="fa fa-check"></i>
                                        <div class="profile_name">
                                            <h4>
                                            <?php echo $adminProfile -> getIcName($pdo);?>                                               
                                                <span class="profile_username"><?php echo $adminProfile -> getName($pdo);?></span>
                                                <span id="wallet" class="profile_wallet"><?php echo $adminProfile -> getIdentifier($pdo);?></span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile_follow de-flex">
                                    <div class="de-flex-col">
                                        <input type="submit" id="editprofile" name="editprofile" class="btn-main" value="Edit User">
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
                                                    <h4>$<?php echo $adminProfile -> getTotalCash($pdo);?></h4>
                                                    <span>Cash</span>
                                                    <input type="text" name="cash" id="cash" class="form-control text-center" placeholder="$<?php echo $adminProfile -> getTotalCash($pdo);?>" />                                          
                                                </a>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <a href="#" class="nft_attr">
                                                    <h5>Money</h5>
                                                    <h4>$<?php echo $adminProfile -> getTotalBank($pdo);?></h4>
                                                    <span>Money in the Bank</span>
                                                    <input type="text" name="money" id="money" class="form-control text-center" placeholder="$<?php echo $adminProfile -> getTotalBank($pdo);?>" />                                          
                                                </a>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <a href="#" class="nft_attr">
                                                    <h5>Date of Birth</h5>
                                                    <h4><?php echo $adminProfile -> getBirthday($pdo);?></h4>
                                                    <span>Date of birth</span>
                                                    <input type="text" name="birth" id="birth" class="form-control text-center" placeholder="<?php echo $adminProfile -> getBirthday($pdo);?>" />                                          
                                                </a>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <a href="#" class="nft_attr">
                                                    <h5>Sex</h5>
                                                    <h4><?php echo $adminProfile -> getSex($pdo);?></h4>
                                                    <span>Your sex :)</span>
                                                    <input type="text" name="sex" id="sex" class="form-control text-center" placeholder="M or F" />                                          
                                                </a>
                                            </div>
                                            <?php if($esx_legacy) { ?>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <a href="#" class="nft_attr">
                                                    <h5>Height</h5>
                                                    <h4><?php echo $adminProfile -> getHeight($pdo);?></h4>
                                                    <span>Centimeters :P</span>
                                                    <input type="text" name="height" id="height" class="form-control text-center" placeholder="<?php echo $adminProfile -> getHeight($pdo);?>" />                                          
                                                </a>
                                            </div>
                                            <?php } ?>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <a href="#" class="nft_attr">
                                                    <h5>Phone Number</h5>
                                                    <h4><?php echo $adminProfile -> getPhoneNumber($pdo);?></h4>
                                                    <span>Whatsapp</span>
                                                    <input type="text" name="phone" id="phone" class="form-control text-center" placeholder="<?php echo $adminProfile -> getPhoneNumber($pdo);?>" />                                          
                                                </a>
                                            </div>
                                            <?php if($petwidget) {?>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <a href="#" class="nft_attr">
                                                    <h5>Pet</h5>
                                                    <h4><?php echo $adminProfile -> getPet($pdo);?></h4>
                                                    <span>Your best friend</span>
                                                    <input type="text" name="pet" id="pet" class="form-control text-center" placeholder="<?php echo $adminProfile -> getPet($pdo);?>" />                                          
                                                </a>
                                            </div>
                                            <?php } ?>
                                            <?php if($battlepass) {?>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <a href="#" class="nft_attr">
                                                    <h5>Battlepass</h5>
                                                    <h4><?php echo $adminProfile -> getBattlePass($pdo);?></h4>
                                                    <span>Xp</span>
                                                    <input type="text" name="battlepass" id="battlepass" class="form-control text-center" placeholder="<?php echo $adminProfile -> getBattlePass($pdo);?>" />                                          
                                                </a>
                                            </div>
                                            <?php } ?>      
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <a href="#" class="nft_attr">
                                                    <h5>Group</h5>
                                                    <h4><?php echo $adminProfile -> getGroup($pdo);?></h4>
                                                    <span>Your group</span>
                                                    <input type="text" name="group" id="group" class="form-control text-center" placeholder="<?php echo $adminProfile -> getGroup($pdo);?>" />                                          
                                                </a>
                                            </div>                                   
                                        </div>                  
                                    </div>
                                            </form>
                                </div>
                                    
                                <?php if($inventory){ ?>
                                <div class="tab-2">
                                    <div class="row">
                                        <div class="row gx-2">
                                            <?php 
                                            if ($esx_legacy) {
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
                                            if ($esx_v1) {
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
                                            if ($esx_v1final) {
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
                                            if ($qbcore) {
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
                                                    <h4><?php echo $adminProfile -> getJob($pdo);?></h4>
                                                </a>
                                            </div>  
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <a href="#" class="nft_attr">
                                                    <h5>Job Grade</h5>
                                                    <h4><?php echo $adminProfile -> getJobgrade($pdo);?></h4>
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