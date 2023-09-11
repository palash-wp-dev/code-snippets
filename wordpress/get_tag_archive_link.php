<?php
// This will create a tag link which will take the user to that particular tag archive page where they will see all posts related to only that tag
$tag = get_the_tags();
$tag_slug = $tag[0]->slug; // here we will only get the slug of the first tag, if we want all the tags then we will have to run a WP loop
$tag_link = get_tag_link( get_term_by('slug', $tag_slug, 'post_tag') );
?>
<a href="<?php echo esc_url( $tag_link ); ?>" class="blog__item__contents__tag__item">
    <div class="blog__item__contents__tag__icon"><span class="material-symbols-outlined">sell</span></div>
    <p class="blog__item__contents__tag__para"><?php printf( esc_html__( '%s', 'appgenix' ), $tag[0]->name )?></p>
</a>
