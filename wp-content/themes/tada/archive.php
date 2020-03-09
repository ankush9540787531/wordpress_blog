<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */

 global $tada_theme;
 get_header(); 
 
 # Load Redux Archive Value
 $sidebar = esc_html($tada_theme['sidebar-archive']);
 if(!isset($sidebar) || $sidebar == '') : $sidebar = 'sidebar-right'; endif; 
 
 $layout_type = esc_html($tada_theme['layout-archive']);
 $layout_class = 'blog-layout';
 if(!isset($layout_type) || $layout_type == '') : $layout_type = 'tada-blog-1-column'; endif; 
 
 ?>
 
 <!-- start:page section -->
 <section class="tada-container content-posts page post-full-width blog-layout <?php echo esc_html($sidebar); ?>">
 
 
	 <?php if($sidebar == 'sidebar-none') : ?> 
     <!-- start:sidebar none - full width -->
        <div class="content col-xs-12 <?php echo esc_html($layout_type); ?>">
        	<div class="post-text tada-title-page">
                    <h2 class="generic-title-page"><?php
                        if ( is_day() ) :
                            printf( esc_html__( 'Daily Archives: %s', 'tada' ), get_the_date() );
                        elseif ( is_month() ) :
                            printf( esc_html__( 'Monthly Archives: %s', 'tada' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'tada' ) ) );
                        elseif ( is_year() ) :
                            printf( esc_html__( 'Yearly Archives: %s', 'tada' ), get_the_date( _x( 'Y', 'yearly archives date format', 'tada' ) ) );
                        elseif ( has_post_format('image') ) :
							esc_html_e( 'Format Image', 'tada' );
                        elseif ( has_post_format('video') ) :
							esc_html_e( 'Format Video', 'tada' );
                        elseif ( has_post_format('audio') ) :
							esc_html_e( 'Format Audio', 'tada' );
                        elseif ( has_post_format('gallery') ) :
							esc_html_e( 'Format Gallery', 'tada' );
                        elseif ( has_post_format('quote') ) :
							esc_html_e( 'Format Quote', 'tada' );
                        elseif ( has_post_format('link') ) :
							esc_html_e( 'Format Link', 'tada' );																																										
						else :
                            esc_html_e( 'Archives', 'tada' );
                        endif;
                    ?></h2>
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
                    <h2 class="generic-title-page"><?php
                        if ( is_day() ) :
                            printf( esc_html__( 'Daily Archives: %s', 'tada' ), get_the_date() );
                        elseif ( is_month() ) :
                            printf( esc_html__( 'Monthly Archives: %s', 'tada' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'tada' ) ) );
                        elseif ( is_year() ) :
                            printf( esc_html__( 'Yearly Archives: %s', 'tada' ), get_the_date( _x( 'Y', 'yearly archives date format', 'tada' ) ) );
                        elseif ( has_post_format('image') ) :
							esc_html_e( 'Format Image', 'tada' );
                        elseif ( has_post_format('video') ) :
							esc_html_e( 'Format Video', 'tada' );
                        elseif ( has_post_format('audio') ) :
							esc_html_e( 'Format Audio', 'tada' );
                        elseif ( has_post_format('gallery') ) :
							esc_html_e( 'Format Gallery', 'tada' );
                        elseif ( has_post_format('quote') ) :
							esc_html_e( 'Format Quote', 'tada' );
                        elseif ( has_post_format('link') ) :
							esc_html_e( 'Format Link', 'tada' );																																										
						else :
                            esc_html_e( 'Archives', 'tada' );
                        endif;
                    ?></h2>
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
                    <h2 class="generic-title-page"><?php
                        if ( is_day() ) :
                            printf( esc_html__( 'Daily Archives: %s', 'tada' ), get_the_date() );
                        elseif ( is_month() ) :
                            printf( esc_html__( 'Monthly Archives: %s', 'tada' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'tada' ) ) );
                        elseif ( is_year() ) :
                            printf( __( 'Yearly Archives: %s', 'tada' ), get_the_date( _x( 'Y', 'yearly archives date format', 'tada' ) ) );
                        elseif ( has_post_format('image') ) :
							esc_html_e( 'Format Image', 'tada' );
                        elseif ( has_post_format('video') ) :
							esc_html_e( 'Format Video', 'tada' );
                        elseif ( has_post_format('audio') ) :
							esc_html_e( 'Format Audio', 'tada' );
                        elseif ( has_post_format('gallery') ) :
							esc_html_e( 'Format Gallery', 'tada' );
                        elseif ( has_post_format('quote') ) :
							esc_html_e( 'Format Quote', 'tada' );
                        elseif ( has_post_format('link') ) :
							esc_html_e( 'Format Link', 'tada' );																																										
						else :
                            esc_html_e( 'Archives', 'tada' );
                        endif;
                    ?></h2>
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