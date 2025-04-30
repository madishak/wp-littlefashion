<?php

define('O_THEME_ROOT', get_template_directory_uri());
define('O_IMG_DIR', O_THEME_ROOT . './img');

add_action('wp_enqueue_scripts', 'theme_add_scripts');
function theme_add_scripts() {
    wp_enqueue_style('style-css', get_template_directory_uri() . 'css/style.css');
}


add_action( 'widgets_init', 'register_my_widgets' );
function register_my_widgets(){

	register_sidebar( array(
		'name'          => 'Obi-Wan Kenouby',
		'id'            => "obi",
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div>',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => "</h2>\n",
		'before_sidebar' => '', // WP 5.6
		'after_sidebar'  => '', // WP 5.6
	) );
}