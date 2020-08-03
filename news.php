<!DOCTYPE html>
<html lang="en">
<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Site Metas -->
<title>News | Doctor T Dental Clinic</title>
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
<link href="css/responsive/news-res.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <?php 
            $current_file = basename(__FILE__,'.php');
            include 'header.php';
        ?>
        <?php 
            include 'init.php';
            $newsdetail_list = newsdetail_all_list();
            $innovation_list = innovation_list();
        ?>
        <section class="banner-review">
            <div class="container">
                <img src="images/newsbanner.png" class="img-responsive">
            </div>
        </section>
        <section class="tab-review">
            <div class="container">
                <h1>News Innovations</h1>
            </div>
        </section>
        <section class="news-slide">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="h1-head">
                            <h1>Essential Read</h1>
                        </div>
                    </div>
                </div>
                <div class="row padding-bottom-30">
                <?php foreach ($innovation_list as $innovation_detail) : ?>
                    <div class="col-lg-4 col-md-6 padding-bottom-30-mobile text-right">
                        <div class="news-detail text-left">
                            <img src="images/news_detail/<?php echo $innovation_detail->id; ?>/<?php echo $innovation_detail->img_cover; ?>" class="img-responsive">
                            <h2><?php echo $innovation_detail->name; ?></h2>
                            <hr>
                            <h5><?php echo $innovation_detail->description; ?><h5>
                        </div>
                        <a class="button-readmore-news" href="news-detail?id=<?php echo $innovation_detail->id; ?>">Read more >></a>
                       
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </section>
        <section class="news-all">
            <div class="container">
                
                <?php foreach ($newsdetail_list as $newsdetail_detail) : ?>
                <div class="row padding-bottoms-30">
                    <div id="myList" class="col-lg-5 col-md-5">
                        <div class="img-border">
                            <img src="images/news_detail/<?php echo $newsdetail_detail->id; ?>/<?php echo $newsdetail_detail->img_cover; ?>"
                                class="img-responsive">
                        </div>
                    </div>
                    <div id="myList" class="col-lg-7 col-md-7">
                        <div class="detail-news">
                            <h2><?php echo $newsdetail_detail->name; ?></h2>
                            <h5><?php echo $newsdetail_detail->description; ?></h5>
                        </div>
                        <div id="myList">
                            <a class="button-readmore-inno" href="news-detail?id=<?php echo $newsdetail_detail->id; ?>">Read more>></a>
                        </div>
                    </div>
                </div>

                <?php endforeach ?>
                
                
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <button class="button-showmore" id="loadMore">Show more</button>
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
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/script.js"></script>
    <script src='js/owl.carousel.min.js'></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
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

        $(function () {
            x = 9;
            $('#myList div').slice(0, 9).show();
            $('#loadMore').on('click', function (e) {
                e.preventDefault();
                x = x + 6;
                $('#myList div').slice(0, x).slideDown();
            });
        });
    </script>
    <!-- <script>
           $(document).ready(function () {
    // Load the first 3 list items from another HTML file
            $('#myList div:lt(0)').show();
            $('#showLess').hide();
            var items =  25;
            var shown =  2;
            $('#loadMore').click(function () {
                $('#showLess').show();
                shown = $('#myList div:visible').size()+2;
                if(shown< items) {$('#myList div:lt('+shown+')').show();}
                else {$('#myList div:lt('+items+')').show();
                    $('#loadMore').hide();
                    }
            });
            $('#showLess').click(function () {
                $('#myList div').not(':lt(0)').hide();
            });
        });
    </script> -->
</body>

</html>