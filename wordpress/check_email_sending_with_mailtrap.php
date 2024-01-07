<?php 
// this is for local environment, you do not need this hook in live site
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

// after this just use wp_mail() function, in live site you dont need the upper portion
$to = [ '01777441019', '01682649818' ];
$subject = __( 'Hello, this is a test email', 'hex-coupon-for-woocommerce' );
$message = __( 'You may use this " ' . $coupon_title . ' " coupon to get discount', 'hex-coupon-for-woocommerce' );
$headers = 'From: test@example.com';

// Send the coupon via email using wp_mail()
wp_mail( $to, $subject, $message, $headers );