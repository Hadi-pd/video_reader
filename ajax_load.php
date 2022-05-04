<?php
if(isset($_GET['video_code'])){
$video_total_link = $_GET['video_code'];
}
?>
<iframe class="responsive-iframe" src="<?=$video_total_link ?>" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true">
</iframe>