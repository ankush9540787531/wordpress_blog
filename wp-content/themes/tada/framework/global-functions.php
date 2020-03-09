<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */ 
 
function tada_dynamic_enqueue_scripts() {
    wp_enqueue_style(
        'dynamic-css',
        admin_url( 'admin-ajax.php' ) . '?action=dynamic_css_action&wpnonce=' . wp_create_nonce( 'dynamic-css-nonce' ), // src
        array(),
        1.0
    );
}
function tada_dynamic_css_loader() {
    $nonce = $_REQUEST['wpnonce'];
    if ( ! wp_verify_nonce( $nonce, 'dynamic-css-nonce' ) ) {
        die( 'invalid nonce' );
    } else {
        require_once get_template_directory() . '/assets/css/dynamic.css.php';
    }
    exit;
}
add_action( 'wp_enqueue_scripts', 'tada_dynamic_enqueue_scripts' );

add_action( 'wp_ajax_dynamic_css_action', 'tada_dynamic_css_loader' );
add_action( 'wp_ajax_nopriv_dynamic_css_action', 'tada_dynamic_css_loader' );


# Function Views
if ( ! function_exists( 'tada_get_post_views' ) ) {
	function tada_get_post_views($postID){
		$count_key = 'wpb_post_tada_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
			$view = esc_html__('Views','tada');
			return "0";
		}
		$count_final = $count; 
		return $count_final;
	}
}
if ( ! function_exists( 'tada_set_post_views' ) ) {
	function tada_set_post_views() {
		if ( is_single() ) {
		global $post;
		$postID = $post->ID;	
		$count_key = 'wpb_post_tada_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
			$count = 0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
		}else{
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
		}
	}
	add_filter( 'wp_footer', 'tada_set_post_views', 200000 );
}

# Function Thumbnails
if ( ! function_exists( 'tada_thumbs' ) ) {
	function tada_thumbs() {
		global $post;
		$link = get_the_permalink();
		if(has_post_thumbnail()){ 
				$id_post = get_the_id();					
				$single_image = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), 'tada-preview-post' );	 					 
				$return = '<img src="'.$single_image[0].'" alt="'.get_the_title().'">';
	
			} else {               
				 $return = '';                 
		}	
		return $return;
	}
}

# Function Thumbnails Related Post
if ( ! function_exists( 'tada_related_thumbs' ) ) {
	function tada_related_thumbs() {
		global $post;
		$link = get_the_permalink();
		if(has_post_thumbnail()){ 
				$id_post = get_the_id();					
				$single_image = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), 'tada-related-post' );	 					 
				$return = '<img src="'.$single_image[0].'" alt="'.get_the_title().'">';
	
			} else {               
				 $return = '';                 
		}	
		return $return;
	}
}

# Function Category
if ( ! function_exists( 'tada_category' ) ) {
	function tada_category() {
			$categories = get_the_category();
			$separator = '';
			$output = '';
			$i = 1;
			if($categories){
				foreach($categories as $category) {
					$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s",'tada' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
					if($i == 7) : break; endif;
					$i++;
				}
			}
		$return = trim($output, $separator);
		return $return;
	}
}

# Function Date
if ( ! function_exists( 'tada_post_data' ) ) {
	function tada_post_data($date_format) {
		$return = get_the_date($date_format); 
		return $return;
	}
}

# Function Post Content
if ( ! function_exists( 'tada_post_content' ) ) {
	function tada_post_content($excerpt) {
		$return = substr(get_the_excerpt(), 0, $excerpt);
		$return .= '<a href="'.get_the_permalink().'" title="'.esc_html__('Read More','tada').'"><i class="icon-arrow-right2"></i></a>';
		return $return;
	}
}

# Function Post By
if ( ! function_exists( 'tada_post_by' ) ) {
	function tada_post_by() {
		$return = esc_html__('Post by ','tada');
		$return .= '<a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author_meta( 'display_name' ).'</a>';
		return $return;
	}
}

