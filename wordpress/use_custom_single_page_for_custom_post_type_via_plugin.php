<?php 
/**
 * Checks to see if appropriate templates are present in active template directory.
 * Otherwises uses templates present in plugin's template directory.
 */
add_filter('template_include', 'tf_service_single_template');
function tf_service_single_template( $template ){

    /* 
     * Optional: Have a plug-in option to disable template handling
     * if( get_option('wpse72544_disable_template_handling') )
     *     return $template;
     */

    if(is_singular('tfservicebooking') && 'single-tfservicebooking.php' != $template ){
        //WordPress couldn't find an 'event' template. Use plug-in instead:
        $template = plugin_dir_path( __FILE__ ) . 'single-tfservicebooking.php';
    }

    return $template;
}