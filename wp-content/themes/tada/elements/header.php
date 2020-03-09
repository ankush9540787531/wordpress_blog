<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */
 global $tada_theme;
 if(!isset($tada_theme['logo']['url'])) : $tada_theme['logo']['url'] = ''; endif;
 ?>
 
 <header class="tada-container">
 
 	    <!-- start:logo container --> 
    	<div class="logo-container">
        
        	<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            
            	<?php if($tada_theme['logo']['url'] == '') : ?>
                
                	<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="<?php esc_html_e('Logo','tada'); ?>">                	
                
                <?php else : ?>
            	
                	<img src="<?php echo esc_url($tada_theme['logo']['url']); ?>" alt="<?php esc_html_e('Logo','tada'); ?>">
				
				<?php endif; ?>
            
            </a>            
            
            <!-- start:social -->
            <?php if($tada_theme['social'] == '1') : ?>
            
            <div class="tada-social">
            
            	<!-- Facebook -->
            	<?php if($tada_theme['facebook'] != '') : ?>
                	<a href="<?php echo esc_url($tada_theme['facebook']); ?>"><i class="icon-facebook5"></i></a>
                <?php endif; ?>

				<!-- Twitter -->
            	<?php if($tada_theme['twitter'] != '') : ?>
                	<a href="<?php echo esc_url($tada_theme['twitter']); ?>"><i class="icon-twitter4"></i></a>
                <?php endif; ?>
                
                <!-- Google Plus -->
            	<?php if($tada_theme['googleplus'] != '') : ?>
                	<a href="<?php echo esc_url($tada_theme['googleplus']); ?>"><i class="icon-google-plus"></i></a>
                <?php endif; ?>
                
                <!-- Vimeo -->
            	<?php if($tada_theme['vimeo'] != '') : ?>
                	<a href="<?php echo esc_url($tada_theme['vimeo']); ?>"><i class="icon-vimeo4"></i></a>
                <?php endif; ?>

                <!-- Linkedin -->
            	<?php if($tada_theme['linkedin'] != '') : ?>
                	<a href="<?php echo esc_url($tada_theme['linkedin']); ?>"><i class="icon-linkedin2"></i></a>
                <?php endif; ?>

            </div>
                       
            <?php endif; ?>
            <!-- end:social -->
            
        </div>
 		<!-- end:logo container -->
 
 
		<!-- start:menu -->
 		<?php get_template_part('elements/menu'); ?>
		<!-- end:menu -->
     

        <!-- start:search -->
        <?php if($tada_theme['search'] == '1') : ?>
            <div class="tada-search">
                <form action="<?php echo esc_url( home_url( '/' ) ); ?>/" method="get">
                    <div class="form-group-search">
                        <input type="search" class="search-field" name="s" placeholder="<?php echo esc_html__('Search and hit enter...','tada'); ?>">
                        <button type="submit" class="search-btn"><i class="icon-search4"></i></button>
                    </div>
                </form>
            </div>
        <?php endif; ?>
		<!-- end:search -->


		<!-- start:slider -->
 		<?php get_template_part('elements/slider'); ?>
		<!-- end:slider --> 
 
 </header>                     