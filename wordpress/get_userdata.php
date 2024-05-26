<?php 
$user_data = get_userdata( $item['user_id'] );

if ( $user_data ) {
	$user_email = $user_data->user_email;

	$item['user_email'] = $user_email;
	$first_name = $user_data->first_name;
	$last_name = $user_data->last_name;

	if ( ! $first_name && ! $last_name ) {
		$item['user_name'] = $user_data->display_name;
	} else {
		$item['user_name'] = $first_name . ' ' . $last_name;
	}

}