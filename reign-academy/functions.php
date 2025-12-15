<?php

function reign_academy_enqueue_scripts() {
    // Styles
    wp_enqueue_style( 'main-style', get_stylesheet_uri() );
    
    // Scripts
    wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/script.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'reign_academy_enqueue_scripts' );

function reign_academy_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'woocommerce' ); 
}
add_action( 'after_setup_theme', 'reign_academy_setup' );
