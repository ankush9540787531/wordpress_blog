<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */
 global $tada_theme;
 if(!isset($tada_theme['menu-sticky'])) : $tada_theme['menu-sticky'] = 'menu-sticky'; endif; 
 ?>
 
 <!-- start:menu desktop --> 
 <?php
        // Top Navigation
        $defaults = array(
            'theme_location'  => 'main-menu',
            'container'       => 'ul',
            'container_class' => 'tada-menu',
            'container_id'    => '',
            'fallback_cb'     => 'nav_fallback',
            'menu_class'      => 'tada-menu',
            'menu_id'         => '',
            'echo'            => true,
            'depth'           => 0,
			'walker' 		  => new My_Walker_Nav_Menu()
        );
		if ( function_exists( 'wp_nav_menu' ) && has_nav_menu('main-menu') )  {
		?>	
        	<nav class="menu-desktop <?php echo esc_html($tada_theme['menu-sticky']); ?>">
        		<?php wp_nav_menu( $defaults ); ?>
			</nav>	
 <?php } ?>
 <!-- end:menu desktop -->  
 
 
 <!-- start:menu responsive -->
 <div class="menu-responsive-container"> 
    <div class="open-menu-responsive">|||</div> 
    <div class="close-menu-responsive">|</div>              
    <div class="menu-responsive">  
     <?php
        // Top Navigation
        $defaults = array(
            'theme_location'  => 'main-menu',
            'container'       => 'ul',
            'container_class' => 'tada-menu',
            'container_id'    => '',
            'fallback_cb'     => 'nav_fallback',
            'menu_class'      => 'tada-menu',
            'menu_id'         => '',
            'echo'            => true,
            'depth'           => 0,
			'walker' 		  => new My_Walker_Nav_Menu()
        );
		if ( function_exists( 'wp_nav_menu' ) && has_nav_menu('main-menu') )  {
        	wp_nav_menu( $defaults );
		}
      ?>
 	</div>
 </div>
 <!-- end:menu responsive -->