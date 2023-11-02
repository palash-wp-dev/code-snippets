<?php 
// this is for local environment
add_action( 'phpmailer_init', [ $this, 'mailtrap_check' ] );

public function mailtrap_check( $phpmailer )
{
	$phpmailer->isSMTP();
	$phpmailer->Host = 'sandbox.smtp.mailtrap.io';
	$phpmailer->SMTPAuth = true;
	$phpmailer->Port = 2525;
	$phpmailer->Username = '06d811eada3301';
	$phpmailer->Password = '149556ee9e6445';
}

// 