# Function Post Extra Info
if ( ! function_exists( 'tada_post_extra_info' ) ) {
	function tada_post_extra_info() {
		
    $return = '<a target="_blank" href="http://www.facebook.com/sharer.php?u='.get_the_permalink().'&amp;t='.strtolower(str_replace(' ', '%20', get_the_title())).'" title="'.esc_html__('Click to share this post on Facebook','tada').'"><i class="icon-facebook5"></i></a>
		<a target="_blank" href="http://twitter.com/home?status='.get_the_permalink().'" title="'.esc_html__('Click to share this post on Twitter','tada').'"><i class="icon-twitter4"></i></a>
        <a target="_blank" href="https://plus.google.com/share?url='.get_the_permalink().'" title="'.esc_html__('Click to share this post on Google+','tada').'"><i class="icon-google-plus"></i></a>';
	$num_comments = get_comments_number();
	if($num_comments > 0) :
		$return .= '<span class="comments"><a href="' . get_comments_link() .'">' . get_comments_number(get_the_ID()) . ' <i class="icon-bubble2"></i></a></span>';
	else :
		$return .= '<span class="comments">' . get_comments_number(get_the_ID()) . ' <i class="icon-bubble2"></i></span>';	
	endif;
		return $return;
	}
}

# Function Post Social
if ( ! function_exists( 'tada_post_social' ) ) {
	function tada_post_social() {
		
    $return = '
		<a target="_blank" href="http://www.facebook.com/sharer.php?u='.get_the_permalink().'&amp;t='.strtolower(str_replace(' ', '%20', get_the_title())).'" title="'.esc_html__('Click to share this post on Facebook','tada').'"><i class="icon-facebook5"></i></a>
		<a target="_blank" href="http://twitter.com/home?status='.get_the_permalink().'" title="'.esc_html__('Click to share this post on Twitter','tada').'"><i class="icon-twitter4"></i></a>
        <a target="_blank" href="https://plus.google.com/share?url='.get_the_permalink().'" title="'.esc_html__('Click to share this post on Google+','tada').'"><i class="icon-google-plus"></i></a>
        <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.get_the_permalink().'" title="'.esc_html__('Click to share this post on Linkedin','tada').'"><i class="icon-linkedin2"></i></a>';
		
		return $return;
	}
}
# Function Pagination Home Blog Page
if ( ! function_exists( 'tada_paging_home_blog_page' ) ) :
	function tada_paging_home_blog_page() {

	?>
	<div class="navigation nav-home-blog">
		<?php 
		$args = array(	
						'prev_text'          => wp_kses ( __( '<i class="icon-arrow-left8"></i> Previous Posts', 'tada' ), array('i' => array( 'class' => array() ) ) ),
						'next_text'          => wp_kses ( __( 'Next Posts <i class="icon-arrow-right8"></i>', 'tada' ), array('i' => array( 'class' => array() ) ) ),
					);
		
		echo paginate_links($args); ?>
	</div>
	<?php	
	}
endif;

# Function Pagination
if ( ! function_exists( 'tada_paging_nav' ) ) :
	function tada_paging_nav($page_blog = null) {
		global $wp_query;
		if ( $wp_query->max_num_pages < 2 )
			return;	
		?>
		
		<div class="navigation"> 

				<?php if ( get_previous_posts_link() ) : ?>
					<div class="prev"><?php echo previous_posts_link( 
								wp_kses ( 	__( '<i class="icon-arrow-left8"></i> Previous Posts', 'tada' ), 
											array('i' => array( 
																'class' => array()
															)
											)							
								)); ?>
                    </div>
				<?php endif; ?>	
                        
				<?php if ( get_next_posts_link() ) : ?>
					<div class="next"><?php echo next_posts_link( 
								wp_kses ( 	__( 'Next Posts <i class="icon-arrow-right8"></i>', 'tada' ), 
											array('i' => array( 
																'class' => array()
															)
											) 
								)); ?>
                    </div>
				<?php endif; ?>
                
                <div class="clear"></div>	
                                                                       
		</div>
		
		<?php
	}
