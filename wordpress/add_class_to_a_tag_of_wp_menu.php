<?php 
// This will add class to the a tag of wp menu.
function add_class_to_a_tag( $atts ) {
    $atts['class'] = "nav-link";
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_class_to_a_tag' );