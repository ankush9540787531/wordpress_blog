<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */
 
 get_header(); 
 
 # Load Metabox Value
 $sidebar = get_post_meta( get_the_id(), 'tada-sidebar', true );
 if(!isset($sidebar) || $sidebar == '') : $sidebar = 'sidebar-none'; endif; 
 
 ?>
 
  <!-- start:post section -->
 <section class="tada-container content-posts post post-full-width <?php echo esc_html($sidebar); ?>">
 
 
	 <?php if($sidebar == 'sidebar-none') : ?> 
     <!-- start:sidebar none - full width -->
        <div class="content col-xs-12">
             <!-- start:page content -->
             <?php get_template_part('elements/post-content'); ?>
             <!-- end:page content -->	
        </div>
     <!-- end:sidebar none - full width -->
     <?php endif; ?>
	 
     
	 <?php if($sidebar == 'sidebar-left') : ?> 
     <!-- start:sidebar left -->
        <?php get_template_part('sidebar'); ?> 
        <div class="content col-xs-8 <?php echo esc_html($layout_type); ?>"> 
             <!-- start:page content -->
             <?php get_template_part('elements/post-content'); ?>
             <!-- end:page content -->
        </div>
     <!-- end:sidebar left -->
     <?php endif; ?>  
     
     
     
	 <?php if($sidebar == 'sidebar-right') : ?>    
     <!-- start:sidebar left -->
        <div class="content col-xs-8 <?php echo esc_html($layout_type); ?>"> 
             <!-- start:page content -->
             <?php get_template_part('elements/post-content'); ?>
             <!-- end:page content --> 
        </div>    
        <?php get_template_part('sidebar'); ?>
     <!-- end:sidebar left -->
     <?php endif; ?>
     
     <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
 	
    <div class="clearfix"></div>
 </section>
 <!-- end:post section -->
 
 
 <?php get_footer(); ?>        