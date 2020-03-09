<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */ 

define( 'TADA_DIR', get_template_directory() . '/' );
define( 'TADA_URL', get_template_directory_uri() . '/' );

define( 'TADA_FUNCTIONS_DIR', get_template_directory() . '/functions/' );
define( 'TADA_FUNCTIONS_URL', get_template_directory_uri() . '/functions/' );

define( 'TADA_CSS_DIR', get_template_directory() . '/assets/css/' );
define( 'TADA_CSS_URL', get_template_directory_uri() . '/assets/css/' );

define( 'TADA_IMG_DIR', get_template_directory() . '/assets/img/' );
define( 'TADA_IMG_URL', get_template_directory_uri() . '/assets/img/' );

define( 'TADA_JS_DIR', get_template_directory() . '/assets/js/' );
define( 'TADA_JS_URL', get_template_directory_uri() . '/assets/js/' );

add_action( 'after_setup_theme', 'tada_theme_setup' );
if ( ! function_exists( 'tada_theme_setup' ) ) {
    function tada_theme_setup() {
		
        # Redux framework
        if ( class_exists( 'Redux' ) ) {

            require_once(get_template_directory() . '/framework/redux-options.php');

        }		

		# Content Width
		if (!isset($content_width)) {
			$content_width = 860; // Chance content width with the right value
		}
		
		# Domain & Language
		global $theme_text_domain;
		$theme_text_domain = 'tada';		
        load_theme_textdomain($theme_text_domain, get_template_directory() . '/lang');
		
		
		# Theme Support
		add_theme_support('post-formats', 
								array(  'gallery', 
							   			'link', 
							   			'image', 
							   			'quote', 
							   			'video', 
							   			'audio' 
							   )
		); 
		
		# Choose your formats
		add_theme_support( 'post-thumbnails' ); 
		add_theme_support( 'custom-background' ); 
		add_theme_support( 'custom-header' ) ;
        add_theme_support( 'automatic-feed-links' ); 
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) ); 
		add_theme_support( 'title-tag' );
		
		# Add Image Size
		add_image_size( 'tada-preview-post', 1200, 800, true );	
		add_image_size( 'tada-widget-thumb', 70, 70, true );
		add_image_size( 'tada-gallery-footer', 600, 500, true );
		add_image_size( 'tada-related-post', 330, 150, true );
		
		# Register Menus Position		
        register_nav_menus(
            array( 'main-menu' => esc_html__('Main Menu', 'tada') )
		); 	
		
		# Register Sidebar
		register_sidebar(
			array(
				'name'          => esc_html__('Default Sidebar', 'tada'),
				'id'            => 'tada-default',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => "</div>",
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
		
	}
}

# Load Assets
require_once(get_template_directory() . '/assets/assets.php');

# Load Global Functions
require_once(get_template_directory() . '/framework/global-functions.php');
require_once(get_template_directory() . '/framework/class/class-display.php');
require_once(get_template_directory() . '/framework/metabox/metabox.php');
require_once(get_template_directory() . '/framework/metabox/metabox-functions.php');

# Load Plugin Activation
require_once(get_template_directory() . '/framework/tgm-required-plugin-activation-load.php');

# Load Widget
require_once(get_template_directory() . '/elements/widget.php');



?>