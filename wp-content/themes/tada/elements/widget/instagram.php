<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */
 
add_action( 'widgets_init', 'tada_instagram_widgets' );
function tada_instagram_widgets() {
	register_widget('tada_instagram');
}
class tada_instagram extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_tada_instagram tada-widget tada_instagram widget-gallery', 'description' => 'Your tada_instagram');
		parent::__construct('widget-tada_instagram', 'Tada - Instagram', $widget_ops);
	}
	function widget( $args, $instance ) {
		extract($args);
		
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$account = apply_filters( 'widget_tada_instagram', empty( $instance['account'] ) ? '' : $instance['account'], $instance );
		$num_image = apply_filters( 'widget_tada_instagram', empty( $instance['num_image'] ) ? '' : $instance['num_image'], $instance );
		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title . '<span class="tada-title-widget">' . esc_html($title) . '</span>' . $after_title; } ?>
			<style>
				.sibebar .instagram-image a img {
					width:<?php 
					$width_image = 100/$num_image;
					echo $width_image; ?>%;
				}
			</style>
            <div class="instagram-image <?php echo 'instagram-image-loaded-'.$num_image.''; ?>">    
            <?php 
			$results_array = get_image_instagram($account);
			for($i=0;$i<=$num_image-1;$i++) :
			$latest_array = $results_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'][$i];
			echo '<a href="http://instagram.com/p/'.$latest_array['code'].'"><img src="'.$latest_array['display_src'].'" alt="'.htmlspecialchars($latest_array['caption']).'"></a>';			
			endfor;
			?>
             <div class="clearfix"></div>
            </div>
		<?php
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] 			= strip_tags($new_instance['title']);
		$instance['account'] 		= strip_tags($new_instance['account']);
		$instance['num_image'] 		= strip_tags($new_instance['num_image']);

		return $instance;
	}
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 
											'title' 		=> 'instagram', 
											'account' 		=> '', 
											'num_image' 		=> '' ,
											) 
								);
		$title = strip_tags($instance['title']);
		
		$account 		= strip_tags($instance['account']);
		$num_image 		= strip_tags($instance['num_image']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__('Title:','tada'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
                
        <p><label for="<?php echo $this->get_field_id('account'); ?>" style="width:78px; display:inline-block;"><?php echo esc_html__('Instagram Account:','tada'); ?></label>
		<input id="<?php echo $this->get_field_id('account'); ?>" name="<?php echo $this->get_field_name('account'); ?>" type="text" value="<?php echo $account; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('num_image'); ?>" style="width:78px; display:inline-block;"><?php echo esc_html__('Number images to Load:','tada'); ?></label>
		<input id="<?php echo $this->get_field_id('num_image'); ?>" name="<?php echo $this->get_field_name('num_image'); ?>" type="text" value="<?php echo $num_image; ?>" /></p>
		
<?php
	}
}
 
 

?>