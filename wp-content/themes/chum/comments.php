<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Chum
 */

	// Bail if post type doesn't support comments
	if ( ! post_type_supports( get_post_type(), 'comments' ) )
		return;

	// Bail if is a page, and comments are not open
	if ( is_page() && ! have_comments() && ! comments_open() && ! pings_open() )
		return;

	if ( post_password_required() ) {
		echo '<h3 class="comments-header">' . __( 'Password Protected', 'buddypress' ) . '</h3>';
		echo '<p class="alert password-protected">' . __( 'Enter the password to view comments.', 'buddypress' ) . '</p>';
		return;
	}

	if ( have_comments() ) :
		$num_comments   = 0;
		$num_trackbacks = 0;
		foreach ( (array) $comments as $comment ) {
			if ( 'comment' != get_comment_type() ) {
				$num_trackbacks++;
			} else {
				$num_comments++;
			}
		}
?>
	<div id="comments">

		<h3>
			<?php printf( _n( '1 response to %2$s', '%1$s responses to %2$s', $num_comments, 'buddypress' ), number_format_i18n( $num_comments ), '<em>' . get_the_title() . '</em>' ); ?>
		</h3>

		<?php do_action( 'bp_before_blog_comment_list' ); ?>

		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'bp_dtheme_blog_comments', 'type' => 'comment' ) ); ?>
		</ol><!-- .comment-list -->

		<?php do_action( 'bp_after_blog_comment_list' ); ?>

		<?php if ( get_option( 'page_comments' ) ) : ?>
			<div class="comment-navigation paged-navigation">
				<?php paginate_comments_links(); ?>
			</div>
		<?php endif; ?>

	</div><!-- #comments -->

<?php else : ?>

	<?php if ( ! comments_open() ) : ?>
		<?php if ( pings_open() ) : ?>
			<p class="comments-closed pings-open">
				<?php printf( __( 'Comments are closed, but <a href="%1$s" title="Trackback URL for this post">trackbacks</a> and pingbacks are open.', 'buddypress' ), get_trackback_url() ); ?>
			</p>
		<?php else : ?>
			<p class="comments-closed">
				<?php _e( 'Comments are closed.', 'buddypress' ); ?>
			</p>
		<?php endif; ?>
	<?php endif; ?>

<?php endif; ?>

<?php if ( comments_open() )
	$fields = array(
		'author' =>
			'<p class="comment-form-author"><label for="author">' . __( 'Name', 'chum' ) . '</label> ' .
			( $req ? '<span class="required">*</span>' : '' ) .
			'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
			'" size="30"' . $aria_req . ' /></p>',

		'email' =>
			'<p class="comment-form-email"><label for="email">' . __( 'Email', 'chum' ) . '</label> ' .
			( $req ? '<span class="required">*</span>' : '' ) .
			'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			'" size="30"' . $aria_req . ' /></p>',
	);
	$comment_args = array(
		'fields'				=> $fields,
		'title_reply'			=> __( 'Leave a Reply' ),
		'cancel_reply_link'		=> __('Cancel Reply'),
		'label_submit'      	=> __( 'Send Message' ),
		'comment_notes_after'	=> '',
		'comment_field'			=> '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment ', 'noun' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label><textarea id="comment" name="comment" ' . $aria_req . '></textarea></p>',
	);
	comment_form( $comment_args );

?>

<?php if ( !empty( $num_trackbacks ) ) : ?>
	<div id="trackbacks">
		<h3><?php printf( _n( '1 trackback', '%d trackbacks', $num_trackbacks, 'buddypress' ), number_format_i18n( $num_trackbacks ) ); ?></h3>

		<ul id="trackbacklist">
			<?php foreach ( (array) $comments as $comment ) : ?>

				<?php if ( 'comment' != get_comment_type() ) : ?>
					<li>
						<h5><?php comment_author_link(); ?></h5>
						<em>on <?php comment_date(); ?></em>
					</li>
				<?php endif; ?>

			<?php endforeach; ?>
		</ul>

	</div>
<?php endif; ?>