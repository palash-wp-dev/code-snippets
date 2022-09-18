<?php


$this->add_control(
    'photo_width',
    [
        'label' => esc_html__( 'Width', 'plugin-name' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => [ 'px', '%' ],
        'range' => [
            'px' => [
                'min' => 0,
                'max' => 1000,
                'step' => 5,
            ],
            '%' => [
                'min' => 0,
                'max' => 100,
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .ea-profile-card .profile-cover img' => 'width: {{SIZE}}{{UNIT}};',
        ],
    ]
);
$this->add_control(
    'photo_height',
    [
        'label' => esc_html__( 'Height', 'plugin-name' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => [ 'px', '%' ],
        'range' => [
            'px' => [
                'min' => 0,
                'max' => 1000,
                'step' => 5,
            ],
            '%' => [
                'min' => 0,
                'max' => 100,
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .ea-profile-card .profile-cover img' => 'height: {{SIZE}}{{UNIT}};',
        ],
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Border::get_type(),
    [
        'name' => 'cover_border',
        'label' => esc_html__( 'Border', 'plugin-name' ),
        'selector' => '{{WRAPPER}} .ea-profile-card .profile-cover img',
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
    [
        'name' => 'cover_box_shadow',
        'label' => esc_html__( 'Box Shadow', 'plugin-name' ),
        'selector' => '{{WRAPPER}} .ea-profile-card .profile-cover img',
    ]
);
$this->add_control(
    'cover_border_radius',
    [
        'label' => esc_html__( 'Border Radius', 'plugin-name' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => [ 'px', '%' ],
        'range' => [
            'px' => [
                'min' => 0,
                'max' => 100,
                'step' => 1,
            ],
            '%' => [
                'min' => 0,
                'max' => 100,
                'step' => 1
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .ea-profile-card .profile-cover img' => 'border-radius: {{SIZE}}{{UNIT}};',
        ],
    ]
);

$this->add_responsive_control(
    'avatar_margin',
    [
        'label' => esc_html__( 'Margin', 'plugin-name' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'selectors' => [
            '{{WRAPPER}} .ea-profile-card .profile-avatar' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->add_responsive_control(
    'avatar_padding',
    [
        'label' => esc_html__( 'Padding', 'plugin-name' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'selectors' => [
            '{{WRAPPER}} .ea-profile-card .profile-avatar img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);









