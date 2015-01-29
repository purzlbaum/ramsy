<?php

load_theme_textdomain('rams', get_stylesheet_directory() . '/languages');

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/stylesheets/font-awesome.min.css' );
}

require_once( get_stylesheet_directory() . '/libs/karrierefrau-register-rams-customizer.php' );
require_once( get_stylesheet_directory() . '/libs/karrierefrau-register-sidebars.php' );
require_once( get_stylesheet_directory() . '/libs/karrierefrau-social-media-widget.php' );