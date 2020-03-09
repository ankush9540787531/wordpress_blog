<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */
 
 ?>
 
 <!-- start:loop page -->			
 <?php while ( have_posts() ) : the_post(); ?>
 	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    	
        <!-- Page Features Image --> 
		<?php if(has_post_thumbnail()) : ?> 
         	<div class="post-image">
                	<?php echo tada_thumbs(); ?> 
         	</div>
 		<?php endif; ?>
        
        <!-- Page Title -->
        <div class="post-text">
            <h2><?php the_title(); ?></h2>
        </div> 
        
        <!-- Page Content -->                
        <div class="post-text text-content">                  
            <div class="text">
            	<?php the_content(); ?>                
 			</div>
            <div class="clearfix"></div>
        </div>     
           
 		<?php comments_template(); ?>
 	
    </article>
 <?php endwhile; ?>
 <!-- end:loop page -->
 
 