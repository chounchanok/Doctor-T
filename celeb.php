<!DOCTYPE html>
<html lang="en">
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Site Metas -->
    <title>Celeb | Doctor T Dental Clinic</title>
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
        <link href="css/responsive/celeb-res.css" rel="stylesheet">

</head>
<body>

    <div id="wrapper">
        <?php 
            $current_file = basename(__FILE__,'.php');
            include 'header.php';
        ?>
        <?php 
            include 'init.php';
            $celebsrt_list = celebs_list();
        ?>
        <section class="banner-celeb">
            <div class="">
                <img src="images/celeb-banner.jpg" class="img-responsive">
            </div>
        </section>
        <section class="tab-review">
            <div class="container">
                <h1>Celebrities at Doctor T</h1>
            </div>
        </section>

        <section class="review-detail">
            <div class="container">
                <div id="myList" class="row">
                <?php foreach ($celebsrt_list as $celebs_detail) : ?> 
                    <div class="col-lg-4 col-md-6">                 
                        
                            <img src="images/celebss/<?php echo $celebs_detail->id; ?>/<?php echo $celebs_detail->img_cover; ?>" class="img-responsive">
                      
                        <a href="celeb-detail?id=<?php echo $celebs_detail->id; ?>">
                            <div class="content-review">
                                <h4><?php echo $celebs_detail->name; ?></h4>
                                <hr>
                                <?php echo html_entity_decode($celebs_detail->dsc); ?>
                            </div>
                        </a>
                    </div>
                
                <?php endforeach ?>
                </div> 
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
        $(function () {
            x = 12;
            $('#myList div').slice(0, 12).show();
            $('#loadMore').on('click', function (e) {
                e.preventDefault();
                x = x + 6;
                $('#myList div').slice(0, x).slideDown();
            });
        });
    </script>
</body>
</html>