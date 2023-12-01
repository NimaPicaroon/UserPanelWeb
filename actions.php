<?php 
ob_start();

include 'sidebar.php';

if (!($player -> LoggedIn()))
{
	header('location: index.php');
	die();
}
 
// If upload button is clicked ...
if (isset($_POST['upload'])) {

  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];   
  $folder = "photos/".$filename;

      $actions -> uploadImage($pdo, $filename);
       
      if (move_uploaded_file($tempname, $folder))  {
          $msg = "Image uploaded successfully";
      }else{
          $msg = "Failed to upload image";
    }
}

?>


<!DOCTYPE html>
<html lang="zxx">

<head>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css'>
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
                                        <img src="photos/<?php echo $profile->getPhoto($pdo);?>" alt="">
                                        <i class="fa fa-check"></i>
                                        <div class="profile_name">
                                            <h4>
                                            <?php echo $profile -> getIcName($pdo); ?>                                               
                                                <span class="profile_username"><?php echo $profile -> getName($pdo);?></span>
                                                <span id="wallet" class="profile_wallet"><?php echo $profile -> getIdentifier($pdo);?></span>
                                                
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile_follow de-flex">
                                    <div class="de-flex-col">
                                        <a href="profile.php" class="btn-main">Profile</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="de_tab tab_simple">
    
                                
                                <div class="de_tab_content">
                                    
                                    <div class="tab-1">
                                        <div class="row">
                                            <div class="row gx-2">
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                            <form action="actions.php" method="post">    
                                            <a class="nft_attr">
                                                    <h5>Character Kill</h5>
                                                    <h4>Are you sure you want to delete your entire character?</h4>
                                                    <br>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ckModal">
                                                    Click here to CK!
                                                    </button>
                                                </a>                                          
                                            </form>
                                            </div>  
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <a class="nft_attr">
                                                    <h5>Teleport to Garage</h5>
                                                    <h4>Are you sure you want to teleport to the central garage?</h4>
                                                    <br>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#TPModal">
                                                    Click here to TP!
                                                    </button>
                                                </a>
                                            </div> 
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <a class="nft_attr">
                                                    <h5>Change profile picture</h5>
                                                    <h4>Upload an image of your character <br>(800 X 800 Resolution) </h4>
                                                    <br>
                                                    <form method="POST" action="" enctype="multipart/form-data">
                                                    <div class='file file--upload'>
                                                    <label for='input-file'>
                                                        <i class="material-icons">cloud_upload</i>Upload
                                                    </label>
                                                    <input id='input-file' name="uploadfile" type='file' />
                                                    &nbsp;
                                                    <button type="submit" name="upload" class="btn btn-primary">
                                                    Submit!
                                                    </button> </div>
                                                    
                                                    </form>
                                                </a>

                                                
                                            </div>       
                                            
                                            
                                           
                                    </div>
                                </div>
                                    
                                

                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
				</div>
            </section>

             <!-- Modals -->
             <div class="modal fade" id="ckModal" tabindex="1040" aria-labelledby="ckModal" aria-hidden="true">
               <div class="modal-dialog">
                 <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">¡Attention!</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
               <div class="modal-body">
               Are you sure you want to delete your character? (This includes all your progress).
                    </div>
               <div class="modal-footer">
               <a href="CK.php">
               <button type="button" class="btn btn-primary">Save changes</button>
                </a>
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                   </div>
                      </div>
                         </div>
                            </div>

            <div class="modal fade" id="tpModal" tabindex="1040" aria-labelledby="tpModal" aria-hidden="true">
               <div class="modal-dialog">
                 <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">¡Attention!</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
               <div class="modal-body">
               Are you sure to teleport your character? (Only works if you are offline).
                    </div>
               <div class="modal-footer">
               <a href="teleport.php">
               <button type="button" class="btn btn-primary">Save changes</button>
                </a>
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                   </div>
                      </div>
                         </div>
                            </div>
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

    <?php			
	if($ckModal) {
		echo '<script type="text/javascript">
			$(document).ready(function(){
				$("#ckModal").modal("show");
			});
		</script>';
	} if($tpModal) {
		echo '<script type="text/javascript">
			$(document).ready(function(){
				$("#tpModal").modal("show");      
			});
		</script>';
	} ?>
    
</body>

</html>