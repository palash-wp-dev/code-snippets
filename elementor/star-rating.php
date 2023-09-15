<?php 
// elementor control
$this->add_control(
	'testimonial_rating',
	[
		'label' => esc_html__( 'Rating', 'elefix-addon' ),
		'type' => \Elementor\Controls_Manager::NUMBER,
		'min' => 1,
		'max' => 5,
		'step' => .5,
		'default' => 1,
	]
);


// functions to create star rating
function ratingStar( $rating, $echo = true ) {
	$starRating = '';
	$j = 0;
	for( $i = 0; $i <= 4; $i++ ) {
	  $j++;
	  if( $rating  >= $j   || $rating  == '5'   ) {
	    $starRating .= '<i class="fas fa-star"></i>';
	  }
	  elseif( $rating < $j && $rating  > $i ) {
	    $starRating .= '<i class="fas fa-star-half-alt"></i>';
	  } 
	 //  else {
		// $starRating .= '<i class="fal fa-star"></i>';
	 //  }
	}
	if( $echo == true ) {
	  echo $starRating;
	} else {
	  return $starRating;
	}
}

// how to echo in render
$rating = $settings['testimonial_rating'];
$echo = true;
ratingStar( $rating, $echo )