endif;

# Function Numeric Pagination
if ( ! function_exists( 'tada_numeric_posts_nav' ) ) :
	function tada_numeric_posts_nav() {
	
		if( is_singular() )
			return;
	
		global $wp_query;
	
		/** Stop execution if there's only 1 page */
		if( $wp_query->max_num_pages <= 1 )
			return;
	
		$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
		$max   = intval( $wp_query->max_num_pages );
	
		/**	Add current page to the array */
		if ( $paged >= 1 )
			$links[] = $paged;
	
		/**	Add the pages around the current page to the array */
		if ( $paged >= 3 ) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}
	
		if ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}
	
		echo '<div class="navigation nav-numeric"><ul>' . "\n";
	
		/**	Previous Post Link */
		if ( get_previous_posts_link() )
			printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
	
		/**	Link to first page, plus ellipses if necessary */
		if ( ! in_array( 1, $links ) ) {
			$class = 1 == $paged ? ' class="active"' : '';
	
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
	
			if ( ! in_array( 2, $links ) )
				echo '<li>...</li>';
		}
	
		/**	Link to current page, plus 2 pages in either direction if necessary */
		sort( $links );
		foreach ( (array) $links as $link ) {
			$class = $paged == $link ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
		}
	
		/**	Link to last page, plus ellipses if necessary */
		if ( ! in_array( $max, $links ) ) {
			if ( ! in_array( $max - 1, $links ) )
				echo '<li>...</li>' . "\n";
	
			$class = $paged == $max ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
		}
	
		/**	Next Post Link */
		if ( get_next_posts_link() )
			printf( '<li>%s</li>' . "\n", get_next_posts_link() );
	
		echo '</ul><div class="clear"></div></div>' . "\n";
	
	}
endif;

# Function Post Navigation
if ( ! function_exists( 'tada_post_nav' ) ) :
	function tada_post_nav() {
		global $post;
		?>                      
        <div class="navigation-post">
        
                <?php $prev_post = get_previous_post();
                        if (!empty( $prev_post )): ?>    
                        <div class="prev-post">
                                <?php echo get_the_post_thumbnail($prev_post->ID, array(60,60) ); ?>                     
                                <a href="<?php echo get_post_permalink($prev_post->ID); ?>" class="prev">
                                	<i class="icon-arrow-left8"></i> <?php echo esc_html__('Previous Post','tada'); ?>
									<span class="name-post"><?php echo $prev_post->post_title ?></span>
                                </a>
                             <div class="clearfix"></div>
                        </div>    
                <?php endif ?>  
                
                          
                <?php $next_post = get_next_post();
                        if (!empty( $next_post )): ?>        
                        <div class="next-post">
                        	<a href="<?php echo get_post_permalink($next_post->ID); ?>" class="next">
                        		<?php echo esc_html__('Next Post','tada'); ?> <i class="icon-arrow-right8"></i>                            
                            	<span class="name-post"><?php echo $next_post->post_title; ?></span>
                            </a>
                            <?php echo get_the_post_thumbnail($next_post->ID, array(60,60) ); ?>
                        	<div class="clearfix"></div>
                        </div>                    
                <?php endif; ?>
    
            
            	<div class="clearfix"></div>
        
        </div>
		<?php
	}
endif;

