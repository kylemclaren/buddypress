<?php

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

<?php if ( bp_group_has_members( 'exclude_admins_mods=0' ) ) : ?>

	<?php do_action( 'bp_before_group_members_content' ); ?>

	<div class="item-list-tabs" id="subnav" role="navigation">
		<ul>

			<?php do_action( 'bp_members_directory_member_sub_types' ); ?>

		</ul>
	</div>

	<?php do_action( 'bp_before_group_members_list' ); ?>

	<div id="members-list" class="item-list clear" role="main">

		<?php while ( bp_group_members() ) : bp_group_the_member(); ?>

		<div class="member-item member-id-<?php echo bp_get_member_user_id(); ?>">
			<div class="item-avatar">
				<a href="<?php bp_group_member_domain(); ?>"><?php bp_group_member_avatar_thumb('type=full&height=100&width=100'); ?></a>
			</div>

			<div class="item">
				<div class="item-title">
					<a href="<?php bp_group_member_domain(); ?>" class="member-name"><?php bp_member_name(); ?></a>
					<div class="ol-status"><?php online_check( $current_time ); ?></div>
				</div>
				<div class="member-since"><?php bp_group_member_joined_since(); ?></div>
				<?php do_action( 'bp_directory_members_item' ); ?>

				<a href="<?php bp_group_member_domain(); ?>" class="button button-gray clear">View Profile</a>
			</div>

		</div>

		<?php endwhile; ?>

	</div>

	<?php do_action( 'bp_after_group_members_list' ); ?>

	<div id="pag-bottom" class="members-pagination pagination no-ajax">
		<div class="pag-count" id="member-count-bottom">
			<?php bp_members_pagination_count(); ?>
		</div>
		<div class="pagination-links" id="member-pag-bottom">
			<?php bp_members_pagination_links(); ?>
		</div>
	</div>

	<?php do_action( 'bp_after_group_members_content' ); ?>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'This group has no members.', 'buddypress' ); ?></p>
	</div>

<?php endif; ?>
