<?php

define('O_THEME_ROOT', get_template_directory_uri());
define('O_IMG_DIR', O_THEME_ROOT . './images');

add_action('wp_enqueue_scripts', 'theme_add_scripts');
function theme_add_scripts() {
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-icon-css', get_template_directory_uri() . '/css/bootstrap-icons.css');
    wp_enqueue_style('slick-css', get_template_directory_uri() . '/css/slick.css');
    wp_enqueue_style('tooplate-little-fashion-css', get_template_directory_uri() . '/css/tooplate-little-fashion.css');


    wp_enqueue_script('jquery', get_template_directory_uri() .'/js/jquery.min.js', array(), '1.0', true );
    wp_enqueue_script('bootstrap', get_template_directory_uri() .'/js/bootstrap.bundle.min.js', array(), '1.0', true );
    wp_enqueue_script('Headroom', get_template_directory_uri() .'/js/Headroom.js', array(), '1.0', true );
    wp_enqueue_script('jQuery.headroom', get_template_directory_uri() .'/js/jQuery.headroom.js', array(), '1.0', true );
    wp_enqueue_script('slick', get_template_directory_uri() .'/js/slick.min.js', array(), '1.0', true );
    wp_enqueue_script('custom', get_template_directory_uri() .'/js/custom.js', array(), '1.0', true );
}


add_theme_support( 'post-thumbnails' );
add_image_size( 'goods_img', 415, 415, true );

?>
