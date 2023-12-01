<?php 
ob_start();

include 'sidebar.php';
include 'php/id.php';

if (!($player -> LoggedIn()))
{
	header('location: index.php');
	die();
}

  function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

  if (isset($_POST['item'])) {
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];   
    $folder = "photos/marketplace/".$filename;

    $price = $_POST['item_price'];
    $title = $_POST['item_title'];
    $desc = $_POST['item_desc'];
    $plate = $_POST['plate'];


    debug_to_console($plate);
    $ide = $row['identifier'];
    $SQL = $pdo -> prepare("INSERT INTO marketplace (photo, name, price, description, likes, identifier, plate, status) VALUES ('$filename', '$title', '$price', '$desc', 0, ' $ide', '$plate', 0 )");
    $SQL -> execute();

    header('location: market.php');
  }

?>


<!DOCTYPE html>
<html lang="zxx">

<head>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css'>
</head>

        <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>
            
            <!-- section begin -->
            <section id="subheader">
                    <div class="center-y relative text-center">
                        <div class="container">
                            <div class="row">
                                
                                <div class="col-md-12 text-center">
									<h1>Post vehicle for sale</h1>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
            </section>
            <!-- section close -->
            

            <!-- section begin -->
            <section aria-label="section">
                <div class="container">
                    <div class="row wow fadeIn">
                        <div class="col-lg-7 offset-lg-1">
                            <form id="form-create-item" class="form-border" method="post" action="marketplace.php" enctype="multipart/form-data">
                                <div class="field-set">
                                      <h5>Upload file</h5>

                                    <div class="d-create-file">
                                    <p id="file_name">PNG, JPG, GIF. Max 20mb.</p>
                                                    <br>
                                                    <div class='file file--upload'>
                                                    <label for='input-file'>
                                                        <i class="material-icons">cloud_upload</i>Upload
                                                    </label>
                                                    <input id='input-file' name="uploadfile" type='file' />
                                                    &nbsp;
                                                    <button type="submit" name="upload" class="btn btn-primary">
                                                    Submit!
                                                    </button> </div>
                                    </div>

                                    <div class="spacer-40"></div>

                                    <h5>Select method</h5>
                                    <div class="de_tab tab_methods">
                                        <ul class="de_nav">
                                            <li class="active"><span><i class="fa fa-tag"></i>Fixed price</span>
                                            </li>
                                        </ul>

                                        <div class="de_tab_content">
                                            <div id="tab_opt_1">
                                                <h5>Price</h5>
                                                <input type="text" name="item_price" id="item_price" class="form-control" placeholder="Enter price for the car" />
                                            </div>
                                        </div>

                                    </div>

                                    <div class="spacer-20"></div>


                                    <h5>Choose car</h5>
                                    <p class="p-info">In this list are all the vehicles you have in your garage.</p>

                                    <div id="item_collection" class="dropdown fullwidth mb20">
                                        <a href="#" class="btn-selector">Select Car</a>
                                        <ul id="plate" name="plate">
                                            <?php while ($rowveh = $vehicle -> fetch()) {?>
                                            <li><span><?php echo $rowveh['plate'];?></span><input type='hidden' name='plate'/></li>
                                            <?php }?>
                                        </ul>
                                    </div>

                                    <div class="spacer-20"></div>

                                    <h5>Title</h5>
                                    <input type="text" name="item_title" id="item_title" class="form-control" placeholder="e.g. 'Masseratti QuattroPorte Full Tuning" />

                                    <div class="spacer-20"></div>

                                    <h5>Description</h5>
                                    <textarea data-autoresize name="item_desc" id="item_desc" class="form-control" placeholder="e.g. 'Full tunning with turbo and coilovers'"></textarea>

                                    <div class="spacer-20"></div>

                                    <input type="submit" id="item" name="item" class="btn-main" value="Create Item">
                                    <div class="spacer-single"></div>
                                </div>
                            </form>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-xs-12">
                                <h5>Preview item</h5>
                                <div class="nft__item style-2">
                                    <div class="author_list_pp">
                                        <a href="#">                                    
                                        <img src="photos/<?php echo $profile->getPhoto($pdo);?>" alt="">
                                            <i class="fa fa-check"></i>
                                        </a>
                                    </div>
                                    <div class="nft__item_wrap">
                                        <a href="#">
                                            <img src="<?php echo $folder;?>" id="get_file_2" class="lazy nft__item_preview" alt="">
                                        </a>
                                    </div>
                                    <div class="nft__item_info">
                                        <a href="#">
                                            <h4>Test</h4>
                                        </a>
                                        <div class="nft__item_click">
                                        <span></span>
                                    </div>
                                    <div class="nft__item_price">
                                            Test
                                        </div>
                                        <div class="nft__item_action">
                                            <a href="#">Buy</a>
                                        </div>
                                        <div class="nft__item_like">
                                            <i class="fa fa-heart"></i><span>50</span>
                                        </div>                            
                                    </div> 
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