<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */ 
 
add_action( 'widgets_init', 'advertising_widgets' );
function advertising_widgets() {
	register_widget('wpmp_advertising');
}
class wpmp_advertising extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_advertising wpmp-widget tada wpmp_advertising', 'description' => 'Your advertising');
		parent::__construct('widget-advertising', 'Tada - Advertising', $widget_ops);
	}
	function widget( $args, $instance ) {
		extract($args);		
		
		$class_title = '';					
		$title = $instance['title'];
		
		$htmlText = apply_filters( 'widget_advertising', empty( $instance['htmlText'] ) ? '' : $instance['htmlText'], $instance );
		$buttonUrl = apply_filters( 'widget_advertising', empty( $instance['buttonUrl'] ) ? '' : $instance['buttonUrl'], $instance );

		echo $before_widget;
		if ( !empty( $title ) ) { $class_title = 'advertising-title'; echo $before_title . '<span class="wpmp-title-widget">' . esc_html($title) . '</span>' . $after_title; } ?>
			<div class="advertising-container <?php echo esc_html($class_title); ?>">
            
            <?php 
				if($buttonUrl) {
					 
					echo '<a href="'.$buttonUrl.'" class="button-readmore"><div class="container_advertising">'.$htmlText.'</div></a>'; } else {
				 
				 	echo '<div class="container_advertising">'.$htmlText.'</div>';
				
				} 
			?>
             <div class="clearfix"></div>
            </div>
		<?php
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		
		$instance['htmlText'] = $new_instance['htmlText'];
		$instance['buttonUrl'] = strip_tags($new_instance['buttonUrl']);
		return $instance;
	}
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 
											'title' => 'advertising', 
											'htmlText' => '', 
											'buttonUrl' => '#' 
											) 
								);
		$title = strip_tags($instance['title']);
		
		$htmlText = $instance['htmlText'];
		$buttonUrl = strip_tags($instance['buttonUrl']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__('Title:','tada'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
        
		<p><label for="<?php echo $this->get_field_id('htmlText'); ?>" style="width:78px; display:inline-block;"><?php echo esc_html__('Html Text:','tada'); ?></label>
       
        <textarea cols="31" id="<?php echo $this->get_field_id('htmlText'); ?>" name="<?php echo $this->get_field_name('htmlText'); ?>" type="text"><?php echo $htmlText; ?></textarea>
        </p>
        
        <p><label for="<?php echo $this->get_field_id('buttonUrl'); ?>" style="width:78px; display:inline-block;"><?php echo esc_html__('Button Url:','tada'); ?></label>
		<input id="<?php echo $this->get_field_id('buttonUrl'); ?>" name="<?php echo $this->get_field_name('buttonUrl'); ?>" type="text" value="<?php echo $buttonUrl; ?>" /></p>
		
<?php
	}
}
?>