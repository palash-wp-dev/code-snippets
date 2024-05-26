<?php 

// This hook is triggered when a post is loaded
add_action( 'load-post.php', [ $this, 'check_image_file' ] );

public function check_image_file() {
	$post_id = intval( $_GET['post'] );

	$file_exists = file_exists( plugins_url( '/hex-coupon-for-woocommerce/assets/images/qr_code_' . $post_id ) );

	if ( ! $file_exists ) {
		QrCodeGeneratorHelpers::getInstance()->qr_code_generator_for_url( $post_id );
	}
}