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
<<<<<<< HEAD
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
            $random_befor_list = rands_before_list();
        ?>
=======

>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0
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
<<<<<<< HEAD
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
                        <a href="before-after-detail?id=<?php echo $before_after_detail->id; ?>">
                            <div class="review-detail">
                                <img src="images/before_after/<?php echo $before_after_detail->id; ?>/<?php echo $before_after_detail->img_cover; ?>" class="img-responsive">
                                <?php echo html_entity_decode($before_after_detail->dsc); ?>
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
                        <a href="before-after-detail?id=<?php echo $before_after_detail_two->id; ?>">
                            <div class="review-detail">
                                <img src="images/before_after/<?php echo $before_after_detail_two->id; ?>/<?php echo $before_after_detail_two->img_cover; ?>" class="img-responsive">
                                <?php echo html_entity_decode($before_after_detail_two->dsc); ?>
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
                        <a href="before-after-detail?id=<?php echo $before_after_detail_tree->id; ?>">
                            <div class="review-detail">
                                <img src="images/before_after/<?php echo $before_after_detail_tree->id; ?>/<?php echo $before_after_detail_tree->img_cover; ?>" class="img-responsive">
                                <?php echo html_entity_decode($before_after_detail_tree->dsc); ?>
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
                        <a href="before-after-detail?id=<?php echo $before_after_detail_four->id; ?>">
                            <div class="review-detail">
                                <img src="images/before_after/<?php echo $before_after_detail_four->id; ?>/<?php echo $before_after_detail_four->img_cover; ?>" class="img-responsive">
                                <?php echo html_entity_decode($before_after_detail_four->dsc); ?>
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
                        <a href="before-after-detail?id=<?php echo $before_after_detail_five->id; ?>">
                            <div class="review-detail">
                                <img src="images/before_after/<?php echo $before_after_detail_five->id; ?>/<?php echo $before_after_detail_five->img_cover; ?>" class="img-responsive">
                                <?php echo html_entity_decode($before_after_detail_five->dsc); ?>
                            </div>
                        </a>
                    </div>
                    <?php endforeach ?> 
=======

                    <div class="item">
                        <a href="">
                            <img src="images/teeth.jpg" class="img-responsive">
                        </a>
                    </div>
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0
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




        <!-- khim -->

        <div id="tabs-container" class="cat-grey">
            <div class="container">
                <div class="teeth-cat">
                    <div class="tabs-menu">
                        <li class="current">
                            <a href="#id1">
                                <img class="tablinks" data-toggle="collapse" src="images/catteeth/cat (1).png">
                                <p>OVERHANG<br>TEETH<br>ฟันยื่น</p>
                            </a>
                        </li>
                        <li>
                            <a href="#id2">
                                <img class="tablinks" data-toggle="collapse" src="images/catteeth/cat (2).png">
                                <p>OVERHANG<br>TEETH<br>ฟันอูม</p>
                            </a>
                        </li>
                        <li>
                            <a href="#id3">
                                <img class="tablinks" data-toggle="collapse" src="images/catteeth/cat (3).png">
                                <p>XXXXXXXX<br>ฟันล่างคร่อมบน<br><br></p>
                            </a>
                        </li>
                        <li>
                            <a href="#id4">
                                <img class="tablinks" data-toggle="collapse" src="images/catteeth/cat (4).png">
                                <p>XXXXXXXX<br>ฟันขึ้นเก<br><br></p>
                            </a>
                        </li>
                        <li>
                            <a href="#id5">
                                <img class="tablinks" data-toggle="collapse" src="images/catteeth/cat (5).png">
                                <p>XXXXXXXX<br>ฟันหายบางซี่<br><br></p>
                            </a>
                        </li>
                        <li>
                            <a href="#id6">
                                <img class="tablinks" data-toggle="collapse" src="images/catteeth/cat (6).png">
                                <p>XXXXXXXX<br>เขี้ยวอยู่สูง,<br class="show-ip">ฟันฝัง<br></p>
                            </a>
                        </li>
                        <li>
                            <a href="#id7">
                                <img class="tablinks" data-toggle="collapse" src="images/catteeth/cat (7).png">
                                <p>OTHER<br>อื่นๆ<br><br></p>
                            </a>
                        </li>


                    </div>



                    <section class="cat-grey-detail tabcontent tab-content" id="id1">

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

                            </div>
                            <div class="row">
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>AAAAAAAAAA</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>BBBBBBBBBB</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                            Invisalign
                                            รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                            Invisalign
                                            รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>AAAAAAAAAA</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>BBBBBBBBBB</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                            Invisalign
                                            รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                            Invisalign
                                            รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <button class="button-showmore" id="loadMore1">Show more</button>
                                </div>
                            </div>
                        </div>
