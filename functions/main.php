<?php
function sib_video_slider_register_theme_options_metabox()
{
	$cmb_options = new_cmb2_box(array(
		'id'           => 'sib_video_slider_option_metabox',
		'title'        => esc_html__('ویدیو اسلایدر', 'sib_video_slider'),
		'object_types' => array('options-page'),
		'option_key'      => 'sib_video_slider_options',
		'icon_url'        => 'dashicons-editor-video',
		'position'        => 60,
	));

	$cmb_options->add_field(array(
		'name'    => 'رنگ پس زمینه اصلی',
		'id'      => 'main_bg',
		'type'    => 'colorpicker',
		'default' => '#000000',
		'attributes' => array(
			'data-colorpicker' => json_encode(array(
				'palettes' => array('#000000', '#ffffff', '#4fa2c0', '#0bc991'),
				'hide' =>  true, // hide the color picker by default
				'border' => false,
				'width' => 220,
			))
		),
	));
	$cmb_options->add_field(array(
		'name' => ' ',
		'desc' => 'پس زمینه بی رنگ باشد',
		'id'   => 'bg_is_off',
		'type' => 'checkbox',
	));
	$cmb_options->add_field(array(
		'name'    => 'رنگ متن روی تصاویر',
		'id'      => 'txt_color',
		'type'    => 'colorpicker',
		'default' => '#ffffff',
		'attributes' => array(
			'data-colorpicker' => json_encode(array(
				'palettes' => array('#00000080', '#ff834c80', '#4fa2c080', '#0bc99180'),
				'hide' =>  true, // hide the color picker by default
				'border' => false,
				'width' => 220,
			))
		),
	));
	$cmb_options->add_field(array(
		'name'    => 'رنگ پس زمینه متن روی تصاویر',
		'id'      => 'txtbg_color',
		'type'    => 'colorpicker',
		'default' => 'rgba(0, 0, 0, 0.502)',
		'options' => array(
			'alpha' => true, // Make this a rgba color picker.
		),
		'attributes' => array(
			'data-colorpicker' => json_encode(array(
				'palettes' => array('#00000080', '#ff834c80', '#4fa2c080', '#0bc99180'),
				'hide' =>  true, // hide the color picker by default
				'border' => false,
				'width' => 220,
			))
		),
	));
	$cmb_options->add_field(array(
		'name'    => 'گردی کادر',
		'desc'    => 'برحسب px عدد بنویسید',
		'default' => '0',
		'id'      => 'main_radius',
		'type'    => 'text_small'
	));
	$cmb_options->add_field(array(
		'name'    => 'گردی ویدیو',
		'desc'    => 'برحسب px عدد بنویسید',
		'default' => '0',
		'id'      => 'video_radius',
		'type'    => 'text_small'
	));
	$cmb_options->add_field(array(
		'name'    => 'گردی تصاویر',
		'desc'    => 'برحسب px عدد بنویسید',
		'default' => '0',
		'id'      => 'pic_radius',
		'type'    => 'text_small'
	));
	$cmb_options->add_field(array(
		'name'    => 'ارتفاع کادر',
		'desc'    => 'برحسب px عدد بنویسید',
		'default' => '500',
		'id'      => 'main_height',
		'type'    => 'text_small'
	));
	$cmb_options->add_field(array(
		'name'    => 'ارتفاع تصاویر',
		'desc'    => 'برحسب px عدد بنویسید',
		'default' => '200',
		'id'      => 'img_height',
		'type'    => 'text_small'
	));




	$cmb_options->add_field(array(
		//'name' => 'انتخاب سایت',
		'desc' => '
		<a href="?page=aparat_appearance_options" title="افزودن آپارات"><img style="border-radius: 15px;" src="' . plugin_dir_url(__DIR__) . 'img/icons/aparat.png" alt="aparat"></a>
		<a href="?page=dideo_appearance_options" title="افزودن دیدئو"><img style="border-radius: 15px;" src="' . plugin_dir_url(__DIR__) . 'img/icons/dideo.jpg" alt="دیدئو"></a>
		<a href="?page=didestan_appearance_options" title="افزودن دیدستان"><img style="border-radius: 15px;" src="' . plugin_dir_url(__DIR__) . 'img/icons/didestan.jpg" alt="دیدستان"></a>
		<a href="?page=namasha_appearance_options" title="افزودن نماشا"><img style="border-radius: 15px;" src="' . plugin_dir_url(__DIR__) . 'img/icons/namasha.jpg" alt="نماشا"></a>
		<a href="?page=tamasha_appearance_options" title="افزودن تماشا"><img style="border-radius: 15px;" src="' . plugin_dir_url(__DIR__) . 'img/icons/tamasha.png" alt="تماشا"></a>
		<a href="?page=telwebion_appearance_options" title="افزودن تلوبیون"><img style="border-radius: 15px;" src="' . plugin_dir_url(__DIR__) . 'img/icons/telwebion.png" alt="تلوبیون"></a>
		<a href="?page=dalfk_appearance_options" title="افزودن دالفک"><img style="border-radius: 15px;" src="' . plugin_dir_url(__DIR__) . 'img/icons/dalfk.jpg" alt="دالفک"></a>
		',
		'type' => 'title',
		'id'   => 'wiki_test_title'
	));
}



/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string $key     Options array key
 * @param  mixed  $default Optional default value
 * @return mixed           Option value
 */
function video_get_option($key = '', $default = false)
{
	if (function_exists('cmb2_get_option')) {
		// Use cmb2_get_option as it passes through some key filters.
		return cmb2_get_option('sib_video_slider_options', $key, $default);
	}

	// Fallback to get_option if CMB2 is not loaded yet.
	$opts = get_option('sib_video_slider_options', $default);

	$val = $default;

	if ('all' == $key) {
		$val = $opts;
	} elseif (is_array($opts) && array_key_exists($key, $opts) && false !== $opts[$key]) {
		$val = $opts[$key];
	}

	return $val;
}
