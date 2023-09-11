<?php
$current_page_link = get_permalink( get_the_ID() ); // get current post page link

$csf_facebook_share_url = 'https://www.facebook.com/sharer/sharer.php?u=' . $current_page_link;
$csf_twitter_share_url = 'https://twitter.com/intent/tweet?text=' . $current_page_link;
$csf_linkedin_share_url = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $current_page_link;
$csf_youtube_share_url = 'https://www.youtube.com/watch?v=' . $current_page_link;
$csf_pinterest_share_url = 'https://pinterest.com/pin/create/button/?url=' . $current_page_link;
