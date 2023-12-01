<?php
session_start();
require 'php/database.php';
require 'php/init.php';

if(isset($_COOKIE['remember_me']))
{  
    $str = $_COOKIE['remember_me'];
    $stmt = $pdo -> query("SELECT * FROM `$framework` WHERE SessID='$str'");
    $row= $stmt -> fetch();
    if($_COOKIE['remember_me'] == $row['SessID'])
    {
    }
}


function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

?>




<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>User Panel</title>
    <link rel="icon" href="images/icon.png" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Gigaland - NFT Marketplace Website Template" name="description" />
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
    
    
    <link id="colors" href="css/colors/scheme-01.css" rel="stylesheet" type="text/css" />
    <link href="css/coloring.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  
</head>

<body>
    <div id="wrapper">
        <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>
			
			<section class="full-height relative no-top no-bottom vertical-center" data-bgimage="url(images/background/subheader.jpg) top" data-stellar-background-ratio=".5">
                <div class="overlay-gradient t50">
					<div class="center-y relative">
						<div class="container">
							<div class="row align-items-center">
								<div class="col-lg-5 text-light wow fadeInRight" data-wow-delay=".5s">
                                <div class="spacer-10"></div>
                                <h1>Example Roleplay</h1>
                                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim.</p>
                            </div>
								
                            <?php
if (!($player -> LoggedIn()))
{
	if (isset($_POST['loginBtn']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$errors = array();

		if (empty($username) || empty($password))
		{
			$errors[] = '';
		}

		if (empty($errors))
		{
			$SQLCheckLogin = $pdo -> prepare("SELECT COUNT(*) FROM `$framework` WHERE `username` = :username AND `password` = :password");
			$SQLCheckLogin -> execute(array(':username' => $username, ':password' => $password));
			$countLogin = $SQLCheckLogin -> fetchColumn(0);
			if ($countLogin == 1)
			{
				$SQLGetInfo = $pdo -> prepare("SELECT `username`, `id` FROM `$framework` WHERE `username` = :username AND `password` = :password");
				$SQLGetInfo -> execute(array(':username' => $username, ':password' => $password));
				$userInfo = $SQLGetInfo -> fetch(PDO::FETCH_ASSOC);
				$userid = $userInfo['id'];
                $_SESSION['username']= $userInfo['username'];
                   

				if ($userInfo['id'] > -1)
				{
					$_SESSION['username'] = $userInfo['username'];
					$_SESSION['ID'] = $userInfo['id'];
					$successModal = true;
                    echo '<meta http-equiv="refresh" content="3;url=index.php">';
                    
				}
				else
				{
                    $errorModal = true;
				}
			}
			else
			{
                $errorModal = true; 
			}
		}
		else
		{
            $errorModal = true;
		}
	}
}
else
{
    $successModal = true;
    echo "<meta http-equiv=\"refresh\" content=\"3;url=index.php\">";
	die();
}
                                    ?>
								<div class="col-lg-4 offset-lg-2 wow fadeIn" data-wow-delay=".5s">
									<div class="box-rounded padding40" data-bgcolor="#ffffff">
										<h3 class="mb10">Sign In</h3>
										<p>Login using an existing account</p>
										
                                        <form name="contactForm" id='contact_form' class="form-border" action="" method="post" >

                                            <div class="field-set">
                                                <input type='text' name='username' id='username' class="form-control" placeholder="username">
                                            </div>
											
											 <div class="field-set">
                                                <input type='password' name='password' id='password' class="form-control" placeholder="password">
                                            </div>
											
											<div class="field-set">
												<input type='submit' id='loginBtn' name="loginBtn" value='Submit' class="btn btn-main btn-fullwidth color-2">
											</div>
											
											<div class="clearfix"></div>
											
											<div class="spacer-single"></div>

                                </form>
									</div>
                                  
								</div>
                                
							</div>
						</div>
					</div>
				</div>
                
			</section>
            
            
             <!-- Modals -->
            <div class="modal fade" id="errorModal" tabindex="1040" aria-labelledby="errorModal" aria-hidden="true">
               <div class="modal-dialog">
                 <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Error</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
               <div class="modal-body">
               Incorrect username/password.
                    </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                   </div>
                      </div>
                         </div>
                            </div>

                            <div class="modal fade" id="sucessModal" tabindex="1040" aria-labelledby="sucessModal" aria-hidden="true">
               <div class="modal-dialog">
                 <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">User Confirmed!</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
               <div class="modal-body">
               Entering...
                    </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                   </div>
                      </div>
                         </div>
                            </div>
                                    
            
            </div>
            <!-- content close -->

            <!-- footer begin -->
        <footer class="footer-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-1">
                        <div class="widget">
                            <h5>Marketplace</h5>
                            <ul>
                                <li><a href="#">All NFTs</a></li>
                                <li><a href="#">Art</a></li>
                                <li><a href="#">Music</a></li>
                                <li><a href="#">Domain Names</a></li>
                                <li><a href="#">Virtual World</a></li>
                                <li><a href="#">Collectibles</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-1">
                        <div class="widget">
                            <h5>Resources</h5>
                            <ul>
                                <li><a href="#">Help Center</a></li>
                                <li><a href="#">Partners</a></li>
                                <li><a href="#">Suggestions</a></li>
                                <li><a href="#">Discord</a></li>
                                <li><a href="#">Docs</a></li>
                                <li><a href="#">Newsletter</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-1">
                        <div class="widget">
                            <h5>Community</h5>
                            <ul>
                                <li><a href="#">Community</a></li>
                                <li><a href="#">Documentation</a></li>
                                <li><a href="#">Brand Assets</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Forum</a></li>
                                <li><a href="#">Mailing List</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-1">
                        <div class="widget">
                            <h5>Newsletter</h5>
                            <p>Signup for our newsletter to get the latest news in your inbox.</p>
                            <form action="blank.php" class="row form-dark" id="form_subscribe" method="post" name="form_subscribe">
                                <div class="col text-center">
                                    <input class="form-control" id="txt_subscribe" name="txt_subscribe" placeholder="enter your email" type="text" /> <a href="#" id="btn-subscribe"><i class="arrow_right bg-color-secondary"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                            <div class="spacer-10"></div>
                            <small>Your email is safe with us. We don't spam.</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="subfooter">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="de-flex">
                                <div class="de-flex-col">
                                    <a href="index.html">
                                        <img alt="" class="f-logo" src="images/logo.png" /><span class="copy">&copy; Copyright 2021 - Gigaland by Designesia</span>
                                    </a>
                                </div>
                                <div class="de-flex-col">
                                    <div class="social-icons">
                                        <a href="#"><i class="fa fa-facebook fa-lg"></i></a>
                                        <a href="#"><i class="fa fa-twitter fa-lg"></i></a>
                                        <a href="#"><i class="fa fa-linkedin fa-lg"></i></a>
                                        <a href="#"><i class="fa fa-pinterest fa-lg"></i></a>
                                        <a href="#"><i class="fa fa-rss fa-lg"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
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
    <?php			
	if($errorModal) {
		echo '<script type="text/javascript">
			$(document).ready(function(){
				$("#errorModal").modal("show");
			});
		</script>';
	} if($successModal) {
		echo '<script type="text/javascript">
			$(document).ready(function(){
				$("#sucessModal").modal("show");      
			});
		</script>';
	} ?>
    

<style> .modal-backdrop { z-index: -1; }</style>
        

		
</body>

</html>
