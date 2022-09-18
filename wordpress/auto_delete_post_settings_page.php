<?php 
/**
 * Registers a new option under Settings menu.
 */
function my_menu() {
    add_options_page(
        __( 'Auto Delete Post', 'adp' ),
        __( 'Auto Delete Post', 'adp' ),
        'manage_options',
        'auto_delete_post',
        'settings_page', // callback for html output
        '0'
    );
}

/**
 * Settings page display callback.
 */
function settings_page() {
    if( ! empty( $_POST['post_id'] ) ){
         $post_id = $_POST['post_id'];
         $post_time = $_POST['dtime'];
         foreach($post_id as $new_id){
            wp_delete_post( $new_id );
         }
    }
    
    $custom = new WP_Query( array(
        'post_type' => 'post'
    ));
    echo '<body><section><div class="all-posts"><form method="post" action="#">';
    if( $custom->have_posts() ) {
        while( $custom -> have_posts() ) {
            $custom->the_post();

            echo '<input type="checkbox" id="post" name="post_id[]" value="'.esc_html( get_the_ID() ).'"> <label for="post">'.esc_html( get_the_title() ).'</label> <input type="datetime-local" name="dtime" id="dtime" value="'.$post_time.'" /><br>';
         }
    }

    if( $custom -> have_posts() ) {
        echo '<input type="submit" name="submit" value="Delete Post"> <br>';
    }
    else {
        echo '<h1 class="no-post-msg">Currenty there is no post!</h1>';
    }
    echo '</form></div></section></body>';
    // wp_reset_postdata(); 
}
add_action('admin_menu','my_menu');

/**
 * Delete post after a certain time from settings page
 */
// echo 'local time'.$local_time = get_post_meta( get_the_ID(), 'auto_delete_post_time_key', true );
// echo 'converted time'.$time = strtotime( $local_time );
// echo 'current time'.$current_time = time();


// if( ! empty( $time ) && $time >= $current_time ) {
   
// wp_delete_post( get_the_ID($dele_id) );
// }

// $meta_value = get_post_meta( get_the_ID(), 'auto_delete_post_time_key', true );

