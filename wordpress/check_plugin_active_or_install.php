
<?php 
// ** Show plugin installed message **// 

$all_plugins_list = get_plugins(); // get a list of all installed plugin in an array

// and then use array_key_exists() function and check plugin via its folder and main file name
//For example look at this below code
if( ! array_key_exists( 'woocommerce/woocommerce.php', $all_plugins_list ) ) {
	?>
	<div class="notice notice-error is-dismissible">
		<p>WooCommerce is not installed</p>
	</div>
	<?php
}


// ** Show plugin active message **// 

// there are so many ways to do that.

class_exists('class_name_of_that_plugin') // 1 way

function_exists('function_of_that_plugin') // 2 way

//Only plugins installed in the plugins/ folder can be active.
//Plugins in the mu-plugins/ folder can’t be "activated," so this function will return false for those plugins.
is_plugin_active() // 3 way

// get an array of active plugins and then check for a specific plugin
get_option( 'active_plugins' ); // 4 way 