# Function Comments
if ( ! function_exists( 'tada_comment' ) ) :
	function tada_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;?>
		
		<div class="comments-list">
			<div id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> class="main-comment">
					<div class="comment-image-author">
						<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, 60 ); ?>    
					</div>
					<div class="comment-info">
						  <div class="comment-name-date">
							<span class="comment-name"><?php comment_author( $comment ); ?></span>
							<span class="comment-date">
								<?php printf( esc_html_x( '%1$s at %2$s', '1: date, 2: time', 'tada' ), get_comment_date(), get_comment_time() ); ?>
								- <?php comment_reply_link( array_merge( $args, array( 'add_below' => 'div-comment', 'reply_text' => 'Reply' ,'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
								<?php edit_comment_link( esc_html__( ' - Edit', 'tada' ), '<span class="edit-link">', '</span>' ); ?>
							</span>
							<div class="clearfix"></div>
						  </div>
						  <?php if ( '0' == $comment->comment_approved ) : ?>
						  <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'tada' ); ?></p>
						  <?php endif; ?>                      
						  <span class="comment-description"><?php comment_text(); ?></span>                     
					</div>
					<div class="clearfix"></div>
			</div>
		</div>
	<?php }
endif;

# Instragram Functions
if ( ! function_exists( 'get_image_instagram' ) ) :
	function get_image_instagram($account) {
		
		$instagram_source = wp_remote_get('https://instagram.com/'.$account,array( 'sslverify' => false, 'timeout' => 10 ));
		
		if ( is_wp_error( $instagram_source ) ) {

				return $instagram_source->get_error_message();
		}
		if ( $instagram_source['response']['code'] == 200 ) {
			
				$json = str_replace( 'window._sharedData = ', '', strstr( $instagram_source['body'], 'window._sharedData = ' ) );
				if ( version_compare( PHP_VERSION, '5.3.0', '>=' ) ) {
					$json = strstr( $json, '</script>', true );
				} else {
					$json = substr( $json, 0, strpos( $json, '</script>' ) );
				}			
				$json = rtrim( $json, ';' );
				
				if ( function_exists( 'json_last_error' ) ) {
					
					( $results = json_decode( $json, true ) ) && json_last_error() == JSON_ERROR_NONE;
					
				} else {
					
					$results = json_decode( $json, true );
				}			
		}
		if ( $results && is_array( $results ) ) {
			return $results;
		}
	}
endif;

# User Meta Fields
if ( ! function_exists( 'tada_extra_social_links' ) ) :
	add_action( 'show_user_profile', 'tada_extra_social_links' );
	add_action( 'edit_user_profile', 'tada_extra_social_links' );
	
	function tada_extra_social_links( $user )
	{
		?>
			<h3><?php esc_html_e('Social Author','tada'); ?></h3>
	
			<table class="form-table">
				<tr>
					<th><label for="facebook_profile">Facebook Profile</label></th>
					<td><input type="text" name="facebook_profile" value="<?php echo esc_attr(get_the_author_meta( 'facebook_profile', $user->ID )); ?>" class="regular-text" /></td>
				</tr>
	
				<tr>
					<th><label for="twitter_profile">Twitter Profile</label></th>
					<td><input type="text" name="twitter_profile" value="<?php echo esc_attr(get_the_author_meta( 'twitter_profile', $user->ID )); ?>" class="regular-text" /></td>
				</tr>
	
				<tr>
					<th><label for="google_plus_profile">Google+ Profile</label></th>
					<td><input type="text" name="google_plus_profile" value="<?php echo esc_attr(get_the_author_meta( 'google_plus_profile', $user->ID )); ?>" class="regular-text" /></td>
				</tr>
                
				<tr>
					<th><label for="vimeo_profile">Vimeo Profile</label></th>
					<td><input type="text" name="vimeo_profile" value="<?php echo esc_attr(get_the_author_meta( 'vimeo_profile', $user->ID )); ?>" class="regular-text" /></td>
				</tr>
                
				<tr>
					<th><label for="linkedin_profile">Linkedin Profile</label></th>
					<td><input type="text" name="linkedin_profile" value="<?php echo esc_attr(get_the_author_meta( 'linkedin_profile', $user->ID )); ?>" class="regular-text" /></td>
				</tr>                                
                
			</table>
		<?php
	}

	add_action( 'personal_options_update', 'tada_save_extra_social_links' );
	add_action( 'edit_user_profile_update', 'tada_save_extra_social_links' );
	
	function tada_save_extra_social_links( $user_id )
	{
		update_user_meta( $user_id,'facebook_profile', sanitize_text_field( $_POST['facebook_profile'] ) );
		update_user_meta( $user_id,'twitter_profile', sanitize_text_field( $_POST['twitter_profile'] ) );
		update_user_meta( $user_id,'google_plus_profile', sanitize_text_field( $_POST['google_plus_profile'] ) );
		update_user_meta( $user_id,'vimeo_profile', sanitize_text_field( $_POST['vimeo_profile'] ) );
		update_user_meta( $user_id,'linkedin_profile', sanitize_text_field( $_POST['linkedin_profile'] ) );
	
	}	
	
endif;

# Google Fonts
function redux_fonts_url() {

    // global variable
    global $tada_theme;

    $fonts_url = '';

    $font_1 = $tada_theme['main-typography'];
    $font_1_family = $font_1['font-family'];

    $font_2 = $tada_theme['title-typography'];
    $font_2_family = $font_2['font-family'];

    $font_families = array();
    $font_subsets = array();

    if ( 'false' !== $font_1['google'])
    	$font_1_weight = $font_1['font-weight'];
    	$font_1_subset = $font_1['subsets'];		
        $font_families[] = $font_1_family.':'.$font_1_weight;
        $font_subsets[] = $font_1_subset;

    if ( 'false' !== $font_2['google'] )    
		$font_2_weight = $font_2['font-weight'];
    	$font_2_subset = $font_2['subsets'];
        $font_families[] = $font_2_family.':'.$font_2_weight;
        $font_subsets[] = $font_2_subset;

	// Remove duplicate values
	$font_families = array_unique($font_families);
	$font_subsets = array_unique($font_subsets);

    // Combine multiple fonts into one request
    $query_args = array(
        'family' => urlencode( implode( '|', $font_families ) ),
        'subset' => urlencode( implode( ',', $font_subsets )),
    );
    $fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );

    return $fonts_url;
}

