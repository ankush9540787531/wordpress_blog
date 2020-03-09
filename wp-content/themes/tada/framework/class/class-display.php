<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */ 
 
 class My_Walker_Nav_Menu extends Walker_Nav_Menu {
	  function start_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"submenu\">\n";
	  }
 }
 
 if ( ! class_exists( 'AdThemeFramework_Display' ) ) {

	class AdThemeFramework_Display {

		# Preloader
		static function tada_menu($active,$type) {
				 		 
				 
				 return $return;
				 
		}



		 
	} #CLASS
	
 } #IF