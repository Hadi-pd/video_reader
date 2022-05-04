<?php
function namasha_short_code()
{
  ob_start();
?>


  <div class="section group" style="direction: ltr; border-radius:<?= video_get_option('main_radius') ?>px; overflow: hidden; background-color:<?= (!video_get_option('bg_is_off')) ? video_get_option('main_bg') : 'unset' ?> ">
    <div class="col span_4_of_6" style="height: <?= (video_get_option('main_height')) ? video_get_option('main_height') : '500' ?>px; border-radius:<?= video_get_option('video_radius') ?>px; overflow: hidden;">

      <?php $slider = namasha_get_option('group_namasha');
      $i = 1;
      foreach ($slider as $item) {
        $link_explode = explode('/', $item['namasha_link']);
        $total_link = "https://www.namasha.com/embed/" . $link_explode[4]
      ?>
        <script>
          jQuery(document).ready(function() {
            jQuery(".slide_namasha<?= $i ?>").click(function() {
              jQuery("#namasha<?= $i ?>").load(
                "<?= plugin_dir_url(__DIR__) ?>ajax_load.php?video_code=<?= $total_link ?>");
              jQuery(".show_namasha").removeClass("show_namasha");
              jQuery("#namasha<?= $i ?>").addClass("show_namasha");
              
            });
          });
        </script>

        <div class="h_iframe-video_embed_frame tv <?= ($i == 1) ? 'show_namasha' : '' ?>" id="namasha<?= $i ?>">
          <div style="text-align: center;">
            <img src="<?= plugin_dir_url(__DIR__) . 'img/preload.svg' ?>">
          </div>
          <span style="display: block;padding-top: 57%"></span>
          <?php if ($i == 1) { ?>
            <iframe class="responsive-iframe" src="<?php echo $total_link ?>" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true">
            </iframe>
          <?php } else { ?>
            
            <div id="namasha<?= $i ?>"></div>
          <?php } ?>
        </div>
      <?php $i++;
      } ?>
    </div>

    <div class="col span_2_of_6" style="height: <?= (video_get_option('main_height')) ? video_get_option('main_height') : '500' ?>px; overflow-y: scroll;">
      <?php $slider = namasha_get_option('group_namasha');
      $i = 1;
      foreach ($slider as $item) {
      ?>
        <div style="text-align:center; overflow: hidden; border-radius:<?= video_get_option('pic_radius') ?>px; height: <?= (video_get_option('img_height')) ? video_get_option('img_height') : '200' ?>px; background-color:brown; margin-bottom: 5px;" class="slide_namasha<?= $i ?> hoverwrap">
          <img class="d-block thumb-pic image" height="100%" src="<?= ($item['namasha_image']) ? $item['namasha_image'] : plugin_dir_url(__DIR__) . 'img/noimage.png' ?> " alt="">
          <?php if($item['namasha_textareasmall']) { ?> 
            <div class="hovercap" style="background-color: <?= video_get_option('txtbg_color') ?>; color:<?= video_get_option('txt_color') ?>; "><?=$item['namasha_textareasmall'] ?></div>            
          <?php } ?>
        </div>
      <?php $i++;
      } ?>
    </div>
  </div>

<?php
  return ob_get_clean();
}

add_shortcode('namasha_shcode', 'namasha_short_code');
