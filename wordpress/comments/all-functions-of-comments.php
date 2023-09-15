<?php 
// to show default comment template use the following code in 'single.php' file

if( comments_open() ) { // check if comments are open with 'comments_open()' function, that means discussion is enable from the single page screen reader options
	comments_template(); 
}

// have to create a 'comments.php' file to avoid deprecation error from WordPress

// 'wp_list_comments()'' show all the comments of a post

// 'comment_form()' function shows the comment form in the display


// to redesign the comment_form() html markup will do the below codings

// 'comment_form() 
add_filter('comment_form_fileds','callback_function'); // add this filter in your themes 'functions.php' file
function callback_function() {
	// do stuff
}