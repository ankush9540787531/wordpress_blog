<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "tada_theme";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Tada Options', 'tada' ),
        'page_title'           => esc_html__( 'Tada Options', 'tada' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
		'forced_dev_mode_off'  => true,
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // Panel Intro text -> before the form
	/*
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'tada' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'tada' );
    }*/

    // Add content after the form.
    $args['footer_text'] = __( '<p>Tada Option Panel - Created by AD-Theme</p>', 'tada' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START General
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General', 'tada' ),
        'id'               => 'general',
        'desc'             => esc_html__( 'General Settings', 'tada' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home'
    ) );

    // -> START General Setttings
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'General Settings', 'tada' ),
        'id'         => 'general-options',
        'desc'       => esc_html__( 'Basic Options for Tada Theme', 'tada' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'preloader',
                'type'     => 'switch',
                'title'    => 'Preloader',
                'subtitle' => 'Click <code>On</code> for active Preloader',
                'default'  => true
            ),
            array(
                'id'       => 'preloader-type',
                'type'     => 'select',
                'title'    => esc_html__( 'Choose Preloader', 'tada' ),
                'options'  => array(
                    'circle' 			=> 'Circle',
                    'spinner-pulse' 	=> 'Spinner Pulse',
                    'spinner-plane' 	=> 'Spinner Plane',
					'spinner-bounce' 	=> 'Spinner Bounce',
					'spinner-dots' 		=> 'Spinner Dots'					
                ),
                'default'  => 'circle',
				'required' => array( 'preloader', '=', true ),
            ),
            array(
                'id'   => 'opt-required-divide-1',
                'type' => 'divide'
            ),						
            array(
                'id'       => 'favicon',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Favicon', 'tada' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Upload your favicon', 'tada' ),
                'subtitle' => esc_html__( 'Upload your favicon', 'tada' ),
            ),
            array(
                'id'       => 'logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Logo', 'tada' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Upload your Logo', 'tada' ),
                'subtitle' => esc_html__( 'Upload your Logo', 'tada' ),
            ),
            array(
                'id'       => 'search',
                'type'     => 'switch',
                'title'    => 'Search Button',
                'subtitle' => 'Click <code>On</code> for active Search Button',
                'default'  => true
            ),
            array(
                'id'       => 'pagination',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Pagination Type', 'tada' ),
				'subtitle' => 'Choose pagination type. Standard (next, prev) or numeric',
                'options'  => array(
                    'standard' => 'Standard',
                    'numeric'  => 'Numeric',
                ),
                'default'  => 'standard'
            ),
            array(
                'id'       => 'stickypost',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Sticky Posts on Blog Page', 'tada' ),
				'subtitle' => 'Choose sticky posts option.',
                'options'  => array(
                    'normal' 	=> 'Normal (Inside the posts list)',
                    'ontop'   => 'Always on Top',
                ),
                'default'  => 'normal'
            ),			
        )
    ) );

    // -> START Background Options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Background', 'tada' ),
        'id'         => 'general-background',
        'desc'       => esc_html__( 'Background Options Style', 'tada' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'bg-header',
                'type'     => 'switch',
                'title'    => 'Header Background Image',
                'subtitle' => 'Click <code>On</code> for active Background Image',
                'default'  => true
            ),				
            array(
                'id'       => 'bg-header-image',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Image Background Header', 'tada' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Upload your image header background', 'tada' ),
				'required' => array( 'bg-header', '=', true ),
            ),
            array(
                'id'   => 'opt-required-divide-1',
                'type' => 'divide'
            ),
            array(
                'id'       => 'bg-color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Background Color', 'tada' ),
                'subtitle' => esc_html__( 'Gives you the RGBA background Color.', 'tada' ),
                'default'  => array(
                    'color' => '#f6f6f6',
                    'alpha' => '1'
                ),
                'mode'     => 'background',
            ),						
        )
    ) );
	
    // -> START Social Options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Social', 'tada' ),
        'id'         => 'general-social',
        'desc'       => esc_html__( 'Social Options', 'tada' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'social',
                'type'     => 'switch',
                'title'    => 'Social Header',
                'subtitle' => esc_html__( 'Click <code>On</code> for active Social Header','tada'),
                'default'  => true
            ),
            array(
                'id'       => 'facebook',
                'type'     => 'text',
                'title'    => esc_html__( 'Facebook', 'tada' ),
                'subtitle' => esc_html__( 'Leave Empty for disable', 'tada' ),
				'desc'     => esc_html__( 'Facebook URL', 'tada' ),
				'required' => array( 'social', '=', true ),
                'default'  => '#',
            ),			
            array(
                'id'       => 'twitter',
                'type'     => 'text',
                'title'    => esc_html__( 'Twitter', 'tada' ),
                'subtitle' => esc_html__( 'Leave Empty for disable', 'tada' ),
				'desc'     => esc_html__( 'Twitter URL', 'tada' ),
				'required' => array( 'social', '=', true ),
                'default'  => '#',
            ),
            array(
                'id'       => 'googleplus',
                'type'     => 'text',
                'title'    => esc_html__( 'Google Plus', 'tada' ),
                'subtitle' => esc_html__( 'Leave Empty for disable', 'tada' ),
				'desc'     => esc_html__( 'Google Plus URL', 'tada' ),
				'required' => array( 'social', '=', true ),
                'default'  => '#',
            ),
            array(
                'id'       => 'vimeo',
                'type'     => 'text',
                'title'    => esc_html__( 'Vimeo', 'tada' ),
                'subtitle' => esc_html__( 'Leave Empty for disable', 'tada' ),
				'desc'     => esc_html__( 'Vimeo URL', 'tada' ),
				'required' => array( 'social', '=', true ),
                'default'  => '#',
            ),
            array(
                'id'       => 'linkedin',
                'type'     => 'text',
                'title'    => esc_html__( 'Linkedin', 'tada' ),
                'subtitle' => esc_html__( 'Leave Empty for disable', 'tada' ),
				'desc'     => esc_html__( 'Linkedin URL', 'tada' ),
				'required' => array( 'social', '=', true ),
                'default'  => '#',
            ),											
        )
    ) );

    // -> START Slider Options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Slider', 'tada' ),
        'id'         => 'general-slider',
        'desc'       => esc_html__( 'Slider Options', 'tada' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'header-slider',
                'type'     => 'switch',
                'title'    => esc_html__('Header Slider','tada'),
                'subtitle' => 'Click <code>On</code> for active Slider',
                'default'  => true
            ),		
            array(
                'id'       => 'header-slider-position',
                'type'     => 'select',
                'title'    => esc_html__( 'Slider Position', 'tada' ),
                'subtitle' => esc_html__( 'Select pages shows slider', 'tada' ),
                'options'  => array(
                    'allpages' => esc_html__('All Pages','tada'),
                    'homepage' => esc_html__('Home Page','tada'),
                    'disable'  => esc_html__('Disable','tada')
                ),
                'default'  => 'homepage',
				'required' => array( 'header-slider', '=', true ),
            ),
            array(
                'id'       => 'header-slider-shortcode',
                'type'     => 'text',
                'title'    => esc_html__( 'Slider Shortcode', 'tada' ),
                'subtitle' => esc_html__( 'Add your slider shortcode', 'tada' ),
				'required' => array( 'header-slider', '=', true ),
                'default'  => '',
            ),						
        )
    ) );

    // -> START Footer
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer', 'tada' ),
        'id'               => 'footer',
        'customizer_width' => '500px',
        'icon'             => 'el el-inbox',
    ) );

    // -> START Footer Options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer Settings', 'tada' ),
        'id'         => 'footer-settings',
        'desc'       => esc_html__( 'All footer settings', 'tada' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'footer-gallery-type',
                'type'     => 'select',
                'title'    => esc_html__( 'Footer Gallery Type', 'tada' ),
                'subtitle' => esc_html__( 'Select footer gallery type', 'tada' ),
                'options'  => array(
                    'gallery' 	=> esc_html__('Gallery','tada'),
                    'instagram' => esc_html__('Instagram','tada'),
                    'off'  		=> esc_html__('Off','tada')
                ),
				'default'  => 'gallery',
			),			 
            array(
                'id'       => 'footer-gallery-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Gallery Title', 'tada' ),
                'subtitle' => esc_html__( 'Leave empty for disable', 'tada' ),
                'default'  => '',
				'required' => array( 'footer-gallery-type', '=', 'gallery' ),				
            ),			           
			array(
                'id'       => 'footer-gallery',
                'type'     => 'gallery',
                'title'    => esc_html__( 'Add/Edit Footer Gallery', 'tada' ),
                'subtitle' => esc_html__( 'Create a new Footer Gallery ', 'tada' ),
				'default'  => '',
				'required' => array( 'footer-gallery-type', '=', 'gallery' ),
            ),
            array(
                'id'       => 'footer-instagram-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title Instagram', 'tada' ),
                'subtitle' => esc_html__( 'Leave empty for disable', 'tada' ),
                'default'  => '',
				'required' => array( 'footer-gallery-type', '=', 'instagram' ),				
            ),						
            array(
                'id'       => 'footer-instagram-account',
                'type'     => 'text',
                'title'    => esc_html__( 'Account', 'tada' ),
                'subtitle' => esc_html__( 'Instagram Name Account', 'tada' ),
                'default'  => '',
				'required' => array( 'footer-gallery-type', '=', 'instagram' ),				
            ),									
            array(
                'id'       => 'footer-instagram-number',
                'type'     => 'text',
                'title'    => esc_html__( 'Number Images to load', 'tada' ),
                'subtitle' => esc_html__( 'Enter number of images to load. Example 6', 'tada' ),
                'default'  => '6',
				'required' => array( 'footer-gallery-type', '=', 'instagram' ),				
            ),				
            array(
                'id'   => 'opt-required-divide-1',
                'type' => 'divide'
            ),					
            array(
                'id'       => 'footer-text-active',
                'type'     => 'switch',
                'title'    => 'Footer Text',
                'subtitle' => 'Click <code>On</code> for active Footer Text',
                'default'  => true
            ),
            array(
                'id'       => 'footer-text',
                'type'     => 'text',
                'title'    => esc_html__( 'Footer Text', 'tada' ),
				'required' => array( 'footer-text-active', '=', true ),
                'default'  => esc_html__('Theme Created by Copyright 2016. All Rights Reserved','tada'),
            ), 
            array(
                'id'   => 'opt-required-divide-1',
                'type' => 'divide'
            ),
            array(
                'id'       => 'back-to-top',
                'type'     => 'switch',
                'title'    => 'Back to top Button',
                'subtitle' => 'Click <code>On</code> for active back to top Button',
                'default'  => true
            ),		
											
        )
    ) );

    // -> START Footer
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Single', 'tada' ),
        'id'               => 'single',
        'customizer_width' => '500px',
        'icon'             => 'el el-file',
    ) );

    // -> START Footer Options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Single Settings', 'tada' ),
        'id'         => 'single-settings',
        'desc'       => esc_html__( 'All single settings', 'tada' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'single-pagination-post',
                'type'     => 'switch',
                'title'    => 'Pagination Post',
                'subtitle' => 'Click <code>On</code> for active Pagination Post',
                'default'  => true
            ),
            array(
                'id'   => 'opt-required-divide-1',
                'type' => 'divide'
            ),
            array(
                'id'       => 'single-author-bio',
                'type'     => 'switch',
                'title'    => 'Author Info',
                'subtitle' => 'Click <code>On</code> for active Author Bio',
                'default'  => true
            ),
            array(
                'id'   => 'opt-required-divide-1',
                'type' => 'divide'
            ),								
            array(
                'id'       => 'single-related-posts',
                'type'     => 'switch',
                'title'    => 'Related Posts',
                'subtitle' => 'Click <code>On</code> for active Related Posts',
                'default'  => true
            ),
            array(
                'id'   => 'opt-required-divide-1',
                'type' => 'divide'
            ),
											
        )
    ) );

    // -> START General Pages
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General Pages', 'tada' ),
        'id'               => 'general-pages',
        'customizer_width' => '500px',
        'icon'             => 'el el-adjust-alt',
    ) );
		
    // -> START 404 Options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( '404', 'tada' ),
        'id'         => 'general-pages-404',
        'desc'       => esc_html__( '404 Page settings', 'tada' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'sidebar-404',
                'type'     => 'select',
                'title'    => esc_html__( 'Sidebar 404 Page', 'tada' ),
                'options'  => array(
					'sidebar-none'  => __('None','tada'),
					'sidebar-left'  => __('Left','tada'),
					'sidebar-right' => __('Right','tada')
                ),
                'default'  => 'sidebar-right',
            ),											
        )
    ) );	
	
	// -> START Archive Options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Archive', 'tada' ),
        'id'         => 'general-pages-archive',
        'desc'       => esc_html__( 'Archive Page settings', 'tada' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'sidebar-archive',
                'type'     => 'select',
                'title'    => esc_html__( 'Sidebar Archive Page', 'tada' ),
                'options'  => array(
					'sidebar-none'  => esc_html__('None','tada'),
					'sidebar-left'  => esc_html__('Left','tada'),
					'sidebar-right' => esc_html__('Right','tada')
                ),
                'default'  => 'sidebar-right',
            ),
            array(
                'id'       => 'layout-archive',
                'type'     => 'select',
                'title'    => esc_html__( 'Layout Archive Page', 'tada' ),
                'options'  => array(
					'tada-blog-1-column'   => esc_html__('1 Column','tada'),
					'tada-blog-2-columns'  => esc_html__('2 Columns','tada')
                ),
                'default'  => 'tada-blog-1-column',
            ),														
        )
    ) );		

	// -> START Author Options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Author', 'tada' ),
        'id'         => 'general-pages-author',
        'desc'       => esc_html__( 'Author Page settings', 'tada' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'sidebar-author',
                'type'     => 'select',
                'title'    => esc_html__( 'Sidebar Author Page', 'tada' ),
                'options'  => array(
					'sidebar-none'  => esc_html__('None','tada'),
					'sidebar-left'  => esc_html__('Left','tada'),
					'sidebar-right' => esc_html__('Right','tada')
                ),
                'default'  => 'sidebar-right',
            ),
            array(
                'id'       => 'layout-author',
                'type'     => 'select',
                'title'    => esc_html__( 'Layout Author Page', 'tada' ),
                'options'  => array(
					'tada-blog-1-column'   => esc_html__('1 Column','tada'),
					'tada-blog-2-columns'  => esc_html__('2 Columns','tada')
                ),
                'default'  => 'tada-blog-1-column',
            ),														
        )
    ) );		

	// -> START Category Options
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Category', 'tada' ),
        'id'         => 'general-pages-category',
        'desc'       => esc_html__( 'Category Page settings', 'tada' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'sidebar-category',
                'type'     => 'select',
                'title'    => esc_html__( 'Sidebar Category Page', 'tada' ),
                'options'  => array(
					'sidebar-none'  => esc_html__('None','tada'),
					'sidebar-left'  => esc_html__('Left','tada'),
					'sidebar-right' => esc_html__('Right','tada')
                ),
                'default'  => 'sidebar-right',
            ),
            array(
                'id'       => 'layout-category',
                'type'     => 'select',
                'title'    => esc_html__( 'Layout Category Page', 'tada' ),
                'options'  => array(
					'tada-blog-1-column'   => esc_html__('1 Column','tada'),
					'tada-blog-2-columns'  => esc_html__('2 Columns','tada')
                ),
                'default'  => 'tada-blog-1-column',
            ),
            array(
                'id'       => 'category-description',
                'type'     => 'select',
                'title'    => esc_html__( 'Category Description', 'tada' ),
                'options'  => array(
					'on'   => esc_html__('Show','tada'),
					'off'  => esc_html__('Hidden','tada')
                ),
                'default'  => 'on',
            ),																		
        )
    ) );

    // -> START Image Options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Image', 'tada' ),
        'id'         => 'general-pages-image',
        'desc'       => esc_html__( 'Image Page settings', 'tada' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'sidebar-image',
                'type'     => 'select',
                'title'    => esc_html__( 'Sidebar Image Page', 'tada' ),
                'options'  => array(
					'sidebar-none'  => esc_html__('None','tada'),
					'sidebar-left'  => esc_html__('Left','tada'),
					'sidebar-right' => esc_html__('Right','tada')
                ),
                'default'  => 'sidebar-right',
            ),											
        )
    ) );
	
	
	// -> START Search Options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Search', 'tada' ),
        'id'         => 'general-pages-search',
        'desc'       => esc_html__( 'Search Page settings', 'tada' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'sidebar-search',
                'type'     => 'select',
                'title'    => esc_html__( 'Sidebar Search Page', 'tada' ),
                'options'  => array(
					'sidebar-none'  => esc_html__('None','tada'),
					'sidebar-left'  => esc_html__('Left','tada'),
					'sidebar-right' => esc_html__('Right','tada')
                ),
                'default'  => 'sidebar-right',
            ),
            array(
                'id'       => 'layout-search',
                'type'     => 'select',
                'title'    => esc_html__( 'Layout Search Page', 'tada' ),
                'options'  => array(
					'tada-blog-1-column'   => esc_html__('1 Column','tada'),
					'tada-blog-2-columns'  => esc_html__('2 Columns','tada')
                ),
                'default'  => 'tada-blog-1-column',
            ),														
        )
    ) );	
	
	// -> START Search Options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Tag', 'tada' ),
        'id'         => 'general-pages-tag',
        'desc'       => esc_html__( 'Tag Page settings', 'tada' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'sidebar-tag',
                'type'     => 'select',
                'title'    => esc_html__( 'Sidebar Tag Page', 'tada' ),
                'options'  => array(
					'sidebar-none'  => esc_html__('None','tada'),
					'sidebar-left'  => esc_html__('Left','tada'),
					'sidebar-right' => esc_html__('Right','tada')
                ),
                'default'  => 'sidebar-right',
            ),
            array(
                'id'       => 'layout-tag',
                'type'     => 'select',
                'title'    => esc_html__( 'Layout Tag Page', 'tada' ),
                'options'  => array(
					'tada-blog-1-column'   => esc_html__('1 Column','tada'),
					'tada-blog-2-columns'  => esc_html__('2 Columns','tada')
                ),
                'default'  => 'tada-blog-1-column',
            ),														
        )
    ) );	
	
    // -> START Style
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Style', 'tada' ),
        'id'               => 'style',
        'customizer_width' => '500px',
        'icon'             => 'el el-tasks',
    ) );	
	
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Style', 'tada' ),
        'id'         => 'style-color',
        'desc'       => esc_html__( 'All Color Style: ', 'tada' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'main-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Main color', 'tada' ),
                'subtitle' => esc_html__( 'Pick a Main color of theme (default: #f6f6f6).', 'tada' ),
                'default'  => '#f6f6f6',
            ),
            array(
                'id'       => 'second-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Second Color', 'tada' ),
                'subtitle' => esc_html__( 'Pick a Second color of theme (default: #9c8156).', 'tada' ),
                'default'  => '#9c8156',
                'validate' => 'color',
            ),
            array(
                'id'       => 'third-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Third Color', 'tada' ),
                'subtitle' => esc_html__( 'Pick a Third color of theme (default: #ffffff).', 'tada' ),
                'default'  => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id'       => 'fourth-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Fourth Color', 'tada' ),
                'subtitle' => esc_html__( 'Pick a Fourth color of theme (default: #000000).', 'tada' ),
                'default'  => '#000000',
                'validate' => 'color',
            ),	
            array(
                'id'       => 'fifth-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Fifth Color', 'tada' ),
                'subtitle' => esc_html__( 'Pick a Fourth color of theme (default: #545454).', 'tada' ),
                'default'  => '#545454',
                'validate' => 'color',
            ),	
            array(
                'id'       => 'minor-color-1',
                'type'     => 'color',
                'title'    => esc_html__( 'Minor Color 1', 'tada' ),
                'subtitle' => esc_html__( 'Pick a Minor color of theme (default: #333333).', 'tada' ),
                'default'  => '#333333',
                'validate' => 'color',
            ),
            array(
                'id'       => 'minor-color-2',
                'type'     => 'color',
                'title'    => esc_html__( 'Minor Color 2', 'tada' ),
                'subtitle' => esc_html__( 'Pick a Minor color of theme (default: #6d593d).', 'tada' ),
                'default'  => '#6d593d',
                'validate' => 'color',
            ),
            array(
                'id'       => 'minor-color-3',
                'type'     => 'color',
                'title'    => esc_html__( 'Minor Color 3', 'tada' ),
                'subtitle' => esc_html__( 'Pick a Minor color of theme (default: #d6d6d6).', 'tada' ),
                'default'  => '#d6d6d6',
                'validate' => 'color',
            ),
            array(
                'id'       => 'minor-color-4',
                'type'     => 'color',
                'title'    => esc_html__( 'Minor Color 4', 'tada' ),
                'subtitle' => esc_html__( 'Pick a Minor color of theme (default: #333333).', 'tada' ),
                'default'  => '#333333',
                'validate' => 'color',
            ),																						
        ),
    ) );	
		
    // -> START Typography
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Typography', 'tada' ),
        'id'     => 'typography',
        'desc'   => esc_html__( 'All typography settings', 'tada' ),
        'icon'   => 'el el-font',
		'subsection' => true,
        'fields' => array(
            array(
                'id'          	=> 'main-typography',
                'type'        	=> 'typography',
                'title'       	=> esc_html__( 'Body Typography', 'tada' ),
                'font-backup' 	=> false,
                'font-size'     => false,
                'line-height'   => false,
                'word-spacing'  => false, 
                'letter-spacing'=> false,
                'color'         => false,
				'text-align'	=> false,
                'all_styles'  	=> true,
                'default'     	=> array(
                    'font-style'  => '',
                    'font-family' => 'Source Sans Pro',
					'font-weight' => '400',
					'subsets'	  => 'latin', 
                    'google'      => true,
                ),
            ),
            array(
                'id'          	=> 'title-typography',
                'type'        	=> 'typography',
                'title'       	=> esc_html__( 'Title Typography', 'tada' ),
                'font-backup' 	=> false,
                'font-size'     => false,
                'line-height'   => false,
                'word-spacing'  => false, 
                'letter-spacing'=> false,
                'color'         => false,
				'text-align'	=> false,
                'all_styles'  	=> true,
                'default'     	=> array(
                    'font-style'  => '',
                    'font-family' => 'Playfair Display',
					'font-weight' => '400',
					'subsets'	  => 'latin', 
                    'google'      => true,
                ),
            ),								
        )
    ) );		

    // -> START Editors
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Custom Code', 'tada' ),
        'id'               => 'custom-code',
        'customizer_width' => '500px',
        'icon'             => 'el el-edit',
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Custom Code', 'tada' ),
        'id'         => 'custom-code-fields',
        'subsection' => true,
        'desc'       => esc_html__( 'Add your custom CSS Code', 'tada' ),
        'fields'     => array(    
			array(
                'id'       => 'css-custom-code',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'CSS Code', 'tada' ),
                'subtitle' => esc_html__( 'Paste your CSS code here.', 'tada' ),
                'mode'     => 'css',
                'theme'    => 'monokai',
                'default'  => ""
            ),
            array(
                'id'       => 'js-custom-code',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'JS Code', 'flownews' ),
                'subtitle' => esc_html__( 'Paste your JS code here.', 'flownews' ),
                'mode'     => 'javascript',
                'theme'    => 'chrome',
                'default'  => "jQuery(document).ready(function(){\n\n});"
            )
        )
    ) );

    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'tada' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'tada' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'tada' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }  