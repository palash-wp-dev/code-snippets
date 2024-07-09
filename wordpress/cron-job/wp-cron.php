<?php
namespace HexCouponPro\App\Core\WooCommerce\LoyaltyProgram;

use HexCouponPro\App\Controllers\WooCommerce\LoyaltyProgram\EnablePointsOnReview;
use HexCouponPro\App\Core\Lib\SingleTon;

class CustomFieldsInAccountDetails
{
	use SingleTon;

	private $points_for_birthday;

	/**
	 * @return void
	 * @author WpHex
	 * @method register
	 * @package hexcoupon
	 * @since 1.0.0
	 * Add all hooks that are needed.
	 */
	public function register()
	{
		// Add the date of birth field to the account details form
		add_action( 'woocommerce_edit_account_form_start', [ $this, 'add_dob_field_to_account_details' ] );
		// Save the date of birth field
		add_action( 'woocommerce_save_account_details', [ $this, 'save_dob_field_in_account_details' ] );
		// Add custom cron schedule for every minute
		add_filter( 'cron_schedules', [ $this, 'wanp_add_every_minute_schedule' ] );
		// Hook the function to run daily (you may want to set up a cron job for this)
		add_action( 'wp_loaded', [ $this, 'schedule_daily_event' ] );
		// Hook the function to our scheduled event
		add_action( 'daily_gift_points_event_for_bd', [ $this, 'gift_points_on_birthday' ] );

		$this->points_for_birthday = get_option( 'pointsForBirthday' );
		$this->points_for_birthday = ! empty( $this->points_for_birthday['pointAmount'] ) ? intval( $this->points_for_birthday['pointAmount'] ) : 0;
	}


	public function wanp_add_every_minute_schedule($schedules) {
	    $schedules['wanp_every_minute'] = array(
	        'interval' => 60,
	        'display' => __('Every Minute')
	    );
	    return $schedules;
	}

	/**
	 * @package hexcoupon
	 * @author WpHex
	 * @method add_dob_field_to_account_details
	 * @return void
	 * @since 1.0.0
	 *
	 */
	public function add_dob_field_to_account_details()
	{
		woocommerce_form_field(
			'date_of_birth',
			[
				'type' => 'date',
				'required' => false,
				'label' => 'Date of Birth',
				'class' => ['form-row-wide']
			],
			get_user_meta( get_current_user_id(), 'date_of_birth', true )
		);
	}

	/**
	 * @package hexcoupon
	 * @author WpHex
	 * @method save_dob_field_in_account_details
	 * @param int $user_id
	 * @return void
	 * @since 1.0.0
	 *
	 */
	public function save_dob_field_in_account_details( $user_id )
	{
		if ( isset( $_POST['date_of_birth'] ) ) {
			update_user_meta( $user_id, 'date_of_birth', sanitize_text_field( $_POST['date_of_birth'] ) );
		}
	}

	/**
	 * Function to gift points on birthdays
	 *
	 * @package hexcoupon
	 * @since 1.0.0
	 */
	public function gift_points_on_birthday()
	{
		$today = date('m-d' ); // We use 'm-d' to match the month and day

		$args = [
			'meta_key' => 'date_of_birth',
			'meta_value' => '-' . $today, // This ensures the month and day match, regardless of year
			'meta_compare' => 'LIKE'
		];

		$user_query = new \WP_User_Query( $args );
		$users = $user_query->get_results();

		$points_for_bd = $this->points_for_birthday;

		foreach ( $users as $user ) {
			EnablePointsOnReview::getInstance()->give_loyalty_points( $user->ID, $points_for_bd, 5 );
		}
	}

	/**
	 * Schedule the daily event if not already scheduled
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function schedule_daily_event()
	{
		$give_points_on_birthday = ! empty( $this->points_for_birthday['enable'] ) ? $this->points_for_birthday['enable'] : 0;


		if ( $give_points_on_birthday && ! wp_next_scheduled( 'daily_gift_points_event_for_bd' ) ) {
			wp_schedule_event( time(), 'daily', 'daily_gift_points_event_for_bd' );
		}

		if ( ! $give_points_on_birthday ) {
			 wp_clear_scheduled_hook('daily_gift_points_event_for_bd');
		}
	}
}