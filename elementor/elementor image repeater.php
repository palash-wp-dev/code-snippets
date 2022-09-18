<?php

// code for repeating elementor image item on elementor repeater control

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'image',
	[
		'label' => esc_html__( 'Choose Image', 'plugin-name' ),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => plugins_url( 'images/wordpress.png', __FILE__ ),
		],
	]
);

$this->add_control(
	'images',
	[
		'label' => esc_html__( 'Repeater List', 'plugin-name' ),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'image' => [
					'url' => plugins_url( 'images/wordpress.png', __FILE__ ),
				]
			],

			// Add as many items as you want as default


		],
	]
);