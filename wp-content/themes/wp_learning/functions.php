<?php
//chen the vao head
add_action('wp_head', 'wplearning_wp_head', 5);
function wplearning_wp_head()
{
?>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<?php
}


//húng css, javascript va jquery
add_action('wp_enqueue_scripts', 'wplearning_register_scripts');
function wplearning_register_scripts()
{
    //css
    wp_enqueue_style('bootstrap.min.css', get_theme_file_uri('/assets/css/bootstrap.min.css'), false, '1.0');
    wp_enqueue_style('animate.min.css', get_theme_file_uri('/assets/css/animate.min.css'), false, '1.0');
    wp_enqueue_style('icofont.min.css', get_theme_file_uri('/assets/css/icofont.min.css'), false, '1.0');
    wp_enqueue_style('slick.min.css', get_theme_file_uri('/assets/css/slick.min.css'), false, '1.0');
    wp_enqueue_style('meanmenu.min.css', get_theme_file_uri('/assets/css/meanmenu.min.css'), false, '1.0');
    wp_enqueue_style('venobox.min.css', get_theme_file_uri('/assets/css/venobox.min.css'), false, '1.0');
    wp_enqueue_style('easyzoom.min.css', get_theme_file_uri('/assets/css/easyzoom.min.css'), false, '1.0');
    wp_enqueue_style('range-slider.min.css', get_theme_file_uri('/assets/css/range-slider.min.css'), false, '1.0');
    wp_enqueue_style('cssanimation.min.css', get_theme_file_uri('/assets/css/cssanimation.min.css'), false, '1.0');
    wp_enqueue_style('default.css', get_theme_file_uri('/assets/css/default.css'), false, '1.0');
    wp_enqueue_style('style.css', get_theme_file_uri('/assets/css/style.css'), false, '1.0');
    wp_enqueue_style('responsive.css', get_theme_file_uri('/assets/css/responsive.css'), false, '1.0');

    //javascript, jquery
    wp_enqueue_script('js/jquery-3.3.1.min.js', get_theme_file_uri('/assets/js/jquery-3.3.1.min.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('bootstrap.min.js', get_theme_file_uri('/assets/js/bootstrap.min.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('popper.min.js', get_theme_file_uri('/assets/js/popper.min.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('slick.min.js', get_theme_file_uri('/assets/js/slick.min.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('meanmenu.min.js', get_theme_file_uri('/assets/js/meanmenu.min.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('counterup.min.js', get_theme_file_uri('/assets/js/counterup.min.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('scrollup.min.js', get_theme_file_uri('/assets/js/scrollup.min.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('waypoints.min.js', get_theme_file_uri('/assets/js/waypoints.min.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('venobox.min.js', get_theme_file_uri('/assets/js/venobox.min.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('range-slider.min.js', get_theme_file_uri('/assets/js/range-slider.min.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('main.js', get_theme_file_uri('/assets/js/main.js'), array('jquery'), '1.0', true);
}

//setup theme
//dang ky menu
add_action('after_setup_theme', 'wplearning_after_setup_theme');
function wplearning_after_setup_theme()
{
    remove_theme_support('widgets-block-editor');
    //dang ky menu
    register_nav_menus(array(
        'top' => __('Menu top', 'wplearning'),
        'bottom' => __('Menu bottom', 'wplearning'),
    ));
}

//dang ky widget
add_action('widgets_init', 'wplearning_widget_init');
function wplearning_widget_init()
{
    register_sidebar(array(
        'name'  => __('Trang chủ', 'text_domain'), // Ten sidebar hien thi trong admin
        'id' => 'sidebar-home', // ID cua sidebar khong duoc trung, dung de hien thi SB
        'description' => __('Thêm các widget *[Home] vào đây', 'text_domain'), // Mo ta cho SB nay
        'before_widget' => '<section id="%1$s" class="widget %2$s">', // Ban co the them Class cho SB vao day
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">', // The mo de tao tieu de chung cho tat ca cac Widget nam trong Sidebar nay
        'after_title'   => '</h2>', // Dong the tieu de
    ));
}

//nhung file widget
require_once get_parent_theme_file_path('/widgets/widgets_index.php');
