<?php

/**
 * BuddyPress - Members Loop
 *
 * Querystring is set via AJAX in _inc/ajax.php - bp_dtheme_object_filter()
 *
 * @package BuddyPress
 * @subpackage bp-default
 */

$current_time = current_time( 'mysql', 1 );

function online_check( $current_time ) { 

  global $members_template;
	
  if ( isset( $members_template->member->last_activity ) ) {

    $diff =  strtotime( $current_time ) - strtotime( $members_template->member->last_activity ); 

    if ( $diff < 300 ) // 5 minutes  =  5 * 60
		echo '<i class="status-online"></i>Online';
    else
		echo '<i class="status-offline"></i>Offline';
    }
}

?>

<?php do_action( 'bp_before_members_loop' ); ?>

<?php if ( bp_has_members( bp_ajax_querystring( 'members' ) ) ) : ?>


	<?php do_action( 'bp_before_directory_members_list' ); ?>

	<div id="members-list" class="item-list clear" role="main">

		<?php while ( bp_members() ) : bp_the_member(); ?>

		<div class="member-item member-id-<?php echo bp_get_member_user_id(); ?>">
			<div class="item-avatar">
				<a href="<?php bp_member_permalink(); ?>"><?php bp_member_avatar('type=full&height=100&width=100'); ?></a>
			</div>

			<div class="item">
				<div class="item-title">
					<a href="<?php bp_member_permalink(); ?>" class="member-name"><?php bp_member_name(); ?></a>
					<!--
					<?php if ( bp_get_member_latest_update() ) : ?>

						<span class="update"> <?php bp_member_latest_update(); ?></span>

					<?php endif; ?>

					<div class="member-info"><?php echo xprofile_get_field_data( "Country" , $curauth->ID ) ?></div>
					-->
					<div class="ol-status"><?php online_check( $current_time ); ?></div>
				</div>

				<?php do_action( 'bp_directory_members_item' ); ?>

				<?php
				 /***
				  * If you want to show specific profile fields here you can,
				  * but it'll add an extra query for each member in the loop
				  * (only one regardless of the number of fields you show):
				  *
				  * bp_member_profile_data( 'field=the field name' );
				  */

				
				?>

				<a href="<?php bp_member_permalink(); ?>" class="button button-gray clear">View Profile</a>
			</div>

		</div>

		<?php endwhile; ?>

	</div>

	<?php do_action( 'bp_after_directory_members_list' ); ?>

	<div class="members-pagination pagination">
		<?php bp_members_pagination_links(); ?>
	</div>

	<?php bp_member_hidden_fields(); ?>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( "Sorry, no members were found.", 'buddypress' ); ?></p>
	</div>

<?php endif; ?>

<?php do_action( 'bp_after_members_loop' ); ?>
