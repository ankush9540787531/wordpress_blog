<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */
 
 ?>
 
 <!-- start:loop 404 page -->			
 	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <!-- Page Title -->
        <div class="post-text">
            <h2><?php esc_html_e( '404 - Page Not found', 'tada' ); ?></h2>
        </div> 
        
        <!-- Page Content -->                
        <div class="post-text text-content">                  
            <div class="text">
                <div class="not-found">
                    <p><?php esc_html_e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'tada' ); ?><br>
                    <?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'tada' ); ?></p>
    
                    <?php get_search_form(); ?>
                </div>
 			</div>
        </div>        
 
 	</article>
 <!-- end:loop 404 page -->