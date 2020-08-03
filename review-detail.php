<!DOCTYPE html>
<html lang="en">
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Site Metas -->
    <title>Review Detail | Doctor T Dental Clinic</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/logodrt.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/logodrt.png">
    <!-- Design fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">  -->
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- FontAwesome Icons core CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">
    <!-- Responsive styles for this template -->
    <link href="css/responsive.css" rel="stylesheet">
    <!-- Colors for this template -->
    <link href="css/colors.css" rel="stylesheet">
    <!-- Version Garden CSS for this template -->
    <link href="css/version/garden.css" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />

    <!-- responsive -->
    <link href="css/responsive/review-res.css" rel="stylesheet">

</head>
<body>

    <div id="wrapper">
        <?php 
            $current_file = basename(__FILE__,'.php');
            include 'header.php';
        ?>
        <?php
            include 'init.php';
            $review_detail1_wh = review_detail_list_wh($_GET['id']);
            $review_detail1 = review_detail_list();
        ?>
        <section class="banner-review">
            <div class="container">
                <img src="images/bannerreview.png" class="img-responsive">
            </div>
        </section>
        <section class="tab-review">
            <div class="container">
                <h1>Review / Success Story</h1>
            </div>
        </section>
        <section class="review-detail">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <?php 
                            $ck_vdo = $review_detail1_wh->link;
                            if($ck_vdo == TRUE){
                        ?>
                            <iframe class="video-width" width="560" height="315" src="<?php echo $review_detail1_wh->link; ?>" frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                            <div class="col-lg-12">
                            
                                <div class="detail-review">
                                    <h2><?php echo $review_detail1_wh->name; ?></h2>
                                    <hr>
                                    <?php echo html_entity_decode($review_detail1_wh->dsc); ?>
                                </div>
                            </div>
                        <?php }else{ ?>
                        <img src="images/review_detail/<?php echo $review_detail1_wh->id; ?>/<?php echo $review_detail1_wh->img_cover; ?>" class="img-responsive">
                    </div>
                    <div class="col-lg-12">
                        <div class="detail-review">
                            <h2><?php echo $review_detail1_wh->name; ?></h2>
                            <hr>
                            <h5><?php echo html_entity_decode($review_detail1_wh->dsc); ?></h5>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="review-all">
                            <hr>
                        </div>
                    </div>
                    <?php foreach ($review_detail1 as $review_list) : ?>
                    <div class="col-lg-4 col-md-6">
                            <!-- <a class="popup-youtube" href="<?php echo $review_list->link; ?>"> -->
                                <img src="images/review_detail/<?php echo $review_list->id; ?>/<?php echo $review_list->img_cover; ?>" class="img-responsive">
                            <!-- </a> -->
                            <a href="review-detail?id=<?php echo $review_list->id; ?>">
                            <div class="content-review">
                                <h4><?php echo $review_list->name; ?></h4>
                                <hr>
                                <?php echo html_entity_decode($review_list->dsc); ?>
                            </div>
                        </a>
                    </div>
                    <?php endforeach ?>

                    <div class="col-lg-12 text-center">
                        <a class="button-showmore" href="review"><< BACK</a>
                    </div>
                </div>
            </div>
        </section>
        <?php 
            include 'top-footer.php';
            include 'footer.php';
        ?>
    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <!-- <script src="js/jquery.min.js"></script> -->
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/script.js"></script>
    <script>
        $(function() {
            $('.popup-youtube').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false,
            });
        });
    </script>
</body>
</html>