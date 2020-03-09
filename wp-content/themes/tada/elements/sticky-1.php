<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */
 
	global $post;
 
	$args = array(
		'post__in'  => get_option( 'sticky_posts' ),
		'ignore_sticky_posts' => 1
	);
 
	$the_query = new WP_Query($args);
 
	if ( $the_query->have_posts() ) :
		
		# Loop while
		while ( $the_query->have_posts() ) : $the_query->the_post();
    
	?>
 
		  <article class="tada-post-sticky">
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
				<div class="extra-info"><?php echo tada_post_extra_info(); ?></div>
				<div class="clearfix"></div>
			</div>   
		 </article>
 
 
 <?php
		# End Loop while
		endwhile;
	
		wp_reset_postdata();
		
	endif;
 ?>