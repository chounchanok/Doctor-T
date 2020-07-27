<!DOCTYPE html>
<html lang="en">
<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Site Metas -->
<title>Before / After | Doctor T Dental Clinic</title>
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

<link rel='stylesheet' href='css/owl.carousel.min.css'>
<!-- responsive -->
<link href="css/responsive/before-res.css" rel="stylesheet">


</head>

<body>

    <div id="wrapper">
        <?php 
            $current_file = basename(__FILE__,'.php');
            include 'header.php';
        ?>
        <?php 
            include 'init.php';
            $banner_befor_list = banner_before_list();

            $before_after_list = before_list();
            $before_after_list_two = before_two_list();
            $before_after_list_tree = before_tree_list();
            $before_after_list_four = before_four_list();
            $before_after_list_five = before_five_list();
            $before_after_list_six = before_six_list();
            $before_after_list_seven = before_seven_list();
        ?>
        <section class="header-index">
            <div class="owl-slider">
                <div id="banner-slidebefore" class="owl-carousel">
                <?php foreach ($banner_befor_list as $banner_befor_detail) : ?>
                    <div class="item">
                        <img src="images/banner_beforafter/<?php echo $banner_befor_detail->id; ?>/<?php echo $banner_befor_detail->img_cover; ?>" class="img-responsive"/>
                        <!-- <a href="">
                            <img src="images/teeth.jpg" class="img-responsive">
                        </a> -->
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </section>
        <section class="teeth-white">

            <div class="tab-blue-before">
                <div class="container">
                    <h1>Before / After</h1>
                </div>
            </div>
        </section>
        <section class="cat-grey">
            <div class="container">
                <div class="teeth-cat">
                    <li>
                        <img class="tablinks" data-toggle="collapse" href="#id1" src="images/catteeth/cat (1).png">
                        <p>OVERHANG<br>TEETH<br>ฟันยื่น</p>
                    </li>
                    <li>
                        <img class="tablinks" data-toggle="collapse" href="#id2" src="images/catteeth/cat (2).png">
                        <p>XXXXXXXX<br>ปากอูม<br><br></p>
                    </li>
                    <li>
                        <img class="tablinks" data-toggle="collapse" href="#id3" src="images/catteeth/cat (3).png">
                        <p>XXXXXXXX<br>ฟันล่างคร่อมบน<br><br></p>
                    </li>
                    <li>
                        <img class="tablinks" data-toggle="collapse" href="#id4" src="images/catteeth/cat (4).png">
                        <p>XXXXXXXX<br>ฟันขึ้นเก<br><br></p>
                    </li>
                    <li>
                        <img class="tablinks" data-toggle="collapse" href="#id5" src="images/catteeth/cat (5).png">
                        <p>XXXXXXXX<br>ฟันหายบางซี่<br><br></p>
                    </li>
                    <li>
                        <img class="tablinks" data-toggle="collapse" href="#id6" src="images/catteeth/cat (6).png">
                        <p>XXXXXXXX<br>เขี้ยวอยู่สูง,<br class="show-ip">ฟันฝัง<br></p>
                    </li>
                    <li>
                        <img class="tablinks" data-toggle="collapse" href="#id7" src="images/catteeth/cat (7).png">
                        <p>OTHER<br>อื่นๆ<br><br></p>
                    </li>
                </div>
            </div>
        </section>
        <section class="cat-grey-detail tabcontent" id="id1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 padding-bottom-30">
                        <hr class="blue-hr2">
                    </div>
                    <div class="col-lg-12">
                        <div class="header-detail">
                            <h1>OVERHANG TEETH</h1>
                            <h2>ฟันยื่น</h2>
                        </div>
                    </div>
                    <?php foreach ($before_after_list as $before_after_detail) : ?>
                    <div class="col-lg-6 col-md-6">
                        <a href="before-after-detail">
                            <div class="review-detail">
                                <img src="images/before_after/<?php echo $before_after_detail->id; ?>/<?php echo $before_after_detail->img_cover; ?>" class="img-responsive">
                                <p><?php echo $before_after_detail->dsc; ?></p>
                            </div>
                        </a>
                    </div>
                    <?php endforeach ?>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <button class="button-showmore">Show more</button>
                    </div>
                </div>
            </div>
        </section>

        <section class="cat-grey-detail tabcontent" id="id2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 padding-bottom-30">
                        <hr class="blue-hr2">
                    </div>
                    <div class="col-lg-12">
                        <div class="header-detail">
                            <h1>XXXXXXXXX</h1>
                            <h2>ปากอูม</h2>
                        </div>
                    </div>
                    <?php foreach ($before_after_list_two as $before_after_detail_two) : ?>
                    <div class="col-lg-6 col-md-6">
                        <a href="before-after-detail">
                            <div class="review-detail">
                                <img src="images/before_after/<?php echo $before_after_detail_two->id; ?>/<?php echo $before_after_detail_two->img_cover; ?>" class="img-responsive">
                                <p><?php echo $before_after_detail_two->dsc; ?></p>
                            </div>
                        </a>
                    </div>
                    <?php endforeach ?>                   
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <button class="button-showmore">Show more</button>
                    </div>
                </div>
            </div>
        </section>

        <section class="cat-grey-detail tabcontent" id="id3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 padding-bottom-30">
                        <hr class="blue-hr2">
                    </div>
                    <div class="col-lg-12">
                        <div class="header-detail">
                            <h1>XXXXXXXXX</h1>
                            <h2>ฟันล่างคร่อมบน</h2>
                        </div>
                    </div>
                    <?php foreach ($before_after_list_tree as $before_after_detail_tree) : ?>
                    <div class="col-lg-6 col-md-6">
                        <a href="before-after-detail">
                            <div class="review-detail">
                                <img src="images/before_after/<?php echo $before_after_detail_tree->id; ?>/<?php echo $before_after_detail_tree->img_cover; ?>" class="img-responsive">
                                <p><?php echo $before_after_detail_tree->dsc; ?></p>
                            </div>
                        </a>
                    </div>
                    <?php endforeach ?>  
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <button class="button-showmore">Show more</button>
                    </div>
                </div>
            </div>
        </section>

        <section class="cat-grey-detail tabcontent" id="id4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 padding-bottom-30">
                        <hr class="blue-hr2">
                    </div>
                    <div class="col-lg-12">
                        <div class="header-detail">
                            <h1>XXXXXXXXX</h1>
                            <h2>ฟันขึ้นเก</h2>
                        </div>
                    </div>
                    <?php foreach ($before_after_list_four as $before_after_detail_four) : ?>
                    <div class="col-lg-6 col-md-6">
                        <a href="before-after-detail">
                            <div class="review-detail">
                                <img src="images/before_after/<?php echo $before_after_detail_four->id; ?>/<?php echo $before_after_detail_four->img_cover; ?>" class="img-responsive">
                                <p><?php echo $before_after_detail_four->dsc; ?></p>
                            </div>
                        </a>
                    </div> 
                    <?php endforeach ?>                    
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <button class="button-showmore">Show more</button>
                    </div>
                </div>
            </div>
        </section>

        <section class="cat-grey-detail tabcontent" id="id5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 padding-bottom-30">
                        <hr class="blue-hr2">
                    </div>
                    <div class="col-lg-12">
                        <div class="header-detail">
                            <h1>XXXXXXXXX</h1>
                            <h2>ฟันหายบางซี่</h2>
                        </div>
                    </div>
                    <?php foreach ($before_after_list_five as $before_after_detail_five) : ?>
                    <div class="col-lg-6 col-md-6">
                        <a href="before-after-detail">
                            <div class="review-detail">
                                <img src="images/before_after/<?php echo $before_after_detail_five->id; ?>/<?php echo $before_after_detail_five->img_cover; ?>" class="img-responsive">
                                <p><?php echo $before_after_detail_five->dsc; ?></p>
                            </div>
                        </a>
                    </div>
                    <?php endforeach ?> 
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <button class="button-showmore">Show more</button>
                    </div>
                </div>
            </div>
        </section>

        <section class="cat-grey-detail tabcontent" id="id6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 padding-bottom-30">
                        <hr class="blue-hr2">
                    </div>
                    <div class="col-lg-12">
                        <div class="header-detail">
                            <h1>XXXXXXXXX</h1>
                            <h2>เขี้ยวอยู่สูง,ฟันฝัง</h2>
                        </div>
                    </div>
                    <?php foreach ($before_after_list_six as $before_after_detail_six) : ?>
                    <div class="col-lg-6 col-md-6">
                        <a href="before-after-detail">
                            <div class="review-detail">
                                <img src="images/before_after/<?php echo $before_after_detail_six->id; ?>/<?php echo $before_after_detail_six->img_cover; ?>" class="img-responsive">
                                <p><?php echo $before_after_detail_six->dsc; ?></p>
                            </div>
                        </a>
                    </div>
                    <?php endforeach ?>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <button class="button-showmore">Show more</button>
                    </div>
                </div>
            </div>
        </section>

        <section class="cat-grey-detail tabcontent" id="id7">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 padding-bottom-30">
                        <hr class="blue-hr2">
                    </div>
                    <div class="col-lg-12">
                        <div class="header-detail">
                            <h1>OTHER</h1>
                            <h2>อื่นๆ</h2>
                        </div>
                    </div>
                    <?php foreach ($before_after_list_seven as $before_after_detail_seven) : ?>
                    <div class="col-lg-6 col-md-6">
                        <a href="before-after-detail">
                            <div class="review-detail">
                                <img src="images/before_after/<?php echo $before_after_detail_seven->id; ?>/<?php echo $before_after_detail_seven->img_cover; ?>" class="img-responsive">
                                <p><?php echo $before_after_detail_seven->dsc; ?></p>
                            </div>
                        </a>
                    </div> 
                    <?php endforeach ?>                  
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <button class="button-showmore">Show more</button>
                    </div>
                </div>
            </div>
        </section>




        <!-- //////////////////////////////// Default Open ///////////////////////////// -->
        <section class="detail-teeth" id="defaultopen">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <a href="before-after-detail">
                            <div class="review-detail">
                                <img src="images/review.png" class="img-responsive">
                                <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย Invisalign
                                    รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                            </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <a href="before-after-detail">
                            <div class="review-detail">
                                <img src="images/review.png" class="img-responsive">
                                <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย Invisalign
                                    รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                            </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <button class="button-showmore">Show more</button>
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
    <script src='js/owl.carousel.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>
    <script src="js/script.js"></script>

    <script>
        $(function () {
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
    <script>
        $(document).click(function (e) {
            if (!$(e.target).is('.panel-body')) {
                $('.collapse').collapse('hide').slideUp();
            }
        });
        // function openCity(evt, cityName) {
        //     var i, tabcontent, tablinks;

        //     tabcontent = document.getElementsByClassName("tabcontent");
        //     for (i = 0; i < tabcontent.length; i++) {
        //         tabcontent[i].style.display = "none";
        //     }
        //     tablinks = document.getElementsByClassName("tablinks");
        //     for (i = 0; i < tablinks.length; i++) {
        //         tablinks[i].className = tablinks[i].className.replace(" active", "");
        //     }
        //     document.getElementById(cityName).style.display = "block";
        //     evt.currentTarget.className += " active";
        // }
        // document.getElementById("defaultOpen").click();

        // document.getElementByClassName("active").click(
        //     document.getElementById(cityName).style.display = "none";
        //     document.getElementById("defaultOpen").style.display = "block";
        // );
        // document.getElementsByClassName("active").click(function(){
        //     $('.active').removeClass('active');
        // };
    </script>
    <script>
        $(document).ready(function () {
            $(".tablinks").click(function () {
                $("#defaultopen").hide();
                $(".blue-hr").hide();
            });
        });
    </script>
    <!-- <script>
        function ShowHide(divId) {
            var a = document.getElementById('id1').value;

            if (document.getElementById(divId).style.display == 'none') {
                document.getElementById(divId).style.display = 'block';
            } else {
                document.getElementById(divId).style.display = 'none';
            }
        }
    </script> -->

</body>

</html>