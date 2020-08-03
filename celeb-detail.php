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
            $celeb_list_sh = celeb_list_sh($_GET['id']);
            $celedids_list_all = celebids_list();
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
                <div class="row padding-bottom-30">
                    <div class="col-lg-12">
                    <?php 
                        $ck_vdo = $celeb_list_sh->link;
                        if($ck_vdo == TRUE){
                    ?>
                        <iframe class="video-width" width="560" height="315" src="<?php echo $celeb_list_sh->link; ?>" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                        <div class="col-lg-12">
                        
                            <div class="detail-review">
                                <h2><?php echo $celeb_list_sh->name; ?></h2>
                                <hr>
                                <?php echo html_entity_decode($celeb_list_sh->dsc); ?>
                            </div>
                        </div>
                        <?php }else{ ?>

                        <img src="images/celebss/<?php echo $celeb_list_sh->id; ?>/<?php echo $celeb_list_sh->img_cover; ?>"
                            class="img-responsive">
                    </div>
                    <div class="col-lg-12">
                        <div class="detail-review">
                            <h2><?php echo $celeb_list_sh->name; ?></h2>
                            <hr>
                            <?php echo html_entity_decode($celeb_list_sh->dsc); ?>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <div class="row">
                    <?php foreach ($celedids_list_all as $celedids_all_detail) : ?>
                    <div class="col-lg-4 col-md-6">
                        
                            <img src="images/celebss/<?php echo $celedids_all_detail->id; ?>/<?php echo $celedids_all_detail->img_cover; ?>"
                                class="img-responsive">
                        
                        <a href="celeb-detail?id=<?php echo $celedids_all_detail->id; ?>">
                            <div class="content-review">
                                <h4><?php echo $celedids_all_detail->name; ?></h4>
                                <hr>
                                <?php echo html_entity_decode($celedids_all_detail->dsc); ?>
                            </div>
                        </a>
                    </div>
                    <?php endforeach ?>

                    <div class="col-lg-12 text-center">
                        <a class="button-showmore" href="celeb">
                            << BACK</a> </div> </div> </div> </section> <?php 
            include 'top-footer.php';
            include 'footer.php';
        ?> </div> <!-- end wrapper -->

                                <!-- Core JavaScript
    ================================================== -->
                                <!-- <script src="js/jquery.min.js"></script> -->
                                <script src="js/tether.min.js"></script>
                                <script src="js/bootstrap.min.js"></script>
                                <script src="js/custom.js"></script>
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
</body>

</html>