<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */
 
 global $tada_theme;

 
 ?>
 
 <!-- start:wp_footer -->
 <footer class="tada-container">
 
	 <?php 
	 	# Start Footer Gallery
	 	if($tada_theme['footer-gallery-type'] == 'gallery') : 
	 
			$title = esc_html($tada_theme['footer-gallery-title']);
	 		
			$gallery_images = explode(',',$tada_theme['footer-gallery']);
			if(!isset($title)) : $title = esc_html__('Gallery','tada'); endif;

	 ?>
         <!-- start:footer gallery widget -->
         <div class="widget widget-gallery">
         <?php
			if ( !empty( $title ) ) { echo '<h3 class="widget-title"><span class="tada-title-widget">' . $title . '</span></h3>'; } ?>
            <div class="footer-gallery-image-<?php echo count($gallery_images); ?>">    
            <?php 
				foreach($gallery_images as $image => $image_id) :
					$single_image = wp_get_attachment_image_src( $image_id, 'tada-gallery-footer' );
			?>
				<img src="<?php echo esc_url($single_image[0]); ?>" alt="">
            <?php 
				endforeach;
			?>
             <div class="clearfix"></div>
            </div>			
         </div>
         <!-- end:footer gallery widget -->
     <?php endif; # End Footer Instagram ?> 
 
 
 
 
 
	 <?php 
	 	# Start Footer Instagram
	 	if($tada_theme['footer-gallery-type'] == 'instagram') : 
	 
			$title = esc_html($tada_theme['footer-instagram-title']);
			$account = esc_html($tada_theme['footer-instagram-account']);
			$num_image = esc_html($tada_theme['footer-instagram-number']);
	 
			if(!isset($title)) : $title = esc_html__('Gallery','tada'); endif;
			if(!isset($account)) : $account = ''; endif;
			if(!isset($num_image)) : $num_image = 6; endif; 
	 ?>
         <!-- start:footer instagram widget -->
         <div class="widget widget-gallery">
         <?php
			if ( !empty( $title ) ) { echo '<h3 class="widget-title"><span class="tada-title-widget">' . $title . '</span></h3>'; } ?>
            <div class="instagram-image instagram-image-<?php echo esc_html($num_image); ?>">    
            <?php 
			$results_array = get_image_instagram($account);
			if(!empty($results_array['entry_data']['ProfilePage'])) :
				for($i=0;$i<=$num_image-1;$i++) :
				$latest_array = $results_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'][$i];
				echo '<a href="http://instagram.com/p/'.$latest_array['code'].'"><img src="'.$latest_array['display_src'].'" alt="'.htmlspecialchars($latest_array['caption']).'"></a>';			
				endfor;
			endif;
			?>
             <div class="clearfix"></div>
            </div>			
         </div>
         <!-- end:footer instagram widget -->
     <?php endif; # End Footer Instagram ?>


	<?php if($tada_theme['footer-text-active'] == true || 
			 $tada_theme['back-to-top'] == true) : ?>
             
 			<div class="footer-bottom">
				<?php if($tada_theme['footer-text-active'] == true) : ?>
                    <!-- start:footer text -->
                    <span class="copyright"><?php echo esc_html($tada_theme['footer-text']); ?></span>
                    <!-- end:footer text -->
                <?php endif; ?>
        
                <?php if($tada_theme['back-to-top'] == true) : ?>
                    <!-- start:footer text -->
                    <span class="backtotop"><?php esc_html_e('TOP','tada'); ?> <i class="icon-arrow-up7"></i></span>
                    <!-- end:footer text -->
                <?php endif; ?>
                <div class="clearfix"></div>
            </div>
                
    <?php endif; ?>
    
 </footer>	
 <!-- end:wp_footer -->
 <?php
	## Add Action Custom Code			
	if(!empty($tada_theme['css-custom-code'])) :
		tada_css_custom_code($tada_theme);	
		add_action( 'wp_enqueue_scripts', 'tada_css_custom_code' );
	endif;

	if(!empty($tada_theme['js-custom-code'])) :
		tada_js_custom_code($tada_theme);
		add_action( 'wp_enqueue_scripts', 'tada_js_custom_code' );
	endif;		
 ?> 
 <?php wp_footer(); ?> 
 </body>
 </html>