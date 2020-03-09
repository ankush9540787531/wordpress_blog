<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */
 
 # Function Metabox Enqueue
 if ( ! function_exists( 'tada_metabox_enqueue' ) ) {
	 function tada_metabox_enqueue() {
		global $typenow;
		if( $typenow == 'post' || $typenow == 'page') {		
			wp_register_script( 'tada-metabox-js', TADA_URL . '/framework/metabox/metabox-admin.js' );
			wp_enqueue_script( 'tada-metabox-js' );
			wp_register_style( 'tada-metabox-css',  TADA_URL . '/framework/metabox/metabox-admin.css' );
    		wp_enqueue_style( 'tada-metabox-css' );			
		}
	}
	add_action( 'admin_enqueue_scripts', 'tada_metabox_enqueue' );
 }