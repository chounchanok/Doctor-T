<!DOCTYPE html>
<html lang="en">
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Site Metas -->
    <title>Home | Doctor T Dental Clinic</title>
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
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

    
    <link rel='stylesheet' href='css/owl.carousel.min.css'>

</head>
<body>
    <div id="wrapper">
        <?php 
            $current_file = basename(__FILE__,'.php');
            include 'header.php';
        ?>
        <?php 
            include 'init.php';
            $product_detail1 = product_id1();
            $product_detail2 = product_id2();
            $product_detail3 = product_id3();
            $banner_detail = banner_id();
            $banner_detail2 = banner_id2();
            $banner_list = banner_list();
            $reviews_list = reviews_list();
            $newsdetail_list = newsdetail_list();
        ?>
        <section class="header-index">
                <div class="owl-slider">
                    <div id="banner-slide" class="owl-carousel">
                        <?php foreach ($banner_list as $banner_detail) : ?>
                            <div class="item">
                                <a href="<?php echo $banner_detail->link; ?>">
                                    <img src="images/<?php echo $banner_detail->id; ?>/<?php echo $banner_detail->img_cover; ?>" class="img-responsive">
                                </a>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
        </section>

        <section class="tab-review-index">
            <div class="container text-right">
                <h1>The Highest commitment to excellence.™</h1>
            </div>
        </section>
        
        <!---->
                                    


<!-----------------------------------------------------------------------KHIM----------------------------------------------------------------------->

        <section class="we-different">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="h1-head-grey">
                            <h1>Why us ? ... <strong>We are Different</strong></h1>
                        </div>
                    </div>
                </div>

                <!------------------------------start------------------------->

                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">

                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>


                    <!------------------------------slide khim------------------------->

                    <div class="carousel-inner">

                        <?php 
                        // $box = 10;
                        $reviews = reviews_list();
                        $limit = 4;
                        $count = round(count($reviews)/$limit); //กล่อง = 3
                        // $total = 0;

                        for ($box=1; $box <= $count; $box++) { 

                            echo '<div class="carousel-item '.($box == 1 ? 'active' : '').' ">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">';
                            ?>
                                    <?php if($box == 1){
                                        $start = 0;
                                        $end = $limit;
                                        $frame = reviews_list_page($start.','.$end);
                                    }else{
                                        $start = ($box-1)*$limit;
                                        $end = $box*$limit;
                                        $frame = reviews_list_page($start.','.$end);
                                    }
//ครีม
                                    if(!empty($frame)){
                                        foreach ($frame as $_frame) {?>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="img-shadow">
                                                            <a class="popup-youtube"
                                                                href="<?php echo $_frame->link; ?>&mute=1&autoplay=1&loop=1&rel=0&controls=1">

                                                            <img src="images/reviews/<?php echo $_frame->id; ?>/<?php echo $_frame->img_cover; ?>" class="img-responsive">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="detail-index-slide">
                                                            <h2><?php echo $_frame->name; ?></h2>
                                                            <h1>Father Biondi</h1>
                                                            <h4><?php echo $_frame->desc; ?></h4>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                    } ?>
                                            </div>
                                        </div>
                                    </div>  
                                </div>

                        <?php } ?>

                    </div>
                          
                    <!------------------------------end------------------------->

                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </section>


        <!-----------------------------------------------------------------------KHIM----------------------------------------------------------------------->


        <!---->
               
        

        <section class="news-all">
            <div class="head-line">
                <div class="separator">
                    <h1>New Articles <strong>/ Update</strong></h1>
                </div>
            </div>
            <div class="container">
            <?php foreach ($newsdetail_list as $newsdetail_detail) : ?>
                <div class="row padding-bottom-30">
                    <div class="col-lg-5 col-md-5">
                        <div class="img-border">
                            <img src="images/news_detail/<?php echo $newsdetail_detail->id; ?>/<?php echo $newsdetail_detail->img_cover; ?>" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="detail-news">
                            <h2><?php echo $newsdetail_detail->name; ?></h2>
                            <h5><?php echo $newsdetail_detail->description; ?></h5>
                        </div>
                        <a class="button-readmore-inno" href="news-detail.php">Read more>></a>
                    </div>
                </div>
                <!-- <div class="row padding-bottom-30">
                    <div class="col-lg-5 col-md-5">
                        <div class="img-border">
                            <img src="images/news/innovations2.png" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="detail-news">
                            <h2>Innovations in orthodontics</h2>
                            <h5>Invisalign® เป็นส่วนหนึ่งของ Align Technology ซึ่งเป็นบริษัทอุปกรณ์ทางการแพทย์ระดับสากลที่มีผลิตภัณฑ์นวัตกรรมชั้นนำในอุตสาหกรรม
                            เราต้องการช่วยให้ผู้เชี่ยวชาญทางด้าน
                            ทันตกรรมทั้งหลายประสบความสำเร็จในการรักษาตามที่คาดหวังไว้และส่งมอบทางเลือกทาง
                            ทันตกรรมที่ให้ผลการรักษาที่ดีและทันสมัยให้กับผู้ป่วย</h5>
                        </div>
                        <a class="button-readmore-inno" href="news-detail.php">Read more>></a>
                    </div>
                </div>
                <div class="row padding-bottom-30">
                    <div class="col-lg-5 col-md-5">
                        <div class="img-border">
                            <img src="images/news/innovations3.png" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="detail-news">
                            <h2>Innovations in orthodontics</h2>
                            <h5>Invisalign® เป็นส่วนหนึ่งของ Align Technology ซึ่งเป็นบริษัทอุปกรณ์ทางการแพทย์ระดับสากลที่มีผลิตภัณฑ์นวัตกรรมชั้นนำในอุตสาหกรรม
                            เราต้องการช่วยให้ผู้เชี่ยวชาญทางด้าน
                            ทันตกรรมทั้งหลายประสบความสำเร็จในการรักษาตามที่คาดหวังไว้และส่งมอบทางเลือกทาง
                            ทันตกรรมที่ให้ผลการรักษาที่ดีและทันสมัยให้กับผู้ป่วย</h5>
                        </div>
                        <a class="button-readmore-inno" href="news-detail.php">Read more>></a>
                    </div>
                </div> -->
                <?php endforeach ?>
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
    <script src='js/owl.carousel.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>
    <script  src="js/script.js"></script>

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