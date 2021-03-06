<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */

 global $tada_theme;
 get_header(); 
 
 # Load Redux Category Value
 $sidebar = esc_html($tada_theme['sidebar-category']);
 if(!isset($sidebar) || $sidebar == '') : $sidebar = 'sidebar-right'; endif; 
 
 $layout_type = esc_html($tada_theme['layout-category']);
 $layout_class = 'blog-layout';
 if(!isset($layout_type) || $layout_type == '') : $layout_type = 'tada-blog-1-column'; endif; 
 
 ?>
 
 <!-- start:page section -->
 <section class="tada-container content-posts page post-full-width blog-layout <?php echo esc_html($sidebar); ?>">
 
 
	 <?php if($sidebar == 'sidebar-none') : ?> 
     <!-- start:sidebar none - full width -->
        <div class="content col-xs-12 <?php echo esc_html($layout_type); ?>">
        	<div class="post-text tada-title-page">
                    <h2 class="generic-title-page">
						<?php printf( esc_html__( 'Category: %s', 'tada' ), single_cat_title( '', false ) ); ?>
                    </h2>
                    
					<?php if ( category_description() && $tada_theme['category-description'] == 'on') : ?>
						<div class="archive-meta"><?php echo category_description(); ?></div>
					<?php endif; ?>                                        
             </div>                 
             <!-- start:page content -->
             <?php 
				 if($layout_type == 'tada-blog-1-column') 	: get_template_part('elements/loop-post-1'); 		endif; 			 
				 if($layout_type == 'tada-blog-2-columns') 	: get_template_part('elements/loop-post-2'); 		endif; 			 
			 ?>
             <!-- end:page content -->	
        </div>
     <!-- end:sidebar none - full width -->
     <?php endif; ?>
 
 
 
 
	 <?php if($sidebar == 'sidebar-left') : ?> 
     <!-- start:sidebar left -->
        <?php get_template_part('sidebar'); ?> 
        <div class="content col-xs-8 <?php echo esc_html($layout_type); ?>"> 
            <div class="post-text tada-title-page">
                    <h2 class="generic-title-page">
						<?php printf( esc_html__( 'Category: %s', 'tada' ), single_cat_title( '', false ) ); ?>
                    </h2>
                    
					<?php if ( category_description() && $tada_theme['category-description'] == 'on') : ?>
						<div class="archive-meta"><?php echo category_description(); ?></div>
					<?php endif; ?>              
             </div>  
             <!-- start:page content -->
             <?php 
				 if($layout_type == 'tada-blog-1-column') 	: get_template_part('elements/loop-post-1'); 		endif; 			 
				 if($layout_type == 'tada-blog-2-columns') 	: get_template_part('elements/loop-post-2'); 		endif; 			 
			 ?>             <!-- end:page content --> 
        </div>
     <!-- end:sidebar left -->
     <?php endif; ?>
 


 
	 <?php if($sidebar == 'sidebar-right') : ?>    
     <!-- start:sidebar left -->
        <div class="content col-xs-8 <?php echo esc_html($layout_type); ?>">
        	<div class="post-text tada-title-page">
                    <h2 class="generic-title-page">
						<?php printf( esc_html__( 'Category: %s', 'tada' ), single_cat_title( '', false ) ); ?>
                    </h2>
                    
					<?php if ( category_description() && $tada_theme['category-description'] == 'on') : ?>
						<div class="archive-meta"><?php echo category_description(); ?></div>
					<?php endif; ?>              
             </div>           
             <!-- start:page content -->
             <?php 
				 if($layout_type == 'tada-blog-1-column') 	: get_template_part('elements/loop-post-1'); 		endif; 			 
				 if($layout_type == 'tada-blog-2-columns') 	: get_template_part('elements/loop-post-2'); 		endif; 			 
			 ?>             <!-- end:page content --> 
        </div>    
        <?php get_template_part('sidebar'); ?>
     <!-- end:sidebar left -->
     <?php endif; ?>
     
 	<div class="clearfix"></div>
 </section>
 <!-- end:page section -->
 
 
 <?php get_footer(); ?>