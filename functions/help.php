<?php
function help_register_options_submenu_appearance_menu()
{

	$cmb_options = new_cmb2_box(array(
		'id'              =>  'help_options_submenu_appearance_menu',
		'title'           =>  'راهنما',
		'object_types'    =>   array('options-page'),
		'option_key'      =>  'help_appearance_options',
		'parent_slug'     =>  'sib_video_slider_options',
	    'save_button'     =>  ' ',
	));

    $cmb_options->add_field( array(
		'name' => 'راهنمای استفاده از افزونه ویدیو ریدر',
		'type' => 'title',
		'id'   => 'wiki_test_title'
	) );


}

add_action('cmb2_admin_init', 'help_register_options_submenu_appearance_menu');

/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string $key     Options array key
 * @param  mixed  $default Optional default value
 * @return mixed           Option value
 */
function help_get_option($key = '', $default = false)
{
	if (function_exists('cmb2_get_option')) {
		// Use cmb2_get_option as it passes through some key filters.
		return cmb2_get_option('help_appearance_options', $key, $default);
	}

	// Fallback to get_option if CMB2 is not loaded yet.
	$opts = get_option('help_appearance_options', $default);

	$val = $default;

	if ('all' == $key) {
		$val = $opts;
	} elseif (is_array($opts) && array_key_exists($key, $opts) && false !== $opts[$key]) {
		$val = $opts[$key];
	}

	return $val;
}
