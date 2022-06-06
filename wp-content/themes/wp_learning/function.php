<?php
add_action('wp_enqueue_scripts', 'wplearning_register_scripts');
function wplearning_register_scripts(){
    //css
    wp_enqueue_script('bootstrap.min.css', get_theme_file_uri('/assets/css/bootstrap.min.css'), false, '1.0');
    wp_enqueue_script('animate.min.css', get_theme_file_uri('/assets/css/animate.min.css'), false, '1.0');
    wp_enqueue_script('icofont.min.css', get_theme_file_uri('/assets/css/icofont.min.css'), false, '1.0');
    wp_enqueue_script('slick.min.css', get_theme_file_uri('/assets/css/slick.min.css'), false, '1.0');
    wp_enqueue_script('meanmenu.min.css', get_theme_file_uri('/assets/css/meanmenu.min.css'), false, '1.0');
    wp_enqueue_script('venobox.min.css', get_theme_file_uri('/assets/css/meanmenu.min.css'), false, '1.0');
    wp_enqueue_script('range-slider.min.css', get_theme_file_uri('/assets/css/range-slider.min.css'), false, '1.0');
    wp_enqueue_script('cssanimation.min.css', get_theme_file_uri('/assets/css/cssanimation.min.css'), false, '1.0');
    wp_enqueue_script('default.css', get_theme_file_uri('/assets/css/default.css'), false, '1.0');
    wp_enqueue_script('style.css', get_theme_file_uri('/assets/css/style.css'), false, '1.0');
    wp_enqueue_script('responsive.css', get_theme_file_uri('/assets/css/responsive.css'), false, '1.0');

    //javascript, 
}