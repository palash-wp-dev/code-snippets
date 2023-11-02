<?php
// Get users all meta data, this is a wp function but with that you can get users billing address of woocommerce
get_user_meta( $user_id, 'billing_phone', true);

// This also gets all info related to users
get_userdata( $user_id );