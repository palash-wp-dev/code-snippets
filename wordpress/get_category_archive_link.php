<!-- This will create a link of category which will take the user to that particular category archive page.  -->
<h4 class="blog__details__tag__title"><?php esc_html_e( 'Related Tags:', 'appgenix' ); ?></h4>
<div class="blog__details__tag__list">
    <?php
    $categories = get_the_category();
    foreach ( $categories as $category ) :
        // Get the URL of this category
        $category_link = get_term_link( $category );

    ?>
    <a href="<?php echo esc_url( $category_link ); ?>" class="blog__details__tag__link"><?php printf( esc_html__( '%s', 'appgenix' ), $category->name ); ?></a>
    <?php endforeach; ?>
</div>
