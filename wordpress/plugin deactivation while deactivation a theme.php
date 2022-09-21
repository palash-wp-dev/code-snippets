<?php
function disable_plugins(){
    include_once(ABSPATH.'wp-admin/includes/plugin.php');
    $current_theme = wp_get_theme();
    $current_theme_name = $current_theme->parent_theme;
    if($current_theme_name != 'Bizlooks'){
        if ( is_plugin_active('bizlooks-core/bizlooks.php') ) {
            deactivate_plugins('bizlooks-core/bizlooks.php');
        }
    }
}
add_action('switch_theme','disable_plugins');


// 'after_switch_theme' hook ta hocche theme active er jonno