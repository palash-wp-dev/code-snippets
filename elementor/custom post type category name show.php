<?php 
	// elementor control e category name gula sob show hobe
	protected function getPriceCat() {
		$t = get_terms( [ 'taxonomy' => 'pricing_category', 'hide_empty' => true ] );
		$getT = [];
		if( !empty( $t ) ) {
			foreach( $t as $term  ) {
				$getT[$term->slug] = $term->name;
			}
		}
		return $getT;
	}

	$this->add_control(
		    'show_elements',
		    [
		        'label' => __( 'Post Categoris', 'plugin-domain' ),
		        'type' => \Elementor\Controls_Manager::SELECT2,
		        'multiple' => true,
		        'options' => $this->getPriceCat(),
		    ]
		);

	
?>