<?php 
require_once 'init.php';
// echo 'Hello world 1234';
$review = invis_list_more($_POST['start'].','.$_POST['limit']);

$html = '';

foreach($review as $_review){
    $html .= '
            <div class="col-lg-6 col-md-6">
                <div class="review-detail">
                    <img src="images/before_after/'.$_review->id.'/'.$_review->img_cover.' " class="img-responsive">
                    '.html_entity_decode($_review->dsc).'
                </div>
            </div>
    
    ';
}

echo $html;

?>
