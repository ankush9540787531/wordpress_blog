<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */
 global $tada_theme;
 ?>
 
 <!-- start:loop post -->			
 <?php while ( have_posts() ) : the_post(); ?>
 	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    	
         
		<?php if(has_post_thumbnail()) : ?> 
        	<!-- Page Features Image -->
         	<div class="post-image">
                	<?php echo tada_thumbs(); ?>                     
         	</div>
 		<?php else: ?>
			<div class="post-without-image-space"></div>
		<?php endif; ?>
          
        <div class="category"><?php echo tada_category(); ?></div>       
        
        
        <!-- Page Title -->
        <div class="post-text">
        	<span class="date"><?php echo tada_post_data('j M Y'); ?></span>
            <h2><?php the_title(); ?></h2>
        </div> 
        
        <!-- Page Content -->                
        <div class="post-text text-content">
        	<div class="post-by"><?php echo tada_post_by(); ?></div>                  
            <div class="text">            	
            	<?php the_content(); 

						$tags_list = get_the_tag_list( '', esc_html__( ', ', 'tada' ) );
						if ( $tags_list ) {
							printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
								esc_html__( 'Tags:', 'tada'),
								$tags_list
							);
						}

                
						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'tada' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) );                
                
                ?>
 			</div>
            <div class="clearfix"></div>
        </div>        
 		<div class="social-post"><?php echo tada_post_social(); ?><div class="clearfix"></div></div>
 	
    	<?php 
		if($tada_theme['single-pagination-post'] == true) :
			echo tada_post_nav(); 
		endif;
		?>

    	<?php 
		if($tada_theme['single-author-bio'] == true) :
			get_template_part('elements/author-bio');
		endif;
		?>
        
        <?php 
		if($tada_theme['single-related-posts'] == true) :
			get_template_part('elements/related-posts'); 
		endif;
		?>

        
        <?php comments_template(); ?>      

    
    </article>
 <?php endwhile; ?>
 <!-- end:loop post -->