<!DOCTYPE html>
<html lang="en">
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Site Metas -->
    <title>About Us | Doctor T Dental Clinic</title>
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
    <link href="css/responsive/about-res.css" rel="stylesheet">

</head>
<body>

    <div id="wrapper">
        <?php 
            $current_file = basename(__FILE__,'.php');
            include 'header.php';
        ?>
        <section class="header-about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <img src="images/doctort.png" class="img-responsive img-doctor-2">
                    </div>
                    <div class="col-lg-5 col-md-6 margin-auto">
                            <div class="about-detail-header">
                                <h1>DOCTOR T</h1>
                                <h2>DR. WISARUT SIRAVISIDPORN</h2>
                                <p>( DDS, MSD, American Board Certified Orthodontist</p>
                                <a class="button-readmore-about" href="about1.php">Read more >></a>
                            </div>
                            <hr class="orange-hr">
                            <div class="about-detail-header">
                                <h2><strong>MY LIFE, MY STORY,<br>MY PHILOSOPHY</strong></h2>
                                <h5>IN life, "LT's not what you do, it's who you are. "<br>
                                    Get to know your doctor. Learn what drive him.<br>
                                    Learn about his circle of influence that passed on<br>
                                    to him the philosophy in life and in orthodontics<br>
                                    that has shaped him into the human being<br>
                                    that he is today.</h5>
                                <a class="button-readmore-about" href="about2.php">Read more >></a>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about-office">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-6 margin-auto z-index">
                        <div class="detail-abouts">
                            <img src="images/doctor-logo.png" class="img-logo-doctor">
                            <h2>ศูนย์จัดฟัน</h2>
                            <h1>DOCTOR T</h1>
                            <h1>DENTAL CLINIC</h1>
                        </div>
                        <div class="tab-bluedark">
                            <h1>THE DOORS OF CHANGES</h1>
                        </div>
                        <div class="detail-about-3">    
                            <h3>"IT’S NOT TREATMENT, IT’S TRANSFORMATION."</h3>
                            <h5>Any real changes takes time, commitment and hard work.
                            Start your journey to be the best version of you now.</h5>
                            <h4>ALL DENTAL TREATMENT BY SPECISLISTS.</h4>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 margin-auto">
                        <img src="images/backdrop-about.png" class="img-office">
                    </div>
                </div>
            </div>
        </section>
        <section class="back-doctor">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <img src="images/about1.png" class="img-abo">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="row margin-auto">
                            <div class="col-lg-6 col-md-7 margin-auto text-left">
                                <div class="abo-detail">
                                    <img src="images/abpf.png" class="abo-img">
                                    <h2>THE HIGHEST COMMITMENT<br>TO EXCELLENCE</h2>
                                    <h5>Board certification requires hundreds of additional hours of preparation to test judgment, skill and knowleage to demonstrate the highest quality of orthodontic care.</h5>
                                    <a class="button-readmore-about" href="about3.php">Read more >></a>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-5 margin-auto">
                                <img src="images/abo.png" class="img-responsive abo-ip">
                            </div>
                        </div>

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