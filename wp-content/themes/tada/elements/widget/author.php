<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */ 

// add admin scripts
add_action('admin_enqueue_scripts', 'tada_widget_image_upload');
function tada_widget_image_upload() {
    wp_register_script('tada_widget_image_upload_js', get_template_directory_uri() . '/elements/widget/widget_image_upload.js', false, '1.0', true);
}

 
add_action( 'widgets_init', 'tada_author_widgets' );
function tada_author_widgets() {
	register_widget('tada_Widget_author');
}
class tada_Widget_author extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_author widget about-me', 'description' => 'Your author ');
		parent::__construct('widget-author', 'Tada - Author', $widget_ops);
	}
	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$image_uri = apply_filters( 'widget_author', empty( $instance['image_uri'] ) ? '' : $instance['image_uri'], $instance );
		$htmlText = apply_filters( 'widget_author', empty( $instance['htmlText'] ) ? '' : $instance['htmlText'], $instance );
		$image_signing = apply_filters( 'widget_author', empty( $instance['image_signing'] ) ? '' : $instance['image_signing'], $instance );
		
		echo $before_widget;
		
		?>
        <?php if($image_uri) { 
			echo '<div class="ab-image">
					<img src="'.$image_uri.'" title="'.esc_html__('Author Image','tada').'" alt="'.$title.'">';
				if($title != '') {	
					echo '<div class="ab-title">'.$title.'</div>';
				}			
			echo '</div>'; 
		} ?>
        <?php if($htmlText) { 
			echo '<div class="ad-text">
					<p>'.$htmlText.'</p>';
			if($image_signing != '') {
				echo '<span class="signing"><img src="'.$image_signing.'" title="'.esc_html__('Signing Image','tada').'" alt="'.esc_html__('Signing','tada').'"></span>';	
			}
		
			echo '</div>'; 
		} ?>
             <div class="clearfix"></div>
             
		<?php
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['htmlText'] = $new_instance['htmlText'];	
		$instance['image_uri'] = strip_tags( $new_instance['image_uri'] );
		$instance['image_signing'] = strip_tags( $new_instance['image_signing'] );
		return $instance;
	}
	function form( $instance ) {
		wp_enqueue_media();
		wp_enqueue_script('thickbox');
    	wp_enqueue_style('thickbox');
		wp_enqueue_script('tada_widget_image_upload_js');
		$instance = wp_parse_args( (array) $instance, array( 'title' => 'About Author', 'htmlText' => '', 'image_uri' => '', 'image_signing' => '' ) );
		$title = strip_tags($instance['title']);
		$htmlText = $instance['htmlText'];	
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo 'Title:'; ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
		
        <p>
        <div class="tada-widget-image-upload">
        <label for="<?php echo $this->get_field_id('image_uri'); ?>">Image</label><br />
        <?php
            if ( $instance['image_uri'] != '' ) :
                echo '<img class="custom_media_image" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
            endif;
        ?> 
        <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $instance['image_uri']; ?>" style="margin-top:5px;">

        <input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo $this->get_field_name('image_uri'); ?>" value="Upload Image" style="margin-top:5px;" onClick="add_slide(this)"/>
    	</div>
        </p>              
				
        <p><label for="<?php echo $this->get_field_id('htmlText'); ?>" style="width:78px; display:inline-block;"><?php echo 'Html Text:'; ?></label>
        <br>
        <textarea cols="31" id="<?php echo $this->get_field_id('htmlText'); ?>" name="<?php echo $this->get_field_name('htmlText'); ?>" type="text"><?php echo $htmlText; ?></textarea>
        <em><small>HTML allowed</small></em></p>


        <p>
        <div class="tada-widget-image-upload">
            <label for="<?php echo $this->get_field_id('image_signing'); ?>">Signing Image</label><br />
            <?php
                if ( $instance['image_signing'] != '' ) :
                    echo '<img class="custom_media_image" src="' . $instance['image_signing'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
                endif;
            ?> 
            <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_signing'); ?>" id="<?php echo $this->get_field_id('image_signing'); ?>" value="<?php echo $instance['image_signing']; ?>" style="margin-top:5px;">
    
            <input type="button" class="button button-primary custom_media_button" id="custom_media_button_signing" name="<?php echo $this->get_field_name('image_signing'); ?>" value="Upload Image" style="margin-top:5px;" onClick="add_slide(this)"/>
    	</div>
        </p>   



	        
<?php
	}
}
?>