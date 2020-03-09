<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */
 global $tada_theme;
 
 # Load Metabox Value
 $sidebar = get_post_meta( get_the_id(), 'tada-sidebar', true );
 if(!isset($sidebar) || $sidebar == '') : $sidebar = 'sidebar-none'; endif; 
 
 
?>

<?php
  $orig_post = $post;
  global $post;
  $tags = wp_get_post_tags($post->ID);
   
  if ($tags) :
  
  ?>
  
  <div class="related-posts">
  	<h2><?php esc_html_e('Related Article','tada'); ?></h2>
  	<div class="related-item-container">
  <?php
  
  	$tag_ids = array();
  	foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
	
	if($sidebar == 'sidebar-none') :
		$num_post_related = 3;
	else :
		$num_post_related = 2;
	endif;
	
	$args=array(
		  'tag__in' => $tag_ids,
		  'post__not_in' => array($post->ID),
		  'posts_per_page'=> $num_post_related
	);
   
  	$related_query = new wp_query( $args );
 
  	while( $related_query->have_posts() ) :
  	$related_query->the_post();
	
?>
  
       <div class="related-item">
             <div class="related-image <?php if(!has_post_thumbnail()) : echo 'related-post-without-thumb'; endif; ?>">
             	<?php echo tada_related_thumbs(); ?>
                <span class="related-category"><?php echo tada_category(); ?></span>
             </div>
             <div class="related-text">
                     <span class="related-date"><?php echo tada_post_data('j M Y'); ?></span>
                     <span class="related-title"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></span>
             </div>
             <div class="related-author">
                     <?php echo tada_post_by(); ?>
             </div>
        </div>
           
   
<?php endwhile; ?>
	<div class="clearfix"></div>
	</div>
  </div>  
<?php
  endif;
  $post = $orig_post;
  wp_reset_postdata();
?>