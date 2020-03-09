<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */

 global $tada_theme;
 get_header(); 
 
 # Load Metabox Value
 $sidebar_404 = esc_html($tada_theme['sidebar-404']);
 if(!isset($sidebar_404) || $sidebar_404 == '') : $sidebar_404 = 'sidebar-none'; endif; 
 
 ?>
 
 <!-- start:page section -->
 <section class="tada-container content-posts page post-full-width <?php echo esc_html($sidebar_404); ?>">
 
 
	 <?php if($sidebar_404 == 'sidebar-none') : ?> 
     <!-- start:sidebar none - full width -->
        <div class="content col-xs-12">
             <!-- start:404 content -->
             <?php 
				 get_template_part('elements/404-content');		 
			 ?>
             <!-- end:404 content -->	
        </div>
     <!-- end:sidebar none - full width -->
     <?php endif; ?>
 
 
 
 
	 <?php if($sidebar_404 == 'sidebar-left') : ?> 
     <!-- start:sidebar left -->
        <?php get_template_part('sidebar'); ?> 
        <div class="content col-xs-8"> 
             <!-- start:404 content -->
             <?php 
				 get_template_part('elements/404-content');		 
			 ?>
             <!-- end:404 content -->	
        </div>
     <!-- end:sidebar left -->
     <?php endif; ?>
 


 
	 <?php if($sidebar_404 == 'sidebar-right') : ?>    
     <!-- start:sidebar left -->
        <div class="content col-xs-8"> 
             <!-- start:404 content -->
             <?php 
				 get_template_part('elements/404-content');		 
			 ?>
             <!-- end:404 content -->	
        </div>    
        <?php get_template_part('sidebar'); ?>
     <!-- end:sidebar left -->
     <?php endif; ?>
     
 	<div class="clearfix"></div>
 </section>
 <!-- end:page section -->
 
 
 <?php get_footer(); ?>