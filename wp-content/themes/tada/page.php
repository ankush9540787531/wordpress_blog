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
 
 $layout_type = get_post_meta( get_the_id(), 'tada-layout-type', true );
 if(!isset($layout_type) || $layout_type == '') : $layout_type = 'tada-page'; endif;
 if($layout_type != 'tada-page') : $layout_class = 'blog-layout'; else : $layout_class = ''; endif;  
 ?>
 
 <!-- start:page section -->
 <section class="tada-container content-posts page post-full-width <?php echo esc_html($layout_class); ?> <?php echo esc_html($sidebar); ?>">
 
 
	 <?php if($sidebar == 'sidebar-none') : ?> 
     <!-- start:sidebar none - full width -->
        <div class="content col-xs-12 <?php echo esc_html($layout_type); ?>">
             <!-- start:page content -->
             <?php 
				 if($layout_type == 'tada-page') 			: get_template_part('elements/page-content'); 	endif; 
				 if($layout_type == 'tada-blog-1-column') 	: get_template_part('elements/blog-1'); 		endif; 			 
				 if($layout_type == 'tada-blog-2-columns') 	: get_template_part('elements/blog-2'); 		endif; 			 
				 if($layout_type == 'tada-blog-3-columns') 	: get_template_part('elements/blog-3'); 		endif;			 
			 ?>
             <!-- end:page content -->	
        </div>
     <!-- end:sidebar none - full width -->
     <?php endif; ?>
 
 
 
 
	 <?php if($sidebar == 'sidebar-left') : ?> 
     <!-- start:sidebar left -->
        <?php get_template_part('sidebar'); ?> 
        <div class="content col-xs-8 <?php echo esc_html($layout_type); ?>"> 
             <!-- start:page content -->
             <?php 
				 if($layout_type == 'tada-page') 			: get_template_part('elements/page-content'); 	endif; 
				 if($layout_type == 'tada-blog-1-column') 	: get_template_part('elements/blog-1'); 		endif; 			 
				 if($layout_type == 'tada-blog-2-columns') 	: get_template_part('elements/blog-2'); 		endif; 			 
				 if($layout_type == 'tada-blog-3-columns') 	: get_template_part('elements/blog-3'); 		endif;			 
			 ?>
             <!-- end:page content --> 
        </div>
     <!-- end:sidebar left -->
     <?php endif; ?>
 


 
	 <?php if($sidebar == 'sidebar-right') : ?>    
     <!-- start:sidebar left -->
        <div class="content col-xs-8 <?php echo esc_html($layout_type); ?>"> 
             <!-- start:page content -->
             <?php 
				 if($layout_type == 'tada-page') 			: get_template_part('elements/page-content'); 	endif; 
				 if($layout_type == 'tada-blog-1-column') 	: get_template_part('elements/blog-1'); 		endif; 			 
				 if($layout_type == 'tada-blog-2-columns') 	: get_template_part('elements/blog-2'); 		endif; 			 
				 if($layout_type == 'tada-blog-3-columns') 	: get_template_part('elements/blog-3'); 		endif;			 
			 ?>
             <!-- end:page content --> 
        </div>    
        <?php get_template_part('sidebar'); ?>
     <!-- end:sidebar left -->
     <?php endif; ?>
     
 	<div class="clearfix"></div>
 </section>
 <!-- end:page section -->
 
 
 <?php get_footer(); ?>