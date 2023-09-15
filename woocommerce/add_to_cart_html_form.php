// add to cart html form
<form action="" method="post">
    <input name="add-to-cart" type="hidden" value="<?php echo $post->ID ?>" />
    <input name="quantity" type="number" value="1" min="1"  />
    <input name="submit" type="submit" value="Add to cart" />
</form>

<form action="<?php echo get_permalink(); ?>" method="post">
      <input name="add-to-cart" type="hidden" value="<?php the_ID(); ?>" />
      <input name="quantity" type="number" value="1" min="1"  />
      <input name="submit" type="submit" value="Add to cart" />
</form>

// or via a href link
<a rel="nofollow ugc" href="<?php the_permalink();?>/?add-to-cart=<?php the_ID(); ?>">Add to Cart</a>