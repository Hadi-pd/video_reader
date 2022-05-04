<?php
function multiple_short_code()
{
    ob_start();
?>
    <div class="section group" style="direction: ltr; border-radius:<?= video_get_option('main_radius') ?>px; overflow: hidden; background-color:<?= (!video_get_option('bg_is_off')) ? video_get_option('main_bg') : 'unset' ?> ">
        <div class="col span_4_of_6" style="height: <?= (video_get_option('main_height')) ? video_get_option('main_height') : '500' ?>px; border-radius:<?= video_get_option('video_radius') ?>px; overflow: hidden;">

            <?php $slider = multiple_get_option('group_multiple');
            $i = 1;
            foreach ($slider as $item) {
                $link_explode = explode('/', $item['multiple_link']);
                $sitename = $link_explode[2];

                switch ($sitename) {
                    case "www.dalfak.com":
                        $total_link = "https://www.dalfak.com/w/embed/" . $link_explode[4];
                        break;
                    case "dalfak.com":
                        $total_link = "https://www.dalfak.com/w/embed/" . $link_explode[4];
                        break;
                    case "www.multiple.com":
                        $total_link = "https://www.multiple.com/video/video/embed/videohash/" . $link_explode[4] . "/vt/frame";
                        break;
                    case "multiple.com":
                        $total_link = "https://www.multiple.com/video/video/embed/videohash/" . $link_explode[4] . "/vt/frame";
                        break;
                    case "www.dideo.ir":
                        $total_link = "https://www.dideo.ir/pre_embed/v/yt/" . $link_explode[5];
                        break;
                    case "dideo.ir":
                        $total_link = "https://www.dideo.ir/pre_embed/v/yt/" . $link_explode[5];
                        break;
                    case "www.didestan.com":
                        $total_link = "https://www.didestan.com/embed/video/" . $link_explode[4];
                        break;
                    case "didestan.com":
                        $total_link = "https://www.didestan.com/embed/video/" . $link_explode[4];
                        break;
                    case "www.namasha.com":
                        $total_link = "https://www.namasha.com/embed/" . $link_explode[4];
                        break;
                    case "tamasha.com":
                        $total_link = "https://tamasha.com/embed/" . $link_explode[4];
                        break;
                    case "telewebion.com":
                        $total_link = "https://m.telewebion.com/embed/vod?EpisodeID=" . $link_explode[4];
                        break;
                    case "www.telewebion.com":
                        $total_link = "https://m.telewebion.com/embed/vod?EpisodeID=" . $link_explode[4];
                        break;
                    case "www.aparat.com":
                        $total_link = "https://www.aparat.com/video/video/embed/videohash/" . $link_explode[4] . "/vt/frame";
                        break;
                    case "aparat.com":
                        $total_link = "https://www.aparat.com/video/video/embed/videohash/" . $link_explode[4] . "/vt/frame";
                        break;
                    default:
                        echo "سرویس مورد نظر شما در این نسخه پشتیبانی نمی شود، لطفا به ما اطلاع دهید تا سرویس مورد نظر شما را در نسخه های بعدی ارائه کنیم";
                }
            ?>
                <script>
                    jQuery(document).ready(function() {
                        jQuery(".slide_multiple<?= $i ?>").click(function() {
                            jQuery("#multiple<?= $i ?>").load(
                                "<?= plugin_dir_url(__DIR__) ?>ajax_load.php?video_code=<?= $total_link ?>");
                            jQuery(".show_multiple").removeClass("show_multiple");
                            jQuery("#multiple<?= $i ?>").addClass("show_multiple");
                        });
                    });
                </script>

                <div class="h_iframe-video_embed_frame tv <?= ($i == 1) ? 'show_multiple' : '' ?>" id="multiple<?= $i ?>">
                    <div style="text-align: center;">
                        <img src="<?= plugin_dir_url(__DIR__) . 'img/preload.svg' ?>">
                    </div>
                    <span style="display: block;padding-top: 57%"></span>
                    <?php
                    if ($i == 1) { ?>
                        <iframe class="responsive-iframe" src="<?php echo $total_link ?>" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true">
                        </iframe>
                    <?php } else { ?>
                        <div id="multiple<?= $i ?>"></div>
                    <?php } ?>
                </div>
            <?php $i++;
            } ?>
        </div>

        <div class="col span_2_of_6" style="height: <?= (video_get_option('main_height')) ? video_get_option('main_height') : '500' ?>px; overflow-y: scroll;">
            <?php $slider = multiple_get_option('group_multiple');
            $i = 1;
            foreach ($slider as $item) {
            ?>
                <div style="text-align:center; overflow: hidden; border-radius:<?= video_get_option('pic_radius') ?>px; height: <?= (video_get_option('img_height')) ? video_get_option('img_height') : '200' ?>px; background-color:brown; margin-bottom: 5px;" class="slide_multiple<?= $i ?> hoverwrap">
                    <img class="d-block thumb-pic image" height="100%" src="<?= ($item['multiple_image']) ? $item['multiple_image'] : plugin_dir_url(__DIR__) . 'img/noimage.png' ?> " alt="">
                    <?php if ($item['multiple_textareasmall']) { ?>
                        <div class="hovercap" style="background-color: <?= video_get_option('txtbg_color') ?>; color:<?= video_get_option('txt_color') ?>; "><?= $item['multiple_textareasmall'] ?></div>
                    <?php } ?>
                </div>
            <?php $i++;
            } ?>
        </div>
    </div>

<?php
    return ob_get_clean();
}

add_shortcode('multiple_shcode', 'multiple_short_code');
