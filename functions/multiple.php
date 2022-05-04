<?php
function multiple_register_options_submenu_appearance_menu()
{

	$cmb_options = new_cmb2_box(array(
		'id'           => 'multiple_options_submenu_appearance_menu',
		'title'        => esc_html__('چندگانه', 'sib_video_slider'),
		'object_types' => array('options-page'),
		'option_key'      => 'multiple_appearance_options',
		'parent_slug'     => 'sib_video_slider_options',

	));

    $cmb_options->add_field( array(
		'name' => 'برای استفاده از افزونه شرت کد مقابل را در محل مناسب قرار دهید <input style="text-align: center; type="text" value="[multiple_shcode]" disabled>',
		'type' => 'title',
		'id'   => 'wiki_test_title'
	) );

	$group_multiple = $cmb_options->add_field(array(
		'id'          => 'group_multiple',
		'type'        => 'group',
		'repeatable'  => true, 
		'options'     => array(
			'group_title'       => 'اسلاید شماره{#}', 
			'add_button'        => 'افزودن',
			'remove_button'     => 'حذف',
			'sortable'          => true,
			'closed'         => true, 
		),
	));

	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$cmb_options->add_group_field($group_multiple, array(
		'name' => 'انتخاب تصویر',
		'id'   => 'multiple_image',
		'type' => 'file',
		'description' => 'تصویر مرتبط با ویدیو ',
	));

    $cmb_options->add_group_field($group_multiple, array(
    	'name' => 'عنوان ویدیو',
    	'desc' => 'این متن بر روی تصویر به صورت هاور نمایش داده می شود',
    	'id' => 'multiple_textareasmall',
    	'type' => 'textarea_small'
    ) );
   
	
    $cmb_options->add_group_field($group_multiple, array(
		'name' => __( 'لینک ویدیو', 'cmb2' ),
		'id'   => 'multiple_link',
		'type' => 'text_url',
		'protocols' => array( 'http', 'https'), 
		'description' => 'لینک ویدیو ویدیو را اینجا قرار دهید',
	) );



}

add_action('cmb2_admin_init', 'multiple_register_options_submenu_appearance_menu');

/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string $key     Options array key
 * @param  mixed  $default Optional default value
 * @return mixed           Option value
 */
function multiple_get_option($key = '', $default = false)
{
	if (function_exists('cmb2_get_option')) {
		// Use cmb2_get_option as it passes through some key filters.
		return cmb2_get_option('multiple_appearance_options', $key, $default);
	}

	// Fallback to get_option if CMB2 is not loaded yet.
	$opts = get_option('multiple_appearance_options', $default);

	$val = $default;

	if ('all' == $key) {
		$val = $opts;
	} elseif (is_array($opts) && array_key_exists($key, $opts) && false !== $opts[$key]) {
		$val = $opts[$key];
	}

	return $val;
}
?>