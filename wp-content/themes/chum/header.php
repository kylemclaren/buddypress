<?php 
/**
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="content">
 * @package Chum
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php if ( current_theme_supports( 'bp-default-responsive' ) ) : ?><meta name="viewport" content="width=device-width, initial-scale=1" /><?php endif; ?>
<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php bp_head(); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">

		<?php do_action( 'bp_before_header' ); ?>

		<header id="header">
			<div id="top-bar" class="wrap">
				<h1 id="logo" role="banner"><a href="<?php echo home_url(); ?>" title="<?php _ex( 'Home', 'Home page banner link title', 'buddypress' ); ?>"><?php bp_site_name(); ?></a></h1>
				<?php if ( !is_user_logged_in() ) { ?>
					<div class="button-group">
						<a href='#' class="button" id="login">Login</a>
						<a href='<?php echo bp_get_signup_page() ?>' class="button">Signup</a>
					</div>
				<?php	} else { ?>
					<div class="button-group">
						<a href='<?php echo bp_loggedin_user_domain(); ?>' class="button">Profile</a>
						<a class="button logout" href="<?php echo wp_logout_url( wp_guess_url() ); ?>"><?php _e( 'Log Out', 'buddypress' ); ?></a>
					</div>
				<?php	} ?>
			</div>
			<div id="navigation" role="navigation">
				<div class="wrap">
					<h2 id="tagline"><?php bloginfo('description'); ?> </h2>
					<?php wp_nav_menu( array( 'container' => false, 'menu_id' => 'nav', 'theme_location' => 'primary', 'fallback_cb' => 'bp_dtheme_main_nav' ) ); ?>
				</div>
			</div>
			<?php do_action( 'bp_header' ); ?>
		</header><!-- #header -->

		<?php do_action( 'bp_after_header'     ); ?>
		<?php do_action( 'bp_before_container' ); ?>