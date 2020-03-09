<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */ 
 
add_action( 'widgets_init', 'tada_social_widgets' );
function tada_social_widgets() {
	register_widget('tada_social');
}
class tada_social extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_tada_social follow-us tada-widget tada tada_social', 'description' => 'Your tada_social');
		parent::__construct('widget-tada_social', 'Tada - Social', $widget_ops);
	}
	function widget( $args, $instance ) {
		extract($args);
		
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$facebook = apply_filters( 'widget_tada_social', empty( $instance['facebook'] ) ? '' : $instance['facebook'], $instance );
		$twitter = apply_filters( 'widget_tada_social', empty( $instance['twitter'] ) ? '' : $instance['twitter'], $instance );
		$googleplus = apply_filters( 'widget_tada_social', empty( $instance['googleplus'] ) ? '' : $instance['googleplus'], $instance );
		$vimeo = apply_filters( 'widget_tada_social', empty( $instance['vimeo'] ) ? '' : $instance['vimeo'], $instance );
		$linkedin = apply_filters( 'widget_tada_social', empty( $instance['linkedin'] ) ? '' : $instance['linkedin'], $instance );

		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title . '<span class="tada-title-widget">' . esc_html($title) . '</span>' . $after_title; } ?>
			<div class="follow-container">    
            <?php 
				if($facebook) {					 
					echo '<a href="'.$facebook.'"><i class="icon-facebook5"></i></a>';
				} 
				if($twitter) {					 
					echo '<a href="'.$twitter.'"><i class="icon-twitter4"></i></a>';
				}
				if($googleplus) {					 
					echo '<a href="'.$googleplus.'"><i class="icon-google-plus"></i></a>';
				}
				if($vimeo) {					 
					echo '<a href="'.$vimeo.'"><i class="icon-vimeo4"></i></a>';
				}
				if($linkedin) {					 
					echo '<a href="'.$linkedin.'"><i class="icon-linkedin2"></i></a>';
				}																		
			?>
             <div class="clearfix"></div>
            </div>
		<?php
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] 			= strip_tags($new_instance['title']);
		$instance['facebook'] 		= strip_tags($new_instance['facebook']);
		$instance['twitter'] 		= strip_tags($new_instance['twitter']);
		$instance['googleplus'] 	= strip_tags($new_instance['googleplus']);
		$instance['vimeo']	 		= strip_tags($new_instance['vimeo']);
		$instance['linkedin'] 		= strip_tags($new_instance['linkedin']);
		return $instance;
	}
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 
											'title' 		=> 'Social', 
											'facebook' 		=> '', 
											'twitter' 		=> '' ,
											'googleplus' 	=> '',
											'vimeo' 		=> '',
											'linkedin' 		=> ''
											) 
								);
		$title = strip_tags($instance['title']);
		
		$facebook 		= strip_tags($instance['facebook']);
		$twitter 		= strip_tags($instance['twitter']);
		$googleplus 	= strip_tags($instance['googleplus']);
		$vimeo			= strip_tags($instance['vimeo']);
		$linkedin 		= strip_tags($instance['linkedin']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__('Title:','tada'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
                
        <p><label for="<?php echo $this->get_field_id('facebook'); ?>" style="width:78px; display:inline-block;"><?php echo esc_html__('Facebook Url:','tada'); ?></label>
		<input id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo $facebook; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('twitter'); ?>" style="width:78px; display:inline-block;"><?php echo esc_html__('Twitter Url:','tada'); ?></label>
		<input id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo $twitter; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('googleplus'); ?>" style="width:78px; display:inline-block;"><?php echo esc_html__('Google Plus Url:','tada'); ?></label>
		<input id="<?php echo $this->get_field_id('googleplus'); ?>" name="<?php echo $this->get_field_name('googleplus'); ?>" type="text" value="<?php echo $googleplus; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('vimeo'); ?>" style="width:78px; display:inline-block;"><?php echo esc_html__('Vimeo Url:','tada'); ?></label>
		<input id="<?php echo $this->get_field_id('vimeo'); ?>" name="<?php echo $this->get_field_name('vimeo'); ?>" type="text" value="<?php echo $vimeo; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('linkedin'); ?>" style="width:78px; display:inline-block;"><?php echo esc_html__('Linkedin Url:','tada'); ?></label>
		<input id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo $linkedin; ?>" /></p>
		
<?php
	}
}
?>