<?php 
ob_start();
session_start();
include 'sidebar.php';


?>

<!DOCTYPE html>
<html lang="zxx">
<head>

</head>
<body>
        <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>
            <section id="section-hero" aria-label="section" class="pt20 pb20 vh-100" data-bgimage="url(images/background/8.jpg) bottom">
                <div id="particles-js"></div>
                <div class="v-center">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="spacer-single"></div>
                                <h6 class="wow fadeInUp" data-wow-delay=".5s"><span class="text-uppercase id-color-2">FiveM</span></h6>
                                <div class="spacer-10"></div>
                                <h1 class="wow fadeInUp" data-wow-delay=".75s">Example Roleplay</h1>
                                <p class="wow fadeInUp lead" data-wow-delay="1s">
                                Where you can make friends or enemies. Meet interesting people and enjoy your second life.</p>
                                <div class="spacer-10"></div>
                                <a href="https://discord.gg/BZbMMwbvxm" class="btn-main wow fadeInUp lead" data-wow-delay="1.25s">Discord</a>                                
                                <div class="row">
                                    <div class="spacer-single"></div>
                                    <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-4 wow fadeInRight mb30" data-wow-delay="1.1s">
                                                <div class="de_count text-left">
                                                    <h3><span><?php echo $stadistics ->  getTotalUserCount($pdo) ?></span></h3>
                                                    <h5 class="id-color">Players</h5>
                                                </div>
                                            </div>

                                            <?php if($whitelistwidget) { ?>
                                            <div class="col-lg-4 col-md-6 col-sm-4 wow fadeInRight mb30" data-wow-delay="1.4s">
                                                <div class="de_count text-left">
                                                    <h3><span><?php echo $stadistics -> getTotalUserWhitelist($pdo) ?></span></h3>
                                                    <h5 class="id-color">Whitelist</h5>
                                                </div>
                                            </div>
                                            <?php } ?>

                                            <div class="col-lg-4 col-md-6 col-sm-4 wow fadeInRight mb30" data-wow-delay="1.7s">
                                                <div class="de_count text-left">
                                                    <h3><span><?php echo $stadistics -> getTotalUserStaff($pdo) ?></span></h3>
                                                    <h5 class="id-color">Staff</h5>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-6 xs-hide">
                                <img src="images/misc/women-with-vr.png" class="img-fluid wow fadeInUp" data-wow-delay=".75s" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section id="section-text" class="no-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="style-2">About us</h2>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-sm-30">
                            <div class="feature-box f-boxed style-3">
                                <i class="wow fadeInUp bg-color-2 i-boxed icon_wallet"></i>
                                <div class="text">
                                    <h4 class="wow fadeInUp">Tittle 1</h4>
                                    <p class="wow fadeInUp" data-wow-delay=".25s">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae vel odit architecto.</p>
                                </div>
                                <i class="wm icon_wallet"></i>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-sm-30">
                            <div class="feature-box f-boxed style-3">
                                <i class="wow fadeInUp bg-color-2 i-boxed icon_cloud-upload_alt"></i>
                                <div class="text">
                                    <h4 class="wow fadeInUp">Tittle 2</h4>
                                    <p class="wow fadeInUp" data-wow-delay=".25s">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae vel odit architecto.</p>
                                </div>
                                <i class="wm icon_cloud-upload_alt"></i>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-sm-30">
                            <div class="feature-box f-boxed style-3">
                                <i class="wow fadeInUp bg-color-2 i-boxed icon_tags_alt"></i>
                                <div class="text">
                                    <h4 class="wow fadeInUp">Tittle 3</h4>
                                    <p class="wow fadeInUp" data-wow-delay=".25s">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae vel odit architecto.</p>
                                </div>
                                <i class="wm icon_tags_alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

			
			
        </div>
        <!-- content close -->
        <a href="#" id="back-to-top"></a>
        
        <?php include 'footer.php';?>
        
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
    <script src="js/particles.js"></script>
    <script src="js/particles-settings.js"></script>

</body>

</html>