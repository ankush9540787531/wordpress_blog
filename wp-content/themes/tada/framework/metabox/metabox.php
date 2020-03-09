<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */
 
 add_action( 'add_meta_boxes', 'adtheme_tada_add_meta_boxes' );
 function adtheme_tada_add_meta_boxes() {
    add_meta_box( 
        'tada_layout',
        esc_html__( 'Tada Layout', 'tada' ),
        'tada_layout_function',
        'post' 
    );
    add_meta_box( 
        'tada_layout',
        esc_html__( 'Tada Layout', 'tada' ),
        'tada_layout_function',
        'page' 
    );		
 }
 
function tada_layout_function($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>

	<!-- start:metabox container -->
    <div id="tada-metabox">
        
        <!-- Layout Type -->
        <?php 
		$current_screen = get_current_screen();
		if($current_screen ->id !== "post") : ?>
		<div class="tada-metabox-item">
            <label for="tada-layout-type"><?php esc_html_e('Layout Type','tada'); ?></label>
            <select id="tada-layout-type" name="tada-layout-type">
            <?php 
                    $blog_option_values = array(
						 		'tada-page'	 			=> 'Page',
								'tada-blog-1-column' 	=> 'Blog 1 Column',
								'tada-blog-2-columns' 	=> 'Blog 2 Columns',
								'tada-blog-3-columns' 	=> 'Blog 3 Columns'
					);

                    foreach($blog_option_values as $key => $value) 
                    {
                        if($key == get_post_meta($object->ID, "tada-layout-type", true))
                        {
                            ?>
                                <option selected value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php    
                        }
                        else
                        {
                            ?>
                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
        </div>
        
        
        <!-- start:blog query -->    
		<div id="blog-query" 
			<?php if(get_post_meta($object->ID, "tada-layout-type", true) == 'tada-page' || 
					 get_post_meta($object->ID, "tada-layout-type", true) == '' ) : ?> 
            	style="display:none" 
			<?php endif; ?>
		>
        	<h2><?php esc_html_e('Query Blog','tada'); ?></h2>
        
            <!-- Category -->
            <div class="tada-metabox-item">
                <?php     
                $categories = get_categories(array('orderby' => 'name','order' => 'ASC'));?>
                <?php 
                $categories_selected = (get_post_meta($object->ID, "tada-category", true));
                ?>
                <label for="tada-category"><?php esc_html_e('Category','tada'); ?></label>
                <select multiple="multiple" name="tada-category[]">
                <?php foreach ($categories as $category) {  ?>
                    <option  value="<?php echo $category->term_id; ?>"              
                    <?php
                    if($categories_selected != '') : 
                        foreach($categories_selected as $category_selected) : 
                            if($category_selected == $category->term_id) :
                                echo 'selected'; 
                            endif;
                        endforeach;
                    endif;
                    ?>            
                    >		
                <?php echo $category->name; ?></option>
                <?php } ?>
                </select>
            </div>    

          	<div class="tada-metabox-item">
            	<?php $orderby_value = get_post_meta($object->ID, "tada-orderby", true); ?>
            	<label for="tada-orderby"><?php esc_html_e('Order By','tada'); ?></label>
            	<select name="tada-orderby">            
            		<option value="none" <?php if($orderby_value == 'none') : echo 'selected'; endif; ?>><?php esc_html_e('none','tada'); ?></option>
                    <option value="comment_count" <?php if($orderby_value == 'comment_count') : echo 'selected'; endif; ?>><?php esc_html_e('Comment Count','tada'); ?></option>
            		<option value="meta_value_num" <?php if($orderby_value == 'meta_value_num') : echo 'selected'; endif; ?>><?php esc_html_e('Views','tada'); ?></option>
                    <option value="date" <?php if($orderby_value == 'date') : echo 'selected'; endif; ?>><?php esc_html_e('date','tada'); ?></option>
            		<option value="modified" <?php if($orderby_value == 'modified') : echo 'selected'; endif; ?>><?php esc_html_e('modified','tada'); ?></option>
                    <option value="title" <?php if($orderby_value == 'title') : echo 'selected'; endif; ?>><?php esc_html_e('title','tada'); ?></option>
                    <option value="rand" <?php if($orderby_value == 'rand') : echo 'selected'; endif; ?>><?php esc_html_e('rand','tada'); ?></option>
            	</select>
            </div> 

          	<div class="tada-metabox-item">
            	<?php $orderdir_value = get_post_meta($object->ID, "tada-orderdir", true); ?>
            	<label for="tada-orderdir"><?php esc_html_e('Order dir','tada'); ?></label>
            	<select name="tada-orderdir">                     
                	<option value="DESC" <?php if($orderdir_value == 'DESC') : echo 'selected'; endif; ?>>DESC</option>           
            		<option value="ASC" <?php if($orderdir_value == 'ASC') : echo 'selected'; endif; ?>>ASC</option>
            	</select>
            </div> 

          
          	<div class="tada-metabox-item">
            	<?php $pagination_value = get_post_meta($object->ID, "tada-pagination", true); ?>
            	<label for="tada-pagination"><?php esc_html_e('Pagination','tada'); ?></label>
            	<select name="tada-pagination">            
            		<option value="yes" <?php if($pagination_value == 'yes') : echo 'selected'; endif; ?>>Yes</option>
                    <option value="no" <?php if($pagination_value == 'no') : echo 'selected'; endif; ?>>No</option>
            	</select>
            </div>  
            
            
            
		</div>
        <!-- end:blog query -->
        <?php endif; ?>
        
        <!-- sidebar -->
		<div id="tada-sidebar" class="tada-metabox-item"
			<?php if(get_post_meta($object->ID, "tada-layout-type", true) == 'tada-blog-3-columns') : ?> 
            	style="display:none" 
			<?php endif; ?>        
        >
            <label for="tada-sidebar"><?php esc_html_e('Sidebar','tada'); ?></label>
            <select name="tada-sidebar">
                <?php 
							
                    $option_values = array(
									'sidebar-none'  => 'None',
									'sidebar-left'  => 'Left',
									'sidebar-right' => 'Right'
					);

                    foreach($option_values as $key => $value) 
                    {
                        if($key == get_post_meta($object->ID, "tada-sidebar", true))
                        {
                            ?>
                                <option selected value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php    
                        }
                        else
                        {
                            ?>
                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
		</div>

        <!-- slider -->
		<div class="tada-metabox-item">
            <label for="tada-slider"><?php esc_html_e('Slider','tada'); ?>
            <?php esc_html_e('(if yes override option setted on Option Panel)','tada'); ?>
            </label>
            <select id="tada-slider" name="tada-slider">
                <?php 
							
                    $slider_option_values = array(
									'off'  => 'No',
									'on'   => 'Yes (override option panel)'
					);

                    foreach($slider_option_values as $key => $value) 
                    {
                        if($key == get_post_meta($object->ID, "tada-slider", true))
                        {
                            ?>
                                <option selected value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php    
                        }
                        else
                        {
                            ?>
                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
		</div>

		<div id="tada-slider-shortcode" class="tada-metabox-item"
			<?php 
			$slider_value = get_post_meta($object->ID, "tada-slider", true);
			if( $slider_value == 'off' || $slider_value == '' ) : ?> 
            	style="display:none" 
			<?php endif; ?>     
        >
			<label for="tada-slider-shortcode"><?php esc_html_e('Slider shortcode','tada'); ?></label>
            <input name="tada-slider-shortcode" type="text" value='<?php echo get_post_meta($object->ID, "tada-slider-shortcode", true); ?>'>
		</div>
                    
    </div>
    <!-- end:metabox container -->
    <?php  
}

function save_tada_meta_box($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;
	
    $tada_sidebar_value = "";
	$tada_layout_type = "";    
	$tada_category = "";
	$tada_pagination = "";
	$tada_orderby = "";
	$tada_orderdir = "";
	$tada_slider_value = "";
 	$tada_slider_shortcode_value = "";
	
		
    if(isset($_POST["tada-sidebar"]))
    {
        $tada_sidebar_value = $_POST["tada-sidebar"];
    }   
    update_post_meta($post_id, "tada-sidebar", $tada_sidebar_value);


    if(isset($_POST["tada-layout-type"]))
    {
        $tada_layout_type = $_POST["tada-layout-type"];
    }   
    update_post_meta($post_id, "tada-layout-type", $tada_layout_type);


    if(isset($_POST["tada-category"]))
    {
    	$tada_category = $_POST["tada-category"]; 
	} 
    update_post_meta($post_id, "tada-category", $tada_category);


    if(isset($_POST["tada-pagination"]))
    {
    	$tada_pagination = $_POST["tada-pagination"]; 
	} 
    update_post_meta($post_id, "tada-pagination", $tada_pagination);


    if(isset($_POST["tada-orderby"]))
    {
    	$tada_orderby = $_POST["tada-orderby"]; 
	} 
    update_post_meta($post_id, "tada-orderby", $tada_orderby);


    if(isset($_POST["tada-orderdir"]))
    {
    	$tada_orderdir = $_POST["tada-orderdir"]; 
	} 
    update_post_meta($post_id, "tada-orderdir", $tada_orderdir);


    if(isset($_POST["tada-slider"]))
    {
        $tada_slider_value = $_POST["tada-slider"];
    }   
    update_post_meta($post_id, "tada-slider", $tada_slider_value);

	
    if(isset($_POST["tada-slider-shortcode"]))
    {
        $tada_slider_shortcode_value = $_POST["tada-slider-shortcode"];
    }
	update_post_meta($post_id, "tada-slider-shortcode", $tada_slider_shortcode_value);
	
}

add_action("save_post", "save_tada_meta_box", 10, 3);
