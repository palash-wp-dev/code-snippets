<?php 
    if( ! is_front_page() && ! is_single() ){
        $post = $wp_query->get_queried_object();
        $pagename = $post->post_name; 
        echo '<li>'.esc_html( $pagename ).'</li>';  
    }
?>