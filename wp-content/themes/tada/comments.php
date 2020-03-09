<?php
/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */
 
 global $tada_theme;
 if ( post_password_required() )
 return;
?>

<div class="comments comments-template">

	<h3><?php printf( _n( '1 Comment', '%1$s Comments', 'tada' ), get_comments_number() ); ?></h3>
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-above" class="comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'tada' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'tada' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'tada' ) ); ?></div>
	</nav>
	<?php endif; ?>

	<?php wp_list_comments( array( 'callback' => 'tada_comment' ) ); ?>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-below" class="comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'tada' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'tada' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'tada' ) ); ?></div>
	</nav>
	<?php endif; ?>

	<?php if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'tada' ); ?></p>
    <?php endif; ?>
    <?php comment_form( array(
      'comment_notes_after'	=> '',
      'comment_notes_before' => '',
      'title_reply'       	=> esc_html__( 'Leave a Comment', 'tada' )
    )); ?>

</div>
 
 