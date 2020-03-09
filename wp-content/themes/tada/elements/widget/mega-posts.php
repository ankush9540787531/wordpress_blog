<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */ 
 
 add_action( 'widgets_init', 'tada_mega_posts_widgets' );
function tada_mega_posts_widgets() {
	register_widget('tada_Widget_Mega_Posts');
}
 
class tada_Widget_Mega_Posts extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'tada-widget wpmegapack tada_mega_posts', 'description' => 'Display your posts as you want!' );
		parent::__construct('mega-posts', 'Tada - Mega Posts', $widget_ops);
		$this->alt_option_name = 'widget_mega_entries';
	}
	function widget($args, $instance) {		
		static $instance_widget = 0;
		$instance_widget++;		

		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? 'Mega Posts' : $instance['title'], $instance, $this->id_base);
		if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) ) {
 			$number = 5;
		}

		if ( !empty( $instance['orderby'] ) ) {
 			$orderby = $instance['orderby'];
			
		}else{
			
			$orderby = 'none';
			
		}
		
		if ( !empty( $instance['orderdir'] ) ) {
 			$orderdir = $instance['orderdir'];
			
		}else{
			
			$orderdir = 'DESC';
			
		}
		
		if ( !empty( $instance['cat_filter'] ) ) {
 			$cat_filter = $instance['cat_filter'];
			
		}else{
			
			$cat_filter = '0';
			
		}
		
		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true, 'category__in' => $cat_filter, 'meta_key' => 'wpb_post_views_count', 'orderby' => $orderby, 'order' => $orderdir ) ) );
		if ($r->have_posts()) :
?>
		<?php echo $before_widget; ?>
		<?php if ( $title ) echo $before_title . '<span class="tada-title-widget">' . esc_html($title) . '</span>' . $after_title; ?>
		<div class="mega-posts latest-posts tada-mega-post-widget-<?php echo $instance_widget; ?>">
        	<div class="posts-container">
			<?php $count = 0; while ($r->have_posts()) : $r->the_post(); ?>
            <div class="item">
            	<?php
				if(has_post_thumbnail()){ 
					$id_post = get_the_id();					
					$single_image = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), 'tada-widget-thumb' );	 					 
					echo '<img src="'.$single_image[0].'" alt="'.get_the_title().'" class="post-image">';	
				}
				?>
                <div class="info-post">
               			 	<h5><a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>">		
                                        <?php if ( get_the_title() ) the_title(); else the_ID(); ?>
                                </a></h5>
                        	<span class="date"><?php echo get_the_date(); ?></span>	                          
                </div>
                <div class="clearfix"></div>
            </div>        
			<?php $count++; endwhile; ?>
            <div class="clearfix"></div>
			</div>
        </div>
		<?php echo $after_widget; ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();
		endif;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		
		$instance['cat_filter'] = $new_instance['cat_filter'];
		
		$instance['orderby'] = $new_instance['orderby'];
		
		$instance['orderdir'] = $new_instance['orderdir'];
		return $instance;
	}
	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$number = isset($instance['number']) ? absint($instance['number']) : 5;
		
		$cat_filter = isset($instance['cat_filter']) ? $instance['cat_filter'] : '0';
		
		$orderby = isset($instance['orderby']) ? $instance['orderby'] : 'none';
		
		$orderdir = isset($instance['orderdir']) ? $instance['orderdir'] : 'DESC';
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__('Title:','tada'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php echo esc_html__('Number of posts to show:','tada'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
        
       
        <p><label for="<?php echo $this->get_field_id('cat_filter'); ?>"><?php echo esc_html__('Filter posts by category:','tada'); ?></label>
       
        <?php $categories = get_categories(array('orderby' => 'name','order' => 'ASC')); ?>
        
		       
        
        <select multiple="multiple" id="<?php echo $this->get_field_id( 'cat_filter' ); ?>" name="<?php echo $this->get_field_name( 'cat_filter' ).'[]'; ?>" class="widefat">
        <?php foreach ($categories as $category) {  ?>
        <?php echo $cat_filter;?>
        <option <?php if ( $cat_filter && in_array($category->term_id, $cat_filter) ){echo 'selected="selected"';} ?> value="<?php echo $category->term_id; ?>"><?php echo $category->name; ?></option>
		<?php } ?>
		</select>
      
        
        </p>
        
        <p><label for="<?php echo $this->get_field_id('orderby'); ?>"><?php echo esc_html__('Order posts by:','tada'); ?></label>
		<select id="<?php echo $this->get_field_id( 'orderby' ); ?>" name="<?php echo $this->get_field_name( 'orderby' ); ?>" class="widefat">
            <option <?php if ($orderby == 'none' ){echo 'selected="selected"';} ?> value="none">No order</option>
            <option <?php if ($orderby == 'comment_count' ){echo 'selected="selected"';} ?> value="comment_count">Comment Count</option>
            <option <?php if ($orderby == 'meta_value_num' ){echo 'selected="selected"';} ?> value="meta_value_num">Post Views</option>
            <option <?php if ($orderby == 'date' ){echo 'selected="selected"';} ?> value="date">Creation Date</option>
            <option <?php if ($orderby == 'modified' ){echo 'selected="selected"';} ?> value="modified">Edit Date</option>
            <option <?php if ($orderby == 'title' ){echo 'selected="selected"';} ?> value="title">Title</option>
            <option <?php if ($orderby == 'rand' ){echo 'selected="selected"';} ?> value="rand">Random</option>
        </select>
        </p>
        
        <p><label for="<?php echo $this->get_field_id('orderdir'); ?>"><?php echo esc_html__('Order direction:','tada'); ?></label>
		<select id="<?php echo $this->get_field_id( 'orderdir' ); ?>" name="<?php echo $this->get_field_name( 'orderdir' ); ?>" class="widefat">
            <option <?php if ($orderdir == 'ASC' ){echo 'selected="selected"';} ?> value="ASC">Ascending order </option>
            <option <?php if ($orderdir == 'DESC' ){echo 'selected="selected"';} ?> value="DESC">Descending order</option>
        </select>
        </p>
<?php
	}
}
?>