function redux_custom_google_fonts() {
	global $tada_theme;
	
	$font_1 = $tada_theme['main-typography'];
	$font_2 = $tada_theme['title-typography'];
	
	if($font_1['google'] == 1 || $font_2['google'] == 1) :
    	wp_enqueue_style( 'redux-google-fonts', redux_fonts_url(), array(), null );
	endif;
}

add_action( 'wp_enqueue_scripts', 'redux_custom_google_fonts' );

# Function Custom Code
		
## Inline Custom Css
function tada_css_custom_code($tada_theme) {
    wp_enqueue_style(
        'tada-custom-css',
        get_template_directory_uri() . '/assets/css/style.css'
    );
    wp_add_inline_style( 'tada-custom-css', $tada_theme['css-custom-code'] );
}

## Inline Custom Js
function tada_js_custom_code($tada_theme) {
   wp_enqueue_script( 'tada-custom-js', get_template_directory_uri() . '/assets/js/main.js' );
   wp_add_inline_script( 'tada-custom-js', $tada_theme['js-custom-code'] );
}


# Function Wp Title
function tada_wp_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() )
        return $title;
	
    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'name' );
	
    if ( is_home() || is_front_page() ) :
		$title = "$site_description";
	elseif ( !is_home() || !is_front_page()) :
		$title = "$site_description $title";
	endif;
	
    // Add a page number if necessary.
    if ( $paged >= 2 || $page >= 2 )    
	$title = "$title " . sprintf( esc_html__( 'Page %s', 'tada' ), max( $paged, $page ) );
	
    return $title;
}
add_filter( 'wp_title', 'tada_wp_title', 10, 2 );

get_the_tags(); 

function tada_search_form( $form ) {
    $form = '
	<form role="search" method="get" id="searchform" class="searchform" action="' . esc_url( home_url( '/' ) ) . '" >
    	<div class="tada-search tada-search-form">
			<span class="screen-reader-text" for="s">' . esc_html__( 'Search:','tada' ) . '</span>
    		<input class="search-field" type="text" value="' . get_search_query() . '" name="s" id="s" />
    		<button type="submit" class="search-btn"><i class="icon-search4"></i></button>
    	</div>
    </form>';
 
    return $form;
}
add_filter( 'get_search_form', 'tada_search_form' );