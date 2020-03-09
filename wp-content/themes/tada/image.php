<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */
 
 global $tada_theme;
 get_header(); 
 
 # Load Redux Image Value
 $sidebar = esc_html($tada_theme['sidebar-image']);
 if(!isset($sidebar) || $sidebar == '') : $sidebar = 'sidebar-right'; endif; 
  
 ?>
 
 <!-- start:page section -->
 <section class="tada-container content-posts page post-full-width <?php echo esc_html($sidebar); ?>">
 
 
	 <?php if($sidebar == 'sidebar-none') : ?> 
     <!-- start:sidebar none - full width -->
        <div class="content col-xs-12">
        <?php if ( have_posts() ) : ?>
        	<div class="post-text text-content tada-title-page">
                    <h2 class="generic-title-page">
						<?php the_title(); ?>
                    </h2>                                     
				<div class="attachment-image">
					<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id()); ?>" alt="image" >
                </div>
                <div class="text attachment-container">
					<?php $thumb_array = get_post( get_post_thumbnail_id() ); ?>
                    <span class="attachment-image-id"><?php echo esc_html__('ID: ','tada'); ?><?php echo $thumb_array->ID; ?></span>
                    <span class="attachment-image-author"><?php echo esc_html__('Author: ','tada'); ?><?php echo the_author_meta( 'display_name', $thumb_array->post_author ); ?></span>                          
                    <span class="attachment-image-date"><?php echo esc_html__('Date: ','tada'); ?><?php echo $thumb_array->post_date; ?></span>                          
                    <span class="attachment-image-description"><?php echo esc_html__('Description: ','tada'); ?><?php echo $thumb_array->post_content; ?></span>                          
                    <span class="attachment-image-caption"><?php echo esc_html__('Caption: ','tada'); ?><?php echo $thumb_array->post_excerpt; ?></span>                          
                    <span class="attachment-image-type"><?php echo esc_html__('Type: ','tada'); ?><?php echo $thumb_array->post_mime_type; ?></span>                
             	</div> 
             </div>                             
             <!-- end:page content -->
        <?php endif; ?>     	
        </div>
     <!-- end:sidebar none - full width -->
     <?php endif; ?>
 
 
 
 
	 <?php if($sidebar == 'sidebar-left') : ?> 
     <!-- start:sidebar left -->
        <?php get_template_part('sidebar'); ?> 
        <div class="content col-xs-8"> 
        <?php if ( have_posts() ) : ?>
        	<div class="post-text">
                    <h2 class="generic-title-page">
						<?php the_title(); ?>
                    </h2>                                     
             </div>                 
             <!-- start:page content -->
			 <article>
				<div class="attachment-image">
				<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id()); ?>" alt="image" >
                </div>
                <div class="attchment-container">
                <?php echo the_content(); ?>
                </div>                          
             </article>
             <!-- end:page content -->
        <?php endif; ?>
        </div>
     <!-- end:sidebar left -->
     <?php endif; ?>
 


 
	 <?php if($sidebar == 'sidebar-right') : ?>    
     <!-- start:sidebar left -->
        <div class="content col-xs-8">
        <?php if ( have_posts() ) : ?>
        	<div class="post-text">
                    <h2 class="generic-title-page">
						<?php the_title(); ?>
                    </h2>                                     
             </div>                 
             <!-- start:page content -->
			 <article>
				<div class="attachment-image">
				<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id()); ?>" alt="image" >
                </div>
                <div class="attchment-container">
                <?php echo the_content(); ?>
                </div>                          
             </article>
             <!-- end:page content -->
        <?php endif; ?>              <!-- end:page content --> 
        </div>    
        <?php get_template_part('sidebar'); ?>
     <!-- end:sidebar left -->
     <?php endif; ?>
     
 	<div class="clearfix"></div>
 </section>
 <!-- end:page section -->
 
 
 <?php get_footer(); ?>