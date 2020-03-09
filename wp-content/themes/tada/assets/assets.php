<?php
/*
File: assets/assets.php
Description: Assets inclusion
Author: Ad-theme.com
*/



//********************************************************************************//
// CSS
//********************************************************************************//


// Frontend
add_action( 'wp_enqueue_scripts', 'tada_frontend_styles' );

function tada_frontend_styles() {
	
	// Style
	wp_enqueue_style( 'bootstrap',  TADA_CSS_URL . 'bootstrap.css' );	
	
	wp_enqueue_style( 'tada-dynamic',  TADA_CSS_URL . 'dynamic.css' );
	
	wp_enqueue_style( 'tada-style',  TADA_CSS_URL . 'style.css' );
		
	wp_enqueue_style( 'tada-fonts',  TADA_CSS_URL . 'fonts.css' );				
	
}

//********************************************************************************//
// JS
//********************************************************************************//


// Frontend
add_action('wp_enqueue_scripts', 'tada_frontend_scripts');

function tada_frontend_scripts() {
	
	// Load WP jQuery if not included
	wp_enqueue_script('jquery-masonry');
	wp_enqueue_script('tada-main-js', TADA_JS_URL . 'main.js', array('jquery'), '', true);
			
}