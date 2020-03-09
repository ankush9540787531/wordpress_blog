<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */
 global $tada_theme;
 $slider_shortcode = $tada_theme['header-slider-shortcode'];
 $slider_metabox = get_post_meta( get_the_id(), 'tada-slider', true );
 $slider_metabox_shortcode = get_post_meta( get_the_id(), 'tada-slider-shortcode', true );
 if($slider_metabox == '') : $slider_metabox = 'off'; endif;
 ?>
 
 
 <?php 
 
 #Slider Metabox Active override Redux Options
 if($slider_metabox == 'on') :	?> 
 
 <div class="tada-slider">
 
 	<?php echo do_shortcode($slider_metabox_shortcode); ?>
 
 </div>
 
 <?php else : 
 
 #Slider Active via Redux Options
 if($tada_theme['header-slider'] == true && $slider_shortcode != '') : ?>	
 
     
     
        <?php 
		#Slider Only Home Page
		if($tada_theme['header-slider-position'] == 'homepage') :
        
                    if(is_home() || is_front_page()) :
                
						?>
                        
                        <div class="tada-slider">
				
                     		<?php echo do_shortcode($slider_shortcode); ?>
                
                    	</div>
                    
                    <?php endif;
            
        endif; ?>
        
        
        <?php 
		#Slider All Pages
		if($tada_theme['header-slider-position'] == 'allpages') :
        
						?>
                        
                        <div class="tada-slider">
                                        
                        	<?php echo do_shortcode($slider_shortcode); ?>
                
                    	</div>
                    
                    <?php
                         
        endif; ?>    		
               
     
 
 <?php endif; #end $tada_theme['header-slider']
 
 
 
 endif; #end slider_metabox ?>
