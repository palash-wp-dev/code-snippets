<?php
// This code snippet will create a date link which will take the user to the archive page of that particular date.
$year = get_the_date( 'Y' );
$month = get_the_date( 'm' );
$day = get_the_date( 'd' );
$day_archive_link = get_day_link( $year, $month, $day );
?>
<a href="<?php echo esc_url( $day_archive_link ); ?>" class="blog__item__contents__tag__item">
    <div class="blog__item__contents__tag__icon"><span class="material-symbols-outlined">schedule</span></div>
    <p class="blog__item__contents__tag__para"><?php echo get_the_date( 'd F Y' ); ?></p>
</a>
