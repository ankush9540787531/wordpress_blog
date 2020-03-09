<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */
 
 global $post;
 global $tada_theme; 

 # Pagination value
 if ( get_query_var('paged') ) {	
		$paged = get_query_var('paged');	
 } elseif ( get_query_var('page') ) {	
		$paged = get_query_var('page');	
 } else {	
		$paged = 1;	
 }
 
 $s = get_search_query();
 
 ?>
 <div class="general-posts-content">
 <?php 
 $count = 1;
 # start:query
 if (!empty($s) && have_posts()) :
 while ( have_posts() ) : the_post(); ?>

 <?php 
 if($count % 2 != 0) :
 	$clear_class = 'clearfix';
 else :
 	$clear_class = '';
 endif; ?>

 <?php 
	if ( is_sticky() ) : 
		$sticky_class = 'class="tada-post-sticky"'; 
	else : 
		$sticky_class = ''; 
	endif; 
 ?>  
 
 <div class="content col-xs-6 <?php echo esc_html($clear_class); ?>">
 
     <article <?php echo esc_html($sticky_class); ?>>
        <div class="post-image <?php if(!has_post_thumbnail()) : echo 'post-without-thumb'; endif; ?>">
            <?php echo tada_thumbs(); ?>
            <div class="category"><?php echo tada_category(); ?></div> 
        </div>
        <div class="post-text">        	
            <span class="date"><?php echo tada_post_data('j M Y'); ?></span>
            <h2><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p class="text"><?php echo tada_post_content(300); ?></p>
        </div>
        <div class="post-info">
            <div class="post-by"><?php echo tada_post_by(); ?></div>
            <div class="clearfix"></div>
        </div>   
     </article>

 </div>
 
 <?php 
 
 $count++;
 endwhile;
 
 ?> 
 
 <div class="clearfix"></div>
 
 <?php

 
 # start:pagination
 if($tada_theme['pagination'] == 'standard') :
	echo tada_paging_nav();
 else :
	echo tada_numeric_posts_nav();
 endif;
 # end:pagination
 
 else: ?>
 
      <article> 
       		<div class="post-text">
				<?php esc_html_e('No relevant search results found Try a different search keyword.', 'tada'); ?>
       		</div>
      </article>	
	
 <?php	 
 endif; 
 
 wp_reset_query();
 ?>
 </div>