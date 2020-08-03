<!DOCTYPE html>
<html lang="en">
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Site Metas -->
    <title>Service & Price | Doctor T Dental Clinic</title>
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
    <link href="css/responsive/service-res.css" rel="stylesheet">

</head>
<body>

    <div id="wrapper">
        <?php 
            $current_file = basename(__FILE__,'.php');
            include 'header.php';
        ?>
        <?php 
            include 'init.php';
            $price_one_list = price_list_id1();
            $price_two_list = price_list_id2();
            $price_tree_list = price_list_id3();
            $price_four_list = price_list_id4();
            $price_five_list = price_list_id5();
            $price_six_list = price_list_id6();
            $price_seven_list = price_list_id7();
            $price_eng_list = price_list_id8();
            $price_ning_list = price_list_id9();
            $price_ten_list = price_list_id10();
            $price_elwn_list = price_list_id11();
            $price_tvn_list = price_list_id12();
        ?>
        <section class="banner-services">
                <img src="images/services-banner.jpg" class="img-responsive">
        </section>
        <section class="table-services">
            <div class="container">
                <div class="table-responsive border-white">          
                    <table class="table">
                        <thead>
                        <tr class="orage-head">
                            <th class="min-width-100">หมวด</th>
                            <th>รายการรักษา</th>
                            <th class="min-width-120">ราคา</th>
                            <th class="min-width-150">หมายเหตุ</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="4" class="font-italic">ปรึกษา</td>
                        </tr>
                        <tr class="grey-light">
                            <td></td>
                            <td><?php echo $price_one_list[0]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_one_list[0]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-dark">
                            <td></td>
                            <td><?php echo $price_one_list[1]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_one_list[1]->price; ?></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td colspan="4" class="font-italic">เอ็กซ์เรย์</td>
                        </tr>

                        <tr class="grey-light">
                            <td></td>
                            <td><?php echo $price_two_list[0]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_two_list[0]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-dark">
                            <td></td>
                            <td><?php echo $price_two_list[1]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_two_list[1]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-light">
                            <td></td>
                            <td><?php echo $price_two_list[2]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_two_list[2]->price; ?></td>
                            <td></td>
                        </tr>
 
                        <tr>
                            <td colspan="4" class="font-italic">อุดฟัน</td>
                        </tr>
                        <tr class="grey-dark">
                            <td></td>
                            <td><?php echo $price_tree_list[0]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_tree_list[0]->price; ?></td>
                            <td class="text-center"><?php echo $price_tree_list[0]->remark; ?></td>
                        </tr>
                        <tr class="grey-light">
                            <td></td>
                            <td><?php echo $price_tree_list[1]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_tree_list[1]->price; ?></td>
                            <td class="text-center"><?php echo $price_tree_list[1]->remark; ?></td>
                        </tr>
                        <tr class="grey-dark">
                            <td></td>
                            <td><?php echo $price_tree_list[2]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_tree_list[2]->price; ?></td>
                            <td class="text-center"><?php echo $price_tree_list[2]->remark; ?></td>
                        </tr>
                        <tr class="grey-light">
                            <td></td>
                            <td><?php echo $price_tree_list[3]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_tree_list[3]->price; ?></td>
                            <td class="text-center"><?php echo $price_tree_list[3]->remark; ?></td>
                        </tr>
                        <tr class="grey-dark">
                            <td></td>
                            <td><?php echo $price_tree_list[4]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_tree_list[4]->price; ?></td>
                            <td class="text-center"><?php echo $price_tree_list[4]->remark; ?></td>
                        </tr>

                        <tr>
                            <td colspan="4" class="font-italic">ถอนฟัน งานศัลย์</td>
                        </tr>
                        <tr class="grey-light">
                            <td></td>
                            <td><?php echo $price_four_list[0]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_four_list[0]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-dark">
                            <td></td>
                            <td><?php echo $price_four_list[1]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_four_list[1]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-light">
                            <td></td>
                            <td><?php echo $price_four_list[2]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_four_list[2]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-dark">
                            <td></td>
                            <td><?php echo $price_four_list[3]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_four_list[3]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-light">
                            <td></td>
                            <td><?php echo $price_four_list[4]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_four_list[4]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-dark">
                            <td></td>
                            <td><?php echo $price_four_list[5]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_four_list[5]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-light">
                            <td></td>
                            <td><?php echo $price_four_list[6]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_four_list[6]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-dark">
                            <td></td>
                            <td><?php echo $price_four_list[7]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_four_list[7]->price; ?></td>
                            <td></td>
                        </tr>
                        
                        <tr>
                            <td colspan="4" class="font-italic">รักษาโรคเหงือก / ตกแต่งเหงือก</td>
                        </tr>
                        <tr class="grey-light">
                            <td></td>
                            <td><?php echo $price_five_list[0]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_five_list[0]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-dark">
                            <td></td>
                            <td><?php echo $price_five_list[1]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_five_list[1]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-light">
                            <td></td>
                            <td><?php echo $price_five_list[2]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_five_list[2]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-dark">
                            <td></td>
                            <td><?php echo $price_five_list[2]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_five_list[2]->price; ?></td>
                            <td></td>
                        </tr>
                        
                        <tr>
                            <td colspan="4" class="font-italic">รักษารากฟันแท้</td>
                        </tr>
                        <tr class="grey-light">
                            <td></td>
                            <td><?php echo $price_six_list[0]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_six_list[0]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-dark">
                            <td></td>
                            <td><?php echo $price_six_list[1]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_six_list[1]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-light">
                            <td></td>
                            <td><?php echo $price_six_list[2]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_six_list[2]->price; ?></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td colspan="4" class="font-italic">ฟันปลอม แบบติดแน่น</td>
                        </tr>
                        <tr class="grey-dark">
                            <td></td>
                            <td><?php echo $price_seven_list[0]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_seven_list[0]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-light">
                            <td></td>
                            <td><?php echo $price_seven_list[1]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_seven_list[1]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-dark">
                            <td></td>
                            <td><?php echo $price_seven_list[2]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_seven_list[2]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-light">
                            <td></td>
                            <td><?php echo $price_seven_list[3]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_seven_list[3]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-dark">
                            <td></td>
                            <td><?php echo $price_seven_list[4]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_seven_list[4]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-light">
                            <td></td>
                            <td><?php echo $price_seven_list[5]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_seven_list[5]->price; ?></td>
                            <td></td>
                        </tr>
                        
                        <tr>
                            <td colspan="4" class="font-italic">ฟันปลอม</td>
                        </tr>
                        <tr class="grey-dark">
                            <td></td>
                            <td><?php echo $price_eng_list[0]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_eng_list[0]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-light">
                            <td></td>
                            <td><?php echo $price_eng_list[1]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_eng_list[1]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-dark">
                            <td></td>
                            <td><?php echo $price_eng_list[2]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_eng_list[2]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-light">
                            <td></td>
                            <td><?php echo $price_eng_list[3]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_eng_list[3]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-dark">
                            <td></td>
                            <td><?php echo $price_eng_list[4]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_eng_list[4]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-light">
                            <td></td>
                            <td><?php echo $price_eng_list[5]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_eng_list[5]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-dark">
                            <td></td>
                            <td><?php echo $price_eng_list[6]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_eng_list[6]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-light">
                            <td></td>
                            <td><?php echo $price_eng_list[7]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_eng_list[7]->price; ?></td>
                            <td></td>
                        </tr>
                        
                        <tr>
                            <td colspan="4" class="font-italic">ฟันปลอมแบบถอดได้</td>
                        </tr>
                        <tr class="grey-dark">
                            <td></td>
                            <td><?php echo $price_ning_list[0]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_ning_list[0]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-light">
                            <td></td>
                            <td><?php echo $price_ning_list[1]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_ning_list[1]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-dark">
                            <td></td>
                            <td><?php echo $price_ning_list[2]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_ning_list[2]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-light">
                            <td></td>
                            <td><?php echo $price_ning_list[3]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_ning_list[3]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-dark">
                            <td></td>
                            <td><?php echo $price_ning_list[4]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_ning_list[4]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-light">
                            <td></td>
                            <td><?php echo $price_ning_list[5]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_ning_list[5]->price; ?></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td colspan="4" class="font-italic">ฟอกสีฟัน</td>
                        </tr>
                        <tr class="grey-dark">
                            <td></td>
                            <td><?php echo $price_ten_list[0]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_ten_list[0]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-light">
                            <td></td>
                            <td><?php echo $price_ten_list[1]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_ten_list[1]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-dark">
                            <td></td>
                            <td><?php echo $price_ten_list[2]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_ten_list[2]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-light">
                            <td></td>
                            <td><?php echo $price_ten_list[3]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_ten_list[3]->price; ?></td>
                            <td></td>
                        </tr>
                       
                        <tr>
                            <td colspan="4" class="font-italic">Misc</td>
                        </tr>
                        <tr class="grey-dark">
                            <td></td>
                            <td><?php echo $price_elwn_list[0]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_elwn_list[0]->price; ?></td>
                            <td></td>
                        </tr>
                        
                        <tr>
                            <td colspan="4" class="font-italic">ทันตกรรมสำหรับเด็ก</td>
                        </tr>
                        <tr class="grey-light">
                            <td></td>
                            <td><?php echo $price_tvn_list[0]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_tvn_list[0]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-dark">
                            <td></td>
                            <td><?php echo $price_tvn_list[1]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_tvn_list[1]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-light">
                            <td></td>
                            <td><?php echo $price_tvn_list[2]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_tvn_list[2]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-dark">
                            <td></td>
                            <td><?php echo $price_tvn_list[3]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_tvn_list[3]->price; ?></td>
                            <td></td>
                        </tr>
                        <tr class="grey-light">
                            <td></td>
                            <td><?php echo $price_tvn_list[4]->dsc; ?></td>
                            <td class="text-right"><?php echo $price_tvn_list[4]->price; ?></td>
                            <td></td>
                        </tr>
                        
                        <tr class="orage-head">
                            <td colspan="5"><br></td>
                        </tr>
                        </tbody>
                    </table>
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