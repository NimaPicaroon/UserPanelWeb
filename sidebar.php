<?php 
ob_start();

include 'php/init.php';

?>
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
                                <?php  if (!($player -> LoggedIn())) { ?>
                                    <li>
                                        <a href="index.php">Home<span></span></a>
                                    </li>
                                    <li>
                                        <a href="03_grey-author.html">About us<span></span></a>
                                    </li> 

                                    <?php } ?>   
                                   
                                    <?php  if (($player -> LoggedIn())) { ?>
                                    <li>
                                        <a href="index.php">Home<span></span></a>
                                    </li>
                                    <li>
                                        <a href="#">About us<span></span></a>
                                    </li> 
                                    <li>
                                        <a href="profile.php">Profile<span></span></a>
                                    </li>
                                    <li>
                                        <a href="ticket/">Ticket<span></span></a>
                                    </li>  
                                    <?php  if (($admin -> getAdmin($pdo))) { ?>
                                        <li>
                                        <a href="admin.php">Admin<span></span></a>
                                    </li>
                                    <li>
                                        <a href="ticket/admin">Admin Ticket<span></span></a>
                                    </li>   
                                    <?php } ?> 
                                    <?php } ?>    

                                </ul>
 
                                <!-- mainmenu close -->
                                <div class="menu_side_area">
                               <?php  if (!($player -> LoggedIn())) { ?>
                                  <a href="login.php" class="btn-main btn-wallet"><i class="icon_wallet_alt"></i><span>Login</span></a>                                                                      
                                  <?php } ?> 
                                  <?php  if (($player -> LoggedIn())) { ?>
                                  <a href="logout.php" class="btn-main btn-wallet"><i class="icon_wallet_alt"></i><span>Logout</span></a>                                                                      
                                  <?php } ?> 
                                  <span id="menu-btn"></span>
                                </div>

                                <div class="menu_side_area">
                                    <div class="de-login-menu">

                                    <?php  if (($player -> LoggedIn())) { ?>
                                        <span id="de-click-menu-profile" class="de-menu-profile">                           
                                        <img src="photos/<?php echo $profile->getPhoto($pdo);?>" class="img-fluid" alt="">
                                        </span>


                                        <div id="de-submenu-profile" class="de-submenu">
                                            <div class="d-name">
                                                <h4><?php ?></h4>
                                                <a href="profile.php"><?php echo $profile-> getIcName($pdo);?></a>
                                            </div>
                                            <div class="spacer-10"></div>
                                            <div class="d-balance">
                                                <h4>Total Money</h4>
                                                $<?php echo $profile -> getTotalMoney($pdo);?>
                                            </div>
                                            <div class="spacer-10"></div>
                                            <div class="d-wallet">
                                                <h4>Steam Id</h4>
                                                <span id="wallet" class="d-wallet-address"><?php echo $profile -> getSteamId($pdo);?></span>
                                                <button id="btn_copy" title="Copy Text">Copy</button>
                                            </div>

                                            <div class="d-line"></div>

                                            <ul class="de-submenu-profile">                                     
                                                <li><a href="profile.php"><i class="fa fa-user"></i> My profile</a>
                                                <li><a href="actions.php"><i class="fa fa-pencil"></i> Actions</a>
                                                <li><a href="logout.php"><i class="fa fa-sign-out"></i> Sign out</a>
                                            </ul>
                                        </div>
                                        <?php } ?> 
                                        <span id="menu-btn"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header close -->