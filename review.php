<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD
<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Site Metas -->
<title>Review | Doctor T Dental Clinic</title>
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
=======

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Site Metas -->
    <title>Review | Doctor T Dental Clinic</title>
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
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0

<!-- responsive -->
<link href="css/responsive/review-res.css" rel="stylesheet">

    <style>
        p.new_line {
            width: calc(100% - -0.4em);
            height: 2em;
            content: '';
        }
    </style>

</head>

<body>

    <div id="wrapper">
        <?php 
            $current_file = basename(__FILE__,'.php');
            include 'header.php';
        ?>
        <?php 
            include 'init.php';
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
<<<<<<< HEAD
                <div id="myList" class="row">
                    <?php foreach ($review_detail1 as $review_list) : ?>
                    <div class="col-lg-4 col-md-6">
                        <!-- <a class="popup-youtube" href="<?php echo $review_list->link; ?>"> -->
                            <img src="images/review_detail/<?php echo $review_list->id; ?>/<?php echo $review_list->img_cover; ?>"
                                class="img-responsive">
                        <!-- </a> -->
                        <a href="review-detail?id=<?php echo $review_list->id; ?>">
                            <div class="content-review">
=======
                <div class="row">
                <?php foreach ($review_detail1 as $review_list) : ?>
                    <div class="col-lg-4 col-md-6">
                   
                            <a class="popup-youtube" href="<?php echo $review_list->link; ?>&rel=0&autoplay=1&mute=0&loop=1&controls=1">
                                <img src="images/review_detail/<?php echo $review_list->id; ?>/<?php echo $review_list->img_cover; ?>" class="img-responsive">                       
                            </a>
                            <a href="review-detail?id=<?php echo $review_list->id; ?>">
                            <div class="content-review">
                            <?php 
                                // $description = '';
                                // $description_complete = '';
                                // $description = str_replace('<p>','',$review_list->dsc); 
                                // $description_complete = str_replace('</p>','',$description); 
                            ?>
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0
                                <h4><?php echo $review_list->name; ?></h4>
                                <hr>
                                <?php echo html_entity_decode($review_list->dsc); ?>
                            </div>
                        </a>
                    </div>
                    <?php endforeach ?>
<<<<<<< HEAD
                </div>
                <div class="row">
=======


                    <input type="hidden" id="count_query" value="6" />

                    <div class="show_more row"></div>

>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0
                    <div class="col-lg-12 text-center">
                        <button class="button-showmore" id="loadMore">Show More</button>
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
        // $(document).ready(function(){

        //     $('.button-showmore').click(function(){
        //         var start = $('#count_query').val();
        //         var limit = 3;
        //         $.ajax({
        //             url: 'admin/ajaxquery_review.php',
        //             data: { 'start' : start , 'limit' : limit },
        //             method: 'POST',
        //             dataType: 'html',
        //             success:function(resp){
        //                 console.log(resp);
        //                 $('.show_more').append(resp);
        //                 $('#count_query').val( parseInt(start) + parseInt(limit) );
        //             }
        //         });
        //         // console.log(start , limit);
        //     });

<<<<<<< HEAD
=======
            $('.button-showmore').click(function(){
                var start = $('#count_query').val();
                var limit = 3;
                $.ajax({
                    url: 'admin/ajaxquery_review.php',
                    data: { 'start' : start , 'limit' : limit },
                    method: 'POST',
                    dataType: 'html',
                    success:function(resp){
                        console.log(resp);
                        $('.show_more').append(resp);
                        $('#count_query').val( parseInt(start) + parseInt(limit) );
                    }
                });
                // console.log(start , limit);
            });
            
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0

        // });
        $(function () {
            x = 12;
            $('#myList div').slice(0, 12).show();
            $('#loadMore').on('click', function (e) {
                e.preventDefault();
                x = x + 6;
                $('#myList div').slice(0, x).slideDown();
            });
        });
        $(function () {
            $('.popup-youtube').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false,
                autoplay: 1,
            });
        });

    </script>
</body>

</html>