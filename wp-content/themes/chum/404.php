<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Chum
 */
get_header(); ?>
	<div id="content" class="site-content">
		<div class="site-main page" role="main">

			<?php do_action( 'bp_before_404' ); ?>
			
			<div id="post-0" class="post page-404 error404 not-found" role="main">
				<h2 class="posttitle"><?php _e( "404 Error", 'buddypress' ); ?></h2>
				<h3 class="postsubtitle"><b>Chum!</b> couldn’t find it.</h3>
				<p><?php _e( "We're sorry, but we can't find the page that you're looking for. Perhaps searching will help.", 'buddypress' ); ?></p>
				
				<form role="search" method="get" id="searchform" action="<?php echo home_url(); ?>/">
					<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
					<button type="submit" id="searchsubmit" value="<?php _e( 'Search', 'buddypress' ); ?>"><i class="fa fa-search"></i></button>

					<?php do_action( 'bp_blog_search_form' ); ?>
				</form>
				
				<?php do_action( 'bp_404' ); ?>
			</div>
			
			<?php do_action( 'bp_after_404' ); ?>

			<?php include('template-subfooter.php'); ?>

		</div> <!-- .site-main -->

	</div> <!-- .site-content -->
<?php get_footer(); ?>