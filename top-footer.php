
<?php 
    require_once('init.php');
    $topfooter_celeb_list = celeb_topfooter_list();
    $topfooter_before_list = before_topfooter_list();
    $topfooter_newsdetail_list = newsdetail_topfooter_list();
    $topfooter_promotion_list = promotion_topfooter_list();
?>
<section class="topfooter">
        <div class="container">
            <div class="row padding-bottom-15">
                <div class="col-lg-12">
                    <hr class="blue-hr">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="topfooter">
                    <a href="celeb">                
                        <img src="images/celebss/<?php echo $topfooter_celeb_list[0]->id; ?>/<?php echo $topfooter_celeb_list[0]->img_cover; ?>" class="img-responsive">
                        <h4>CELEBRITIES AT DOCTOR T</h4>
                        <hr>
                        <h5><?php echo html_entity_decode($topfooter_celeb_list[0]->dsc); ?></h5>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="topfooter">
                    <a href="before-after">
                        <img src="images/before_after/<?php echo $topfooter_before_list[0]->id; ?>/<?php echo $topfooter_before_list[0]->img_cover; ?>" class="img-responsive">
                        <h4>BEFORE & AFTER</h4>
                        <hr>
                        <h5><?php echo html_entity_decode($topfooter_before_list[0]->dsc); ?></h5>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="topfooter">
                    <a href="news">
                        <img src="images/news_detail/<?php echo $topfooter_newsdetail_list[0]->id; ?>/<?php echo $topfooter_newsdetail_list[0]->img_cover; ?>" class="img-responsive">
                        <h4>NEWS INNOVATIONS</h4>
                        <hr>
                        <h5><?php echo html_entity_decode($topfooter_newsdetail_list[0]->description); ?></h5>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="topfooter">
                    <a href="promotion">
                        <img src="images/promotions/<?php echo $topfooter_promotion_list[0]->id; ?>/<?php echo $topfooter_promotion_list[0]->img_cover; ?>" class="img-responsive">
                        <h4>PROMOTION</h4>
                        <hr>
                        <h5><?php echo $topfooter_promotion_list[0]->title; ?></h5>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
