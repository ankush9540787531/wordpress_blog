<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */
 
 global $post;
 global $tada_theme;
 
 $category 		= get_post_meta($post->ID, "tada-category", true);
 $orderby 		= get_post_meta($post->ID, "tada-orderby", true);
 $orderdir 		= get_post_meta($post->ID, "tada-orderdir", true);
 $pagination 	= get_post_meta($post->ID, "tada-pagination", true);
 $sidebar 		= get_post_meta( get_the_id(), 'tada-sidebar', true );
 
 if($category 	== '') 		: $category 	= ''; 		endif;
 if($orderby 	== 'none') 	: $orderby 		= 'none'; 	endif;
 if($orderdir 	== 'DESC') 	: $orderdir 	= 'DESC'; 	endif;
 if($pagination == 'DESC') 	: $pagination 	= 'yes'; 	endif;
 
 $sticky_post_type = $tada_theme['stickypost'];

 # Pagination value
 if ( get_query_var('paged') ) {	
		$paged = get_query_var('paged');	
 } elseif ( get_query_var('page') ) {	
		$paged = get_query_var('page');	
 } else {	
		$paged = 1;	
 }
 
 # STICKY ONTOP
 if($sticky_post_type == 'ontop') :
 
	 # Load Sticky Posts
	 get_template_part('elements/sticky-2');

 	 # WP Query
	 if($orderby == 'meta_value_num') :

		 query_posts(
					array(
						'post_type' => 'post', 
						'cat' 		=> $category,
						'orderby'	=> $orderby,
						'order'		=> $orderdir,
						'meta_key' 	=> 'wpb_post_tada_views_count', 
						'paged' 	=> $paged,
						'ignore_sticky_posts' => 1,
						'post__not_in'  => get_option( 'sticky_posts' ),						
					)
		 ); 
	 
	 else :

		 query_posts(
					array(
						'post_type' => 'post', 
						'cat' 		=> $category,
						'orderby'	=> $orderby,
						'order'		=> $orderdir,				 
						'paged' 	=> $paged,
						'ignore_sticky_posts' => 1,
						'post__not_in'  => get_option( 'sticky_posts' )						
					)
		 ); 
	 
	 endif;
 
 
 else :
 
	 # WP Query
	 if($orderby == 'meta_value_num') :

		 query_posts(
					array(
						'post_type' => 'post', 
						'cat' 		=> $category,
						'orderby'	=> $orderby,
						'order'		=> $orderdir,
						'meta_key' 	=> 'wpb_post_tada_views_count', 
						'paged' 	=> $paged  
					)
		 ); 
	 
	 else :

		 query_posts(
					array(
						'post_type' => 'post', 
						'cat' 		=> $category,
						'orderby'	=> $orderby,
						'order'		=> $orderdir,				 
						'paged' 	=> $paged  
					)
		 ); 
	 
	 endif;

	 
 endif;

 ?>

 <?php 
 $count = 1;
 # start:query
 if ( have_posts() ) :
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
            <?php if($sidebar == 'sidebar-none') : ?>
            	<p class="text"><?php echo tada_post_content(300); ?></p>
        	<?php endif; ?>
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
 # start:pagination active
 if($pagination == 'yes') :
 
	 # start:pagination
	 if(is_home() || is_front_page()) :
	 
		tada_paging_home_blog_page();
	 
	 else :
	 
		 if($tada_theme['pagination'] == 'standard') :
			echo tada_paging_nav();
		 else :
			echo tada_numeric_posts_nav();
		 endif;
	 
	 endif;
	 # end:pagination
	 	 
 endif; 
 # end:pagination active
 
 
 endif; 
 # end:query
 
 wp_reset_query();
 ?>