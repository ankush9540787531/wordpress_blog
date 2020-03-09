<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */
 ?>

 <div class="sidebar col-xs-4">
 
	 <?php 
	 if ( is_active_sidebar( 'tada-default' ) ) {
		 
     	$sidebar = 'tada-default';     
     	$checkWidget = wp_get_sidebars_widgets(); 		                      
		if (!empty($checkWidget[$sidebar])) {               
			dynamic_sidebar($sidebar);                
		} else{
			echo esc_html__('<h3>This is a Sidebar position</h3><br /><em>Add your widgets in this position using Default Sidebar or a custom sidebar.</em>','tada');
		}
	 
	 }
     ?>
     
 </div>