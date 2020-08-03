<?php 
require_once 'init.php';
// echo 'Hello world 1234';
$review = reviews_list_more($_POST['start'].','.$_POST['limit']);

$html = '';

foreach($review as $_review){
    $html .= '
    <div class="col-lg-4 col-md-6">
        <a class="popup-youtube" href=" '.$_review->link.' ">
                <img src="images/review_detail/'.$_review->id.'/'.$_review->img_cover.' " class="img-responsive">
            </a>
            <a href="review-detail?id='.$_review->id.' ">
                <div class="content-review">
                <h4>'.$_review->name.'</h4>
                <hr>
                '.html_entity_decode($_review->dsc).'
            </div>
        </a>
    </div>    
    
    ';
}

echo $html;

?>
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