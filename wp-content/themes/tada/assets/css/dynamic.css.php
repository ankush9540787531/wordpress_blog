<?php
	//prevent direct access
	if ( ! defined( 'ABSPATH' ) ) {
		die();
	}
	header('Content-type: text/css');
	global $tada_theme;
?>	
	<?php if($tada_theme['bg-header'] == '1') : ?>
    
        body {
            background-image:url('<?php echo esc_url($tada_theme['bg-header-image']['url']); ?>');
        }
    
	<?php endif; ?>
	
    body {
    	background-color:<?php echo esc_html($tada_theme['bg-color']['rgba']); ?>;
    }
    
    <?php // Font Family ?>
    body {
    	font-family:<?php echo esc_html($tada_theme['main-typography']['font-family']); ?>;
    }
    .post-text h2,
    .page .tada-blog-1-column .post-text h2, 
    .page .tada-blog-2-columns .post-text h2,
    .page .tada-blog-3-columns .post-text h2,
    .navigation-post .name-post,
    .author-name,
    .related-title a,
    .latest-posts .info-post h5 a {
    	font-family:<?php echo esc_html($tada_theme['title-typography']['font-family']); ?>;
    }
    
    
    
    <?php // MAIN COLOR ?> 
    #preloader-container, 
    nav li:hover ul.submenu li a:hover,
    .related-text, 
    .related-author,
    .newsletter form input,
    .related-post-without-thumb {
        background:<?php echo esc_html($tada_theme['main-color']); ?>;
    }
    nav li:hover > ul.submenu,
    .navigation-post .prev-post,
    .navigation-post .next-post,
    .author-post,
    .comments-list {
        border:1px solid <?php echo esc_html($tada_theme['main-color']); ?>;
    }
    nav li:hover ul.submenu li,
    .menu-responsive li:hover ul.submenu li {
        border-bottom:1px solid <?php echo esc_html($tada_theme['main-color']); ?>;	
    }
    .menu-responsive .submenu {
        border-top:1px solid #f6f6f6;
        border-bottom:1px solid <?php echo esc_html($tada_theme['main-color']); ?>;
    }
    
    
    
    <?php // SECOND COLOR ?> 
    a:hover,
    .tada-social a:hover,
    nav i,
    nav .active,
	.current-menu-item > a,
	.current-menu-ancestor > a,
    nav > ul > li a:hover,
    nav li:hover ul.submenu li a:hover,
    .menu-responsive i,
    .menu-responsive .active,
    .menu-responsive > ul > li a:hover,
    .main-color,
    .tada-text-container .button a:hover,
    .post-text .date,
    .post-text h2 a:hover,
    .post-text a i,
    .post-by a,
    .extra-info a:hover,
    .extra-info .comments i,
    .navigation a:hover,
	.navigation .page-numbers.current,
    .navigation i,
    .post .text a,
    quote,
    .bullet li:before,
    .navigation-post a:hover,
    .navigation-post i,
    .author-social a:hover,
    .related-posts h2,
    .related-date,
    .related-title a:hover,
    .related-author a,
    .comments h3,
    .comment-reply-title a:hover,
    .comment-date,
    .comment-description i,
    .comment-form h3,
    .field-name,
    .wpcf7 label,
    .page .post-text h2,
    .widget-title,
    .about-me .ad-text .signing,
    .latest-posts .info-post h5 a:hover,
    .latest-posts .info-post .date,
    .newsletter h4,
    .footer-bottom .copyright a,
    .footer-bottom .backtotop i,
    .footer-bottom .backtotop:hover,
    .navigation .active a,
    .comment-date a:hover,
    .comment-form label,
    .logged-in-as a,
    .author-name a:hover {
        color:<?php echo esc_html($tada_theme['second-color']); ?>;
    }
    .tada-text-container .button a:hover,
    .tags-container a,
    .tagcloud a  {
        border:1px solid <?php echo esc_html($tada_theme['second-color']); ?>;
    }
    
    @keyframes preloader_5_after {
        0% {border-top:5px solid <?php echo esc_html($tada_theme['second-color']); ?>;border-bottom:5px solid <?php echo esc_html($tada_theme['second-color']); ?>;}
        50% {border-top:5px solid <?php echo esc_html($tada_theme['second-color']); ?>;border-bottom:5px solid <?php echo esc_html($tada_theme['second-color']); ?>;}
        100% {border-top:5px solid <?php echo esc_html($tada_theme['second-color']); ?>;border-bottom:5px solid <?php echo esc_html($tada_theme['second-color']); ?>;}
    }
    
    .post-image .category a,
    .post .category a,
    .social-post a,
    .related-image .related-category a,
    .comment-form button,
    .wpcf7 .wpcf7-submit,
    .about-me .ab-title,
    .follow-container a,
    .tags-container a:hover,
    .tagcloud a:hover,
    .newsletter form button,
    .comment-form .submit,
    .tagcloud a:hover,
    #preloader-container .spinner-pulse,
    #preloader-container .spinner-plane,
    #preloader-container .spinner-three-bounce > div,
    #preloader-container .spinner-dots .dot1,
    #preloader-container .spinner-dots .dot2,
    .post-password-form input[type="submit"]:hover,
	.not-found input[type="submit"]:hover {
        background:<?php echo esc_html($tada_theme['second-color']); ?>;
    }
    .reply-line:after {
        border-top:1px solid <?php echo esc_html($tada_theme['second-color']); ?>;
    }
    
    <?php // THIRD COLOR ?>
    
    nav,
    nav li:hover > ul.submenu,
    .menu-responsive,
    .tada-search,
    nav.sticky,
    .post-text,
    .post-info,
    .navigation a,
	.navigation .page-numbers.current,
    .social-post,
    .navigation-post,
    .author-post-container,
    .related-posts,
    .post .comments,
    .page .comments.comments-template,
    .comment-form,
    .wpcf7,
    .widget-title,
    .about-me .ad-text,
    .latest-posts .posts-container,
    .follow-container,
    .tags-container,
    .tagcloud,
    .advertising-container,
    .newsletter-container,
    .footer-bottom,
    .nav-numeric li,
    .post-without-thumb {
        background:<?php echo esc_html($tada_theme['third-color']); ?>;
    }
    header a,
    .tada-slider li.sy-prev a:after,
    .tada-slider li.sy-next a:after,
    .post-image .category a,
    .post .category a,
    .social-post a,
    .social-post a i,
    .related-image .related-category a,
    .comment-form button,
    .about-me .ab-title,
    .follow-container a,
    .tags-container a:hover,
    .newsletter form button,
    .comment-form .submit,
    .tagcloud a:hover,
    .post-password-form input[type="submit"]:hover,
	.not-found input[type="submit"]:hover {
        color:<?php echo esc_html($tada_theme['third-color']); ?>;
    }
    .sy-controls li a:after {
        background-color: <?php echo esc_html($tada_theme['third-color']); ?>;
    }     
    
    <?php // Fourth Color ?>
    
    .tada-text-container .button a {
        border:1px solid <?php echo esc_html($tada_theme['fourth-color']); ?>;
    }
    .tada-text-container .button a,
    .post-text h2 a,
    .navigation-post .name-post,
    .author-name,
    .author-social a,
    .related-title a,
    .comment-name,
    .latest-posts .info-post h5 a,
    .tags-container a,
    .comment-date a,
    .comment-reply-title a,
    .logged-in-as a:hover,
    .author-name a,
    .tagcloud a {
        color:<?php echo esc_html($tada_theme['fourth-color']); ?>;
    }
    
    <?php // Fifth Color ?>

    .post-text .text,
    .post-by,
    .extra-info a,
    .extra-info .comments,
    .navigation a,
    .post .post-by,
    .navigation-post .prev-post,
    .navigation-post .next-post,
    .navigation-post a,
    .author-description,
    .related-author,
    .comment-description,
    .about-me .ad-text p,
    .newsletter p,
    .newsletter form input,
    .footer-bottom .copyright,
    .footer-bottom .backtotop {
        color:<?php echo esc_html($tada_theme['fifth-color']); ?>;
    }
    
    <?php // Minor Color 1 ?>
    
    .tada-social a,
    nav li a,
    .menu-responsive li a {
        color:<?php echo esc_html($tada_theme['minor-color-1']); ?>;
    }
    
    <?php // Minor Color 2 ?> 
    
    .post-by a:hover,
    .post .text a:hover,
    .related-author a:hover,
    .footer-bottom .copyright a:hover {
        color:<?php echo esc_html($tada_theme['minor-color-2']); ?>;
    }
    
    .social-post a:hover,
    .follow-container a:hover {
        background: <?php echo esc_html($tada_theme['minor-color-2']); ?>;
    }
    
    <?php // Minor Color 3 ?>
    
    .comment-form input,
    .comment-form textarea,
    .wpcf7 input,
    .wpcf7 textarea {
        border:1px solid <?php echo esc_html($tada_theme['minor-color-3']); ?>;
    }
    .tada-post-sticky .post-without-thumb, 
    .tada-post-sticky .post-text,
    .tada-post-sticky .post-info {
        background:<?php echo esc_html($tada_theme['minor-color-3']); ?>;
    } 
    
	<?php // Minor Color 4 ?>
    
    .tada-search {
        color:<?php echo esc_html($tada_theme['minor-color-4']); ?>
    }           
       