<<<<<<< HEAD
                    </div>
                    <?php foreach ($before_after_list_six as $before_after_detail_six) : ?>
                    <div class="col-lg-6 col-md-6">
                        <a href="before-after-detail?id=<?php echo $before_after_detail_six->id; ?>">
                            <div class="review-detail">
                                <img src="images/before_after/<?php echo $before_after_detail_six->id; ?>/<?php echo $before_after_detail_six->img_cover; ?>" class="img-responsive">
                                <?php echo html_entity_decode($before_after_detail_six->dsc); ?>
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
=======


                    </section>



                    <section class="cat-grey-detail tabcontent tab-content" id="id2">

                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 padding-bottom-30">
                                    <hr class="blue-hr2">
                                </div>
                                <div class="col-lg-12">
                                    <div class="header-detail">
                                        <h1>OVERHANG TEETH</h1>
                                        <h2>ฟันอูม</h2>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>AAAAAAAAAA</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>BBBBBBBBBB</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                            Invisalign
                                            รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                            Invisalign
                                            รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>AAAAAAAAAA</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>BBBBBBBBBB</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                            Invisalign
                                            รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                            Invisalign
                                            รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <button class="button-showmore" id="loadMore2">Show more</button>
                                </div>
                            </div>
                        </div>


                    </section>

                    <section class="cat-grey-detail tabcontent tab-content" id="id3">

                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 padding-bottom-30">
                                    <hr class="blue-hr2">
                                </div>
                                <div class="col-lg-12">
                                    <div class="header-detail">
                                        <h1>OVERHANG TEETH</h1>
                                        <h2>ฟันล่างคร่อมบน</h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <a href="before-after-detail">
                                        <div class="review-detail">
                                            <img src="images/review.png" class="img-responsive">
                                            <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                                Invisalign
                                                รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <a href="before-after-detail">
                                        <div class="review-detail">
                                            <img src="images/review.png" class="img-responsive">
                                            <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                                Invisalign
                                                รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>AAAAAAAAAA</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>BBBBBBBBBB</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                            Invisalign
                                            รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                            Invisalign
                                            รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <button class="button-showmore" id="loadMore3">Show more</button>
                                </div>
                            </div>
                        </div>


                    </section>

                    <section class="cat-grey-detail tabcontent tab-content" id="id4">

                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 padding-bottom-30">
                                    <hr class="blue-hr2">
                                </div>
                                <div class="col-lg-12">
                                    <div class="header-detail">
                                        <h1>OVERHANG TEETH</h1>
                                        <h2>ฟันขึ้นเก</h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <a href="before-after-detail">
                                        <div class="review-detail">
                                            <img src="images/review.png" class="img-responsive">
                                            <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                                Invisalign
                                                รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <a href="before-after-detail">
                                        <div class="review-detail">
                                            <img src="images/review.png" class="img-responsive">
                                            <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                                Invisalign
                                                รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>AAAAAAAAAA</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>BBBBBBBBBB</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                            Invisalign
                                            รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                            Invisalign
                                            รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                                    </div>
                                </div>
                            </div>
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0

                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <button class="button-showmore" id="loadMore4">Show more</button>
                                </div>
                            </div>
                        </div>
<<<<<<< HEAD
                    </div>
                    <?php foreach ($before_after_list_seven as $before_after_detail_seven) : ?>
                    <div class="col-lg-6 col-md-6">
                        <a href="before-after-detail?id=<?php echo $before_after_detail_seven->id; ?>">
                            <div class="review-detail">
                                <img src="images/before_after/<?php echo $before_after_detail_seven->id; ?>/<?php echo $before_after_detail_seven->img_cover; ?>" class="img-responsive">
                                <?php echo html_entity_decode($before_after_detail_seven->dsc); ?>
                            </div>
                        </a>
                    </div> 
                    <?php endforeach ?>                  
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <button class="button-showmore">Show more</button>
                    </div>
