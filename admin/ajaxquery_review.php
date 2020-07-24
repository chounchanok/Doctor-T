<?php 
require_once 'init.php';
// echo 'Hello world 1234';
$review = reviews_list_more($_POST['start'].','.$_POST['limit']);

$html = '';

// foreach($review as $_review){
    $html .= '
    <div class="col-lg-4 col-md-6">
        <a class="popup-youtube" href="https://www.youtube.com/watch?autoplay=1&v=DRkbx_2ynOs">
                <img src="images/review/review (6).png" class="img-responsive">
            </a>
            <a href="review-detail">
                <div class="content-review">
                <h4>MR. NAJJIAKJ FFJDJIDIDDIDI</h4>
                <hr>
                <p>เมื่อทำเครื่องหมายในช่องนี้แสดงว่าข้าพเจ้าเต็มใจรับข้อมูลการจัดฟันด้วย Invisalign 
                    รวมถึงอีเมลเกี่ยวกับเคล็ดลับที่เป็นประโยชน์ ผู้ให้บริการใกล้บ้าน และข่าวสารล่าสุดเกี่ยวกับผลิตภัณฑ์ 
                    นอกจากนี้ข้าพเจ้ายังขอให้เจ้าหน้าที่ Smile Concierge ของบริษัท อะไลน์ เทคโนโลยี (ประเทศไทย) 
                    จำกัด ติดต่อข้าพเจ้า เพื่อนัดหมายขอคำปรึกษากับทันตแพทย์ที่ผ่านการฝึกอบรมจาก Invisalign 
                    ที่อยู่ใกล้บ้านของข้าพเจ้าด้วย เราเคารพความเป็นส่วนตัวของท่าน และจะไม่จำหน่ายหรือยินยอมให้บุคคลที่สาม
                    เข้าข้อมูลที่ระบุตัวตนของท่านอย่างเด็ดขาด หากต้องการข้อมูลเพิ่มเติม
                </p>
            </div>
        </a>
    </div>    
    
    ';
// }

echo $html;

?>