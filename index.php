<?php

/**
 * Plugin Name:       افزونه ویدیوریدر
 * Description:       این افزونه ویدیو ها را از سایت های اشتراک گذاری ویدیو لود کرده و به صورت اسلایدر نمایش می دهد
 * Version:           3.16
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            هادی پوشه دار
 * Author URI:        http://ebtekareno.ir
 */

if (!defined('ABSPATH')) {
  exit;
}
add_action('cmb2_admin_init', 'sib_video_slider_register_theme_options_metabox');

function sib_scripts()
{
  wp_enqueue_style('style',  plugin_dir_url(__FILE__) . 'css/style.css');
  wp_enqueue_script('all', plugin_dir_url(__FILE__) . 'js/all.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'sib_scripts');

//Layouts
require_once dirname(__FILE__) . '/layout/aparat.php';
require_once dirname(__FILE__) . '/layout/dalfk.php';
require_once dirname(__FILE__) . '/layout/dideo.php';
require_once dirname(__FILE__) . '/layout/didestan.php';
require_once dirname(__FILE__) . '/layout/namasha.php';
require_once dirname(__FILE__) . '/layout/tamasha.php';
require_once dirname(__FILE__) . '/layout/telwebion.php';
require_once dirname(__FILE__) . '/layout/multiple.php';

//functions
require_once dirname(__FILE__) . '/cmb2/init.php';
require_once dirname(__FILE__) . '/functions/main.php';
require_once dirname(__FILE__) . '/functions/aparat.php';
require_once dirname(__FILE__) . '/functions/dalfk.php';
require_once dirname(__FILE__) . '/functions/dideo.php';
require_once dirname(__FILE__) . '/functions/didestan.php';
require_once dirname(__FILE__) . '/functions/namasha.php';
require_once dirname(__FILE__) . '/functions/tamasha.php';
require_once dirname(__FILE__) . '/functions/telwebion.php';
require_once dirname(__FILE__) . '/functions/multiple.php';
require_once dirname(__FILE__) . '/functions/help.php';