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
 
 
 <?php if($tada_theme['preloader'] == '1') : ?>
 
 	<?php if($tada_theme['preloader-type'] == 'circle') : ?>
 
         <div id="preloader-container">
                <div id="preloader-wrap">
                        <div id="preloader"></div>
                </div>
         </div>
 
 	<?php endif; ?>

 	<?php if($tada_theme['preloader-type'] == 'spinner-pulse') : ?>
 		
        <div id="preloader-container">
			 	<div class="spinner-pulse"></div>
 		</div>
        
 	<?php endif; ?>
 
 	<?php if($tada_theme['preloader-type'] == 'spinner-plane') : ?>
 		
        <div id="preloader-container">
			 	<div class="spinner-plane"></div>
 		</div>
        
 	<?php endif; ?> 

 	<?php if($tada_theme['preloader-type'] == 'spinner-bounce') : ?>
 		
        <div id="preloader-container">
						<div class="spinner-three-bounce">
				  			<div class="bounce1"></div>
				  			<div class="bounce2"></div>
				  			<div class="bounce3"></div>
    		 			</div>
 		</div>
        
 	<?php endif; ?>
    
 	<?php if($tada_theme['preloader-type'] == 'spinner-dots') : ?>
 		
        <div id="preloader-container">
						<div class="spinner-dots">
				  			<div class="dot1"></div>
				  			<div class="dot2"></div>
    		 			</div>
 		</div>
        
 	<?php endif; ?>    
    

 <?php endif; ?>
                            
                            
                            