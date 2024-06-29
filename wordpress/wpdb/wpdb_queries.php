<?php 
// WordPress $wpdb all methods

// this will store the primary key of newly added row
$first_table_id = $wpdb->insert_id;


/* query to select methods
    in WordPress */

// $wpdb->get_results() : let’s query our database for the IDs and titles of the four most recent posts, ordered by comment count (in descending order)
$posts = $wpdb->get_results("SELECT ID, post_title FROM $wpdb->posts WHERE post_status = 'publish'
   AND post_type='post' ORDER BY comment_count DESC LIMIT 0,4"); // It is best for when you need two-dimensional data (multiple rows and columns). It converts the data into an array that contains separate objects for each row.

// $wpdb->get_row() : When you need to find only one particular row in the database (for example, the post with the most comments), you can use get_row(). It pulls the data into a one-dimensional object.
$posts = $wpdb->get_row("SELECT ID, post_title FROM wp_posts WHERE post_status = 'publish'
   AND post_type='post' ORDER BY comment_count DESC LIMIT 0,1")

   // Echo the title of the most commented post
   echo $posts->post_title;

   // $wpdb->get_col() : This method is much the same as get_row(), but instead of grabbing a single row of results, it gets a single column. This is helpful if you would like to retrieve the IDs of only the top 10 most commented posts. Like get_row(), it stores your results in a one-dimensional object.
   $posts = $wpdb->get_col("SELECT ID FROM wp_posts WHERE post_status = 'publish'
   AND post_type='post' ORDER BY comment_count DESC LIMIT 0,10")

   // Echo the ID of the 4th most commented post
   echo $posts[3]->ID;

   // $wpdb->get_var() : In many cases, you will need only one value from the database; for example, the email address of one of your users. In this case, you can use get_var to retrieve it as a simple value. The value’s data type will be the same as its type in the database (i.e. integers will be integers, strings will be strings).
   $email = $wpdb->get_var("SELECT user_email FROM wp_users WHERE user_login = 'danielpataki' ")

   // Echo the user's email address
   echo $email;

   /* query to insert
    into WordPress database */

    // $wpdb->insert() : 
    $wpdb->insert( $table, $data, $format); // This method takes three arguments. The first specifies the name of the table into which you are inserting the data. The second argument is an array that contains the columns and their respective values, as key-value pairs. The third parameter specifies the data type of your values, in the order you have given them. Here’s an example:    
    $wpdb->insert($wpdb->usermeta, array("user_id" => 1, "meta_key" => "awesome_factor", "meta_value" => 10), array("%d", "%s", "%d"));

   // Equivalent to:
   // INSERT INTO wp_usermeta (user_id, meta_key, meta_value) VALUES (1, "awesome_factor", 10);

   /* updating database table
   of wordpress table */
   // $wpdb->update() : 

