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



$id = $_GET['id'];
$SQL = $pdo -> prepare("SELECT * FROM marketplace WHERE id = '$id'");
$SQL -> execute();
$row = $SQL -> fetch();

$ide = $row['identifier'];
$user = $pdo -> prepare("SELECT * FROM users WHERE identifier = '$ide'");
$user -> execute();
$rowuser = $user -> fetch();
debug_to_console($rowuser['name']);
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css'>
</head>
<body class="dark-scheme de-grey">
    <div id="wrapper">
        <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>
            

            <section aria-label="section" class="mt90 sm-mt-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <img src="photos/marketplace/<?php echo $row['photo'];?>" class="img-fluid img-rounded mb-sm-30" alt="">
                        </div>
                        <div class="col-md-6">
                                <h2><?php echo $row['name'];?></h2>
                                <div class="item_info_counts">
                                    <div class="item_info_type"><i class="fa fa-image"></i>Art</div>
                                    <div class="item_info_like"><i class="fa fa-heart"></i><?php echo $row['likes'];?></div>
                                </div>
                                <p><?php echo $row['description'];?></p>
                                
                                <div class="de_tab_content">
                                        <h6>Owner</h6>
                                        <div class="item_author">                                    
                                            <div class="author_list_pp">
                                                <a href="03_grey-author.html">
                                                    <img class="lazy" src="photos/<?php echo $rowuser['profile_image'];?>" alt="">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                            </div>                                    
                                            <div class="author_list_info">
                                                <a href="03_grey-author.html"><?php echo $rowuser['firstname'].' '.$rowuser['lastname'];?></a>
                                            </div>
                                        </div>

                                <div class="spacer-40"></div>

                                <h6>Price</h6>
                                <div class="nft-item-price"><span>$<?php echo $row['price'];?></span></div>

                                <!-- Button trigger modal -->
                                <a href="#" class="btn-main btn-lg" data-bs-toggle="modal" data-bs-target="#buy_now">
                                  Buy Now
                                </a>
                                &nbsp;
                                <a href="market.php" class="btn-main btn-lg btn-light">
                                  Back
                                </a>
                                
                            </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            
        </div>
        <!-- content close -->

        <!-- buy now -->
        <div class="modal fade" id="buy_now" tabindex="-1" aria-labelledby="buy_now" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered de-modal">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="modal-body">
                <div class="p-3 form-border">
                    <h3>Checkout</h3>
                    You are about to purchase a <b><?php echo $row['name'];?></b> from <b><?php echo $rowuser['firstname'].' '.$rowuser['lastname'];?>.</b>
                    <div class="spacer-single"></div>
                    <div class="spacer-single"></div>
                    <div class="de-flex">
                        <div>Your balance</div>
                        <div><b>$<?php echo $profile->getTotalBank($pdo); ?></b></div>
                    </div>
                    <div class="de-flex">
                        <div>You will pay</div>
                        <div><b>$<?php echo $row['price'];?></b></div>
                    </div>
                    <div class="spacer-single"></div>
                    <?php if ($profile->getTotalBank($pdo) < $row['price']) {?>
                    <a href="market.php" class="btn-main btn-fullwidth">Insufficient funds</a>
                    <?php } else {?>
                    <a href="productbuy.php" class="btn-main btn-fullwidth">Buy now</a>
                    <?php } ?>


                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- place a bid -->
        <div class="modal fade" id="place_a_bid" tabindex="-1" aria-labelledby="place_a_bid" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered de-modal">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="modal-body">
                <div class="p-3 form-border">
                    <h3>Place a Bid</h3>
                    You are about to place a bid for <b>Red Ocean</b> from <b>Monica Lucas</b>
                    <div class="spacer-single"></div>
                    <h6>Your bid (ETH)</h6>
                    <input type="text" name="bid_value" id="bid_value" class="form-control" placeholder="Enter bid" />
                    <div class="spacer-single"></div>
                    <h6>Enter quantity. <span class="id-color-2">10 available</span></h6>
                    <input type="text" name="bid_qty" id="bid_qty" class="form-control" value="1" />
                    <div class="spacer-single"></div>
                    <div class="de-flex">
                        <div>Your bidding balance</div>
                        <div><b>0.013325 ETH</b></div>
                    </div>
                    <div class="de-flex">
                        <div>Your balance</div>
                        <div><b>10.67856 ETH</b></div>
                    </div>
                    <div class="de-flex">
                        <div>Service fee 2.5%</div>
                        <div><b>0.00325 ETH</b></div>
                    </div>
                    <div class="de-flex">
                        <div>You will pay</div>
                        <div><b>0.013325 ETH</b></div>
                    </div>
                    <div class="spacer-single"></div>
                    <a href="03_grey-wallet.html" target="_blank" class="btn-main btn-fullwidth">Place a bid</a>
                </div>
              </div>
            </div>
          </div>
        </div>

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