<?php
$items_per_page = 2;
$page = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
$offset = ( $page * $items_per_page ) - $items_per_page;

$query = 'SELECT * FROM '.$table_name;

$total_query = "SELECT COUNT(1) FROM (${query}) AS combined_table";
$total = $wpdb->get_var( $total_query );

$results = $wpdb->get_results( $query.' ORDER BY id DESC LIMIT '. $offset.', '. $items_per_page, OBJECT );
/*
*
* Here goes the loop
*
***/
echo paginate_links( array(
        'base' => add_query_arg( 'cpage', '%#%' ),
        'format' => '',
        'prev_text' => __('&laquo;'),
        'next_text' => __('&raquo;'),
        'total' => ceil($total / $items_per_page),
        'current' => $page
    ) );

// ** Real project code of min **//
public function loyalty_points_logs_page_endpoint_content()
	{
		$user_id = get_current_user_id();

		global $wpdb;
		$table_name = $wpdb->prefix . 'hex_loyalty_points_log';

		$items_per_page = 10;
		$page = isset( $_GET['log'] ) ? abs( (int) $_GET['log'] ) : 1;
		$offset = ( $page * $items_per_page ) - $items_per_page;

		$query = "SELECT * FROM {$table_name} WHERE user_id = {$user_id}";

		$total_query = "SELECT COUNT(1) FROM (${query}) AS combined_table";
		$total = $wpdb->get_var( $total_query );

		$results = $wpdb->get_results( $query.' ORDER BY id DESC LIMIT '. $offset.', '. $items_per_page, ARRAY_A );
	?>
	<div class="loyalty-points-log">
		<h2><?php esc_html_e( 'Loyalty Points Log', 'hex-coupon-for-woocommerce' ); ?></h2>
		<table class="loyalty-points-log-table">
			<thead>
			<tr>
				<th><?php echo esc_html__( 'Points', 'hex-coupon-for-woocommerce' ); ?></th>
				<th><?php echo esc_html__( 'Reason', 'hex-coupon-for-woocommerce' ); ?></th>
				<th><?php echo esc_html__( 'Referrer ID', 'hex-coupon-for-woocommerce' ); ?></th>
				<th><?php echo esc_html__( 'Converted Credit', 'hex-coupon-for-woocommerce' ); ?></th>
				<th><?php echo esc_html__( 'Conversion Rate', 'hex-coupon-for-woocommerce' ); ?></th>
				<th><?php echo esc_html__( 'Date', 'hex-coupon-for-woocommerce' ); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php if ( ! $results ) : ?>
				<tr>
					<td><?php esc_html_e( 'No data yet', 'hex-coupon-for-woocommerce' ); ?></td>
					<td><?php esc_html_e( 'No data yet', 'hex-coupon-for-woocommerce' ); ?></td>
					<td><?php esc_html_e( 'No data yet', 'hex-coupon-for-woocommerce' ); ?></td>
					<td><?php esc_html_e( 'No data yet', 'hex-coupon-for-woocommerce' ); ?></td>
					<td><?php esc_html_e( 'No data yet', 'hex-coupon-for-woocommerce' ); ?></td>
					<td><?php esc_html_e( 'No data yet', 'hex-coupon-for-woocommerce' ); ?></td>
				</tr>
			<?php endif; ?>
			<?php
			if ( $results ) : foreach( $results as $item ) :
				switch ( $item['reason'] ) {
					case 0 :
						$reason = 'Signup';
						break;
					case 1 :
						$reason = 'Referral';
						break;
					case 2 :
						$reason = 'Purchase';
						break;
					default :
						$reason = 'Signup';
				}

			// Assigning 'Null' if there is null value
			$referee_id = $item['referee_id'] ?? 'NA';
			?>
			<tr>
				<td><?php printf( esc_html__( '%s', 'hex-coupon-for-woocommerce' ), esc_html( $item['points'] ) ); ?></td>
				<td><?php printf( esc_html__( '%s', 'hex-coupon-for-woocommerce' ), esc_html( $reason ) ); ?></td>
				<td><?php printf( esc_html__( '%s', 'hex-coupon-for-woocommerce' ), esc_html( $referee_id ) ); ?></td>
				<td><?php printf( esc_html__( '%s', 'hex-coupon-for-woocommerce' ), esc_html( $item['converted_credit'] ) ); ?></td>
				<td><?php printf( esc_html__( '%s', 'hex-coupon-for-woocommerce' ), esc_html( $item['conversion_rate'] ) ); ?></td>
				<td><?php printf( esc_html__( '%s', 'hex-coupon-for-woocommerce' ), esc_html( $item['created_at'] ) ); ?></td>
			</tr>
			<?php endforeach; endif; ?>
			</tbody>
		</table>
		<p><b><?php esc_html_e( 'All points are converted to store credit. Use store credit to make purchase on our store.', 'hex-coupon-for-woocommerce' );?></b></p>
	</div>
	<?php
		echo paginate_links( [
			'base' => add_query_arg( 'log', '%#%' ),
			'format' => '',
			'prev_text' => __( '« Prev' ),
			'next_text' => __( 'Next »' ),
			'total' => ceil($total / $items_per_page),
			'current' => $page
		] );
	}