=======


                    </section>

                    <section class="cat-grey-detail tabcontent tab-content" id="id5">

                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 padding-bottom-30">
                                    <hr class="blue-hr2">
                                </div>
                                <div class="col-lg-12">
                                    <div class="header-detail">
                                        <h1>OVERHANG TEETH</h1>
                                        <h2>ฟันหายบางซี่</h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <a href="before-after-detail">
                                        <div class="review-detail">
                                            <img src="images/review.png" class="img-responsive">
                                            <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                                Invisalign
                                                รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <a href="before-after-detail">
                                        <div class="review-detail">
                                            <img src="images/review.png" class="img-responsive">
                                            <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                                Invisalign
                                                รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>AAAAAAAAAA</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>BBBBBBBBBB</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                            Invisalign
                                            รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                            Invisalign
                                            รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <button class="button-showmore " id="loadMore5">Show more</button>
                                </div>
                            </div>
                        </div>


                    </section>

                    <section class="cat-grey-detail tabcontent tab-content" id="id6">

                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 padding-bottom-30">
                                    <hr class="blue-hr2">
                                </div>
                                <div class="col-lg-12">
                                    <div class="header-detail">
                                        <h1>OVERHANG TEETH</h1>
                                        <h2>เขี้ยวอยู่สูง</h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <a href="before-after-detail">
                                        <div class="review-detail">
                                            <img src="images/review.png" class="img-responsive">
                                            <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                                Invisalign
                                                รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <a href="before-after-detail">
                                        <div class="review-detail">
                                            <img src="images/review.png" class="img-responsive">
                                            <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                                Invisalign
                                                รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>AAAAAAAAAA</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>BBBBBBBBBB</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                            Invisalign
                                            รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                            Invisalign
                                            รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <button class="button-showmore loadMore" id="loadMore6" ref="6">Show more</button>
                                </div>
                            </div>
                        </div>


                    </section>

                    <section class="cat-grey-detail tabcontent tab-content" id="id7">

                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 padding-bottom-30">
                                    <hr class="blue-hr2">
                                </div>
                                <div class="col-lg-12">
                                    <div class="header-detail">
                                        <h1>OVERHANG TEETH</h1>
                                        <h2>อื่นๆ</h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <a href="before-after-detail">
                                        <div class="review-detail">
                                            <img src="images/review.png" class="img-responsive">
                                            <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                                Invisalign
                                                รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <a href="before-after-detail">
                                        <div class="review-detail">
                                            <img src="images/review.png" class="img-responsive">
                                            <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                                Invisalign
                                                รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>AAAAAAAAAA</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>BBBBBBBBBB</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                            Invisalign
                                            รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                                    </div>
                                </div>
                                <div id="myList" class="col-lg-6 col-md-6">
                                    <div class="review-detail">
                                        <img src="images/review.png" class="img-responsive">
                                        <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                            Invisalign
                                            รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <button class="button-showmore loadMore" id="loadMore7" ref="7">Show more</button>
                                </div>
                            </div>
                        </div>


                    </section>


>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0
                </div>
            </div>
        </div>

        <!-- khim -->




        <!-- //////////////////////////////// Default Open ///////////////////////////// -->
        <section class="detail-teeth" id="defaultopen">
            <div class="container">
<<<<<<< HEAD
                <div id="myList"  class="row">
                <?php foreach ($random_befor_list as $random_befor_detail) : ?>
=======
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <a href="before-after-detail">
                            <div class="review-detail">
                                <img src="images/review.png" class="img-responsive">
                                <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย Invisalign
                                    รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                            </div>
                        </a>
                    </div>
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0
                    <div class="col-lg-6 col-md-6">
                        <a href="before-after-detail?id=<?php echo $random_befor_detail->id; ?>">
                            <div class="review-detail">
                                <img src="images//before_after/<?php echo $random_befor_detail->id; ?>/<?php echo $random_befor_detail->img_cover; ?>" class="img-responsive">
                                <?php echo html_entity_decode($random_befor_detail->dsc); ?>
                            </div>
<<<<<<< HEAD
                        
=======
                        </a>
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0
                    </div>
                    <?php endforeach ?>
                </div>

                <div class="row">
                    <div id="myList" class="col-lg-6 col-md-6">
                        <div class="review-detail">
                            <img src="images/review.png" class="img-responsive">
                            <p>AAAAAAAAAA</p>
                        </div>
                    </div>
                    <div id="myList" class="col-lg-6 col-md-6">
                        <div class="review-detail">
                            <img src="images/review.png" class="img-responsive">
                            <p>BBBBBBBBBB</p>
                        </div>
                    </div>
                    <div id="myList" class="col-lg-6 col-md-6">
                        <div class="review-detail">
                            <img src="images/review.png" class="img-responsive">
                            <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                Invisalign
                                รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                        </div>
                    </div>
                    <div id="myList" class="col-lg-6 col-md-6">
                        <div class="review-detail">
                            <img src="images/review.png" class="img-responsive">
                            <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย
                                Invisalign
                                รวมถึงอีเมลเกี่ยวกับเคล็ดลับ</p>
                        </div>
                    </div>
                </div>




                <div class="row">
                    <div class="col-lg-12 text-center">
