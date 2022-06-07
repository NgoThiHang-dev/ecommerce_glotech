<?php
define('WPSHARE247_WG_DIR', dirname(__FILE__));

require_once(WPSHARE247_WG_DIR . '/widget_helper/wpshare247_repeat_sortable.php');

$arr_init_wg = array(
	// 'wpshare247_all_fields',
	// 'wpshare247_basic_fields',
	// 'wpshare247_repeat_field',
	// 'wpshare247_image_field',
	// 'wpshare247_color_picker_field',
	// 'wpshare247_contact_form_7_field',
	// 'wpshare247_navigation_menu_field',
	// 'wpshare247_post_type_id_field',
	// 'wpshare247_datepicker_field',
	// 'wpshare247_gallery_field',
	// 'wpshare247_autocomplete_field',
	// 'wpshare247_mp4',
	// 'wpshare247_files',
	'wpshare247_header_hero',
	'wpshare247_feature',
	//'add_new_here', //file exist : add_new_here.php
);

require_once(WPSHARE247_WG_DIR . '/widget_helper/wpshare247_module_widget.php');
