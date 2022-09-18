<?php 
//activate plugin after while activating the theme

function enable_plugin(){
    include_once( ABSPATH.'wp-admin/includes/plugin.php' );
    $current_theme = wp_get_theme();
    $current_theme_name = $current_theme->name;

    if( $current_theme_name == 'CVIT' ){
        if( is_plugin_active( 'cvit-core/cvit.php' ) == false ){
            activate_plugin( 'cvit-core/cvit.php' );
        }
        
    }

}
add_action( 'after_switch_theme', 'enable_plugin' );