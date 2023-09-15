<?php 
/* Simple comment loop to show all comments */

// Get only the approved comments
$args = array(
	'status' => 'approve', // approved comments
	'post_id' => get_the_ID(), // get current post id, if this is not used all comments from all posts will be shown
);

// The comment Query
$comments_query = new WP_Comment_Query();
$comments       = $comments_query->query( $args );

// Comment Loop
if ( $comments ) {
	foreach ( $comments as $comment ) {
		echo '<p>' . $comment->comment_content . '</p>';

		echo get_avatar( $comment, 64 ); // here '64' is the parameter to show a image of 64 size.

		comment_author( $comment ); // get the name of comment author

		edit_comment_link(); // add a edit button to edit the comment

		comment_text( $comment ) // get the comment text of the commenter
	}
} else {
	echo 'No comments found.';
}

get_comments_number() // get the number of comments a post has

wp_list_comments() // use this function to show comments instead of the above loop to show default WP comment

comment_form() // show comment form with this function

the_commetns_pagination() // this will show the pagination form multiple number of comments