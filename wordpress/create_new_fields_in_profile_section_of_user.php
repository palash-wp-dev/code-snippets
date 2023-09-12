<?php
// add these hook to the themes functions.php file or in your plugin main file
 add_filter('nav_menu_css_class', array( $this, 'add_additional_class_on_li' ), 1, 3);

add_action('show_user_profile', array( $this, 'custom_user_profile_fields' ) );

add_action('edit_user_profile', array( $this, 'custom_user_profile_fields' ) );

add_action('personal_options_update', array( $this, 'save_custom_user_profile_fields' ) );

add_action('edit_user_profile_update', array( $this, 'save_custom_user_profile_fields' ) );


/**
* Add a new fields to the user profile page
* @since 1.0
*/
public function custom_user_profile_fields( $user ) {
  ?>
  <h3><?php esc_html_e( 'Author Social Profiles',  'appgenix' ); ?></h3>

  <table class="form-table">
      <tr>
          <th><label for="user_facebook_profile"><?php esc_html_e( 'Facebook URL', 'appgenix' ); ?></label></th>
          <td>
              <input type="text" name="user_facebook_profile" id="user_facebook_profile" value="<?php echo esc_attr( get_the_author_meta( 'user_facebook_profile', $user->ID ) ); ?>" class="regular-text" /><br />
              <span class="description"><?php esc_html_e( 'Please enter your facebook profile url',  'appgenix' ); ?></span>
          </td>
      </tr>
      <tr>
          <th><label for="user_twitter_profile"><?php esc_html_e( 'Twitter URL',  'appgenix' ); ?></label></th>
          <td>
              <input type="text" name="user_twitter_profile" id="user_twitter_profile" value="<?php echo esc_attr( get_the_author_meta( 'user_twitter_profile', $user->ID ) ); ?>" class="regular-text" /><br />
              <span class="description"><?php esc_html_e( 'Please enter your twitter profile url',  'appgenix' ); ?></span>
          </td>
      </tr>
      <tr>
          <th><label for="user_instagram_profile"><?php esc_html_e( 'Instagram URL',  'appgenix' ); ?></label></th>
          <td>
              <input type="text" name="user_instagram_profile" id="user_instagram_profile" value="<?php echo esc_attr( get_the_author_meta( 'user_instagram_profile',  $user->ID ) ); ?>" class="regular-text" /><br />
              <span class="description"><?php esc_html_e('Please enter your instagram profile url', 'appgenix'); ?></span>
          </td>
      </tr>
      <tr>
          <th><label for="user_youtube_prfile"><?php esc_html_e( 'Youtube URL',  'appgenix' ); ?></label></th>
          <td>
              <input type="text" name="user_youtube_profile" id="user_youtube_profile" value="<?php echo esc_attr( get_the_author_meta( 'user_youtube_profile', $user->ID ) ); ?>" class="regular-text" /><br />
              <span class="description"><?php esc_html_e( 'Please enter your youtube channel url',  'appgenix' ); ?></span>
          </td>
      </tr>
  </table>
  <?php
}

/**
* Save custom user profile fields
* @since 1.0
*/
public function save_custom_user_profile_fields( $user_id ) {
  if ( current_user_can( 'edit_user', $user_id ) ) {
      update_user_meta( $user_id,  'user_facebook_profile', sanitize_text_field( $_POST['user_facebook_profile'] ) );
      update_user_meta( $user_id,  'user_twitter_profile', sanitize_text_field( $_POST['user_twitter_profile'] ) );
      update_user_meta( $user_id,  'user_instagram_profile', sanitize_text_field( $_POST['user_instagram_profile'] ) );
      update_user_meta( $user_id,  'user_youtube_profile', sanitize_text_field( $_POST['user_youtube_profile'] ) );
  }
}
