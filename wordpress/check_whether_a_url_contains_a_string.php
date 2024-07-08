<?php 
global $wp;

// Get the current URL
$current_url = home_url( add_query_arg( array(), $wp->request ) );

// Check if the URL contains specific string which is "docs"
if ( str_contains( $current_url, 'docs' ) ) {
    echo 'The url contains this string';
}