<<<<<<< HEAD
                        <button class="button-showmore" id="loadMore">Show more</button>
=======
                        <button class="button-showmore " id="loadMore">Show more</button>
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0
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
        $(document).ready(function () {
            var $tabs = $(".tabs-menu a").click(function (event) {

                event.preventDefault();
                $(".tab-content").hide();

                var $parent = $(this).parent();

                if ($parent.is('.current')) {
                    $parent.removeClass('current');
                    $tabs.removeClass('current');
                    return;
                }

                $tabs.removeClass('current');
                $parent.addClass("current");

                var tab = $(this).attr("href");
                $(tab).fadeIn();
            }).parent();

            $('body').click(function (e) {
                if (!$(e.target).closest('#tabs-container').length) {
                    $tabs.filter('.current').find('a').click();
                }
            })
        });

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
<<<<<<< HEAD
          $('.tablinks').click(function(){
            $('.tablinks').each(function(){
                $(this).removeClass('active');
            });
            $(this).addClass('active');
            // var collp = $(this).attr('aria-expanded');
            // console.log($(this).is('active'));
            // if($(this).is('active')){
            //     console.log('true');
            //     $("#defaultopen").css('display','none');
            // }else{
            //     console.log('false');
            //     $("#defaultopen").css('display','block');
            // }
        });
=======
        $(function () {
            x = 4;
            $('#myList div').slice(0, 4).show();
            $('#loadMore').on('click', function (e) {
                e.preventDefault();
                x = x + 2;
                $('#myList div').slice(0, x).slideDown();
            });
        });
    </script>

    <!-- <script>
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0
        $(document).click(function (e) {
            if (!$(e.target).is('.panel-body')) {
                $('.collapse').collapse('hide').slideUp();
            }
            elseif($('#loadMore').click(function (e))) {
                $('.collapse').collapse('show');
            }

        });
    </script> -->


     <!-- <script>
        //     $(document).ready(function () {
        //         $(".tablinks").click(function () {
        //             $("#defaultopen").hide();
        //             $(".blue-hr").hide();
        //         });
        //     });
        // 
    </script> -->




    <!-- <script>
        $(function () {
            x = 4;
            $('#myList div').slice(0, 4).show();
            $('#loadMore1').on('click', function (e) {
                e.preventDefault();
                x = x + 2;
                $('#myList div').slice(0, x).slideDown();
            });
        });
    </script>

    <script>
        $(function () {
            x = 4;
            $('#myList div').slice(0, 4).show();
            $('#loadMore2').on('click', function (e) {
                e.preventDefault();
                x = x + 2;
                $('#myList div').slice(0, x).slideDown();
            });
        });
    </script>
<<<<<<< HEAD
    <script>
         $(function () {
            x = 4;
            $('#myList div').slice(0, 4).show();
            $('#loadMore').on('click', function (e) {
                e.preventDefault();
                x = x + 4;
=======

    <script>
        $(function () {
            x = 0;
            $('#myList div').slice(0, 0).show();
            $('#loadMore3').on('click', function (e) {
                e.preventDefault();
                x = x + 2;
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0
                $('#myList div').slice(0, x).slideDown();
            });
        });
    </script>
<<<<<<< HEAD
=======

    <script>
        $(function () {
            $('.loadMore').on('click', function (e) {
                var id = $(this).attr('ref');
                x = 0;
                $('#myList div').slice(0, 0).show();
                e.preventDefault();
                x = x + 2;
                $('#myList div').slice(0, x).slideDown();
            });

            $('#loadMore5').on('click', function (e) {
                x = 0;
                $('#myList div').slice(0, 0).show();
                e.preventDefault();
                x = x + 2;
                $('#myList div').slice(0, x).slideDown();
            });

            $('#loadMore6').on('click', function (e) {
                x = 0;
                $('#myList div').slice(0, 0).show();
                e.preventDefault();
                x = x + 2;
                $('#myList div').slice(0, x).slideDown();
            });

            $('#loadMore7').on('click', function (e) {
                x = 0;
                $('#myList div').slice(0, 0).show();
                e.preventDefault();
                x = x + 2;
                $('#myList div').slice(0, x).slideDown();
            });
        });
    </script> -->
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0

</body>

</html>