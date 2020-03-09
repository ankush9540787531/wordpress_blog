<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */
  
 global $tada_theme;
 require('framework/load_default_var.php');
 
 ?>
 <!doctype html>
 <!--[if lt IE 7]> <html class="no-js ie6 oldie"> <![endif]-->
 <!--[if IE 7]>    <html class="no-js ie7 oldie"> <![endif]-->
 <!--[if IE 8]>    <html class="no-js ie8 oldie"> <![endif]-->
 <!--[if IE 9]>    <html class="no-js ie9 oldie"> <![endif]-->
 <html class="no-js" <?php language_attributes(); ?>>
 <head>
 
 <!-- start:global -->
 <meta charset="<?php bloginfo( 'charset' );?>" />
 <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1"><![endif]-->
 <!-- end:global -->
 
 <!-- start:responsive web design -->
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- end:responsive web design --> 
 
 <!-- start:head info -->
 <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
 
 <?php if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) : ?>
 	<link rel="shortcut icon" href="<?php echo esc_url($tada_theme['favicon']['url']); ?>"> 	
 <?php endif; ?> 
 <!-- end:head info -->
 
 <!-- start:wp_head -->
 <?php wp_head(); ?>
 <!-- end:wp_head --> 
 
 </head>
 <body <?php body_class() ?>>
 
 <!-- start:preloader -->
 <?php get_template_part('elements/preloader'); ?>
 <!-- end:preloader -->
 
 <!-- start:header content -->
 <?php get_template_part('elements/header'); ?>
 <!-- end:header content -->   