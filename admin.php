<?php
ob_start();

include 'sidebar.php';
include 'php/id.php';

if (!$player->LoggedIn()) {
    header('location: index.php');
    die();
}

if (!$admin->getAdmin($pdo)) {
    header('location: index.php');
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
</head>

<body>
    <div id="wrapper">

        <!-- content begin -->
        <div class="no-bottom" id="content">
            <div id="top"></div>

            <section aria-label="section">
                <div class="container">
                    <div class="row">
                    <input id="quick_search" class="xs-hide" name="quick_search" style="margin-left:-10px; color:white;"placeholder="Search Here..." type="text" />
                        <div class="col-md-12">
                            <table id="table" class="table de-table table-rank">
                              <thead>
                                <tr>
                                  <th scope="col">IC name</th>
                                  <th scope="col">Identifier</th>
                                  <th scope="col">Cash</th>
                                  <th scope="col">Bank</th>
                                  <th scope="col">Job</th>
                                  <th scope="col">Job Grade</th>
                                  <th scope="col">Sex</th>
                                  <th scope="col">CK</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php while ($row = $ranking->fetch()) { ?>
                                      <?php if ($esx_legacy) { ?>
                                <tr>
                                  <th scope="row">
                                  <!-- Image --> 
                                  <?php echo '<a href=profileadmin.php?identifier=' .
                                      $row['identifier'] .
                                      '>'; ?>
                                  <div class="coll_list_pp">
                                  <div class="hover01 column">
                                  <figure>  <img src="photos/<?php echo $row['profile_image'];?>" alt=""> </figure>
                                  </div> </div> </a>
                                  <!-- Name -->
                                  <?php if ($row['firstname'] == '') {
                                          echo 'Unknow';
                                      } else {
                                          echo $row['firstname'] .
                                          ' ' .
                                          $row['lastname'];
                                      } ?></th>
                                  <!-- Identifier -->
                                  <td><?php echo $row['identifier']; ?></td>
                                  <!-- Money -->
                                  <td class="d-plus">$<?php echo $row[
                                      'money'
                                  ]; ?></td>
                                  <!-- Bank -->
                                  <td class="d-plus">$<?php echo $row[
                                      'bank'
                                  ]; ?></td>
                                  <!-- Job -->
                                  <td><?php echo $row['job']; ?></td>
                                  <!-- Job Grade -->
                                  <td><?php echo $row['job_grade']; ?></td>
                                  <!-- Sex -->
                                  <td><?php if ($row['sex'] == 'm') {
                                      echo 'Male';
                                  } else {
                                      echo 'Female';
                                  } ?></td>
                                  <!-- Character Kill -->
                                  <td> <a href="adminck.php?id=<?php echo $row[
                                      'identifier'
                                  ]; ?>">  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ckModal">
                                      CK
                                  </button></a> </td>
                                </tr>
                                <?php } ?>

                                <?php if ($esx_v1) { ?>
                                        <tr>
                                            <th scope="row">
                                                <div class="coll_list_pp">
                                                    <img class="lazy" src="images/author/author-1.png" alt="">
                                                </div>
                                                <?php if (
                                                    $row['firstname'] == ''
                                                ) {
                                      echo 'Unknow';
                                  } else {
                                      echo $row['firstname'] .
                                                        ' ' .
                                                        $row['lastname'];
                                  } ?></th>
                                            <td><?php echo $row[
                                                'identifier'
                                            ]; ?></td>
                                            <td class="d-plus">$<?php echo $moneyjson->{'money'}; ?></td>
                                            <td class="d-plus">$<?php echo $moneyjson->{'bank'}; ?></td>
                                            <td><?php echo $row['job']; ?></td>
                                            <td><?php echo $row[
                                                'job_grade'
                                            ]; ?></td>
                                            <td><?php if ($row['sex'] == 'm') {
                                                echo 'Male';
                                            } else {
                                                echo 'Female';
                                            } ?></td>
                                            <td> <a href="adminck.php?id=<?php echo $row[
                                                'identifier'
                                            ]; ?>"><button type="submit"  style="width:50px; height:35px; font-size: 13px; margin-top:-7px;" class="btn btn-lg btn-danger">CK</Button></a> </td>
                                        </tr>
                                    <?php } ?>

                                    <?php if ($esx_v1final) { ?>
                                        <tr>
                                            <th scope="row">
                                                <div class="coll_list_pp">
                                                    <img class="lazy" src="images/author/author-1.png" alt="">
                                                </div>
                                                <?php if (
                                                    $row['firstname'] == ''
                                                ) {
                                                echo 'Unknow';
                                            } else {
                                                echo $row['firstname'] .
                                                        ' ' .
                                                        $row['lastname'];
                                            } ?></th>
                                            <td><?php echo $row[
                                                'identifier'
                                            ]; ?></td>
                                            <td class="d-plus">$<?php echo $moneyjson->{'cash'}; ?></td>
                                            <td class="d-plus">$<?php echo $moneyjson->{'bank'}; ?></td>
                                            <td><?php echo $row['job']; ?></td>
                                            <td><?php echo $row[
                                                'job_grade'
                                            ]; ?></td>
                                            <td><?php if ($row['sex'] == 'm') {
                                                echo 'Male';
                                            } else {
                                                echo 'Female';
                                            } ?></td>
                                            <td> <a href="adminck.php?id=<?php echo $row[
                                                'identifier'
                                            ]; ?>"><button type="submit"  style="width:50px; height:35px; font-size: 13px; margin-top:-7px;" class="btn btn-lg btn-danger">CK</Button></a> </td>
                                        </tr>
                                    <?php } ?>
                                  

                                <?php if ($qbcore) {
                                                $jsonchar = $row['charinfo'];
                                                $charjson = json_decode($jsonchar);

                                                $jsonmoney = $row['money'];
                                                $moneyjson = json_decode($jsonmoney);

                                                $jsonj = $row['job'];
                                                $jobjson = json_decode($jsonj);
                                                debug_to_console($moneyjson->{'cash'}); ?>
                                <tr>
                                  <th scope="row">
                                  <div class="coll_list_pp">
                                  <!-- Image --> 
                                  <?php echo '<a href=profileadmin.php?identifier=' .
                                      $row['citizenid'] .
                                      '>'; ?>
                                  <div class="coll_list_pp">
                                  <div class="hover01 column">
                                  <figure>  <img src="photos/<?php echo $row['profile_image'];?>" alt=""> </figure>
                                  </div> </div> </a>
                                  </div>  
                                  <?php if ($charjson->{'firstname'} == '') {
                                                    echo 'Unknow';
                                                } else {
                                                    echo $charjson->{'firstname'} .
                                          ' ' .
                                          $charjson->{'lastname'};
                                                } ?></th>
                                  <td><?php echo $row['citizenid']; ?></td>
                                  <td class="d-plus">$<?php echo $moneyjson->{'cash'}; ?></td>
                                  <td class="d-plus">$<?php echo $moneyjson->{'bank'}; ?></td>
                                  <td><?php echo $jobjson->{'label'}; ?></td>
                                  <td><?php echo $jobjson->{'grade'}
                                      ->{'name'}; ?></td>
                                  <td><?php if ($charjson->{'gender'} == '0') {
                                          echo 'Male';
                                      } else {
                                          echo 'Female';
                                      } ?></td>
                                  <!-- Character Kill -->
                                  <td> <a href="adminck.php?id=<?php echo $row[
                                      'citizenid'
                                  ]; ?>">  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ckModal">
                                      CK
                                  </button></a> </td>
                                </tr>
                                <?php
                                            }  }?>
                              </tbody>
                             
                            </table>

                            <div class="spacer-double"></div>                                  
                        </div>
                    </div>
                </div>
            </section>
			
			
        </div>
        <!-- content close -->

        <a href="#" id="back-to-top"></a>
        
        <!-- footer begin -->
        <?php include 'footer.php'; ?>
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


<script>
var $rows = $('#table tr');
$('#quick_search').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});
</script>


</html>