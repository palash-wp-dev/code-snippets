<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Test extends \Elementor\Widget_Base {

	public function get_name() {
		return 'cvit-test';
	}

	public function get_title() {
		return esc_html__( 'Cvit Test', 'cvit' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'cvit' ];
	}

	public function get_keywords() {
		return [ 'cvit', 'heading' ];
	}

	protected function register_controls() {

		// Cvit heading
		

		$this->start_controls_section(
			'table_data_content',
			[
				'label' => esc_html__( 'Table Data Content', 'cvit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

$repeater = new \Elementor\Repeater();


$repeater->add_control(
	'heading',
	[
		'label' => 'Heading',
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => 'Type Heading'
	]
);



$this->add_control(
	'list',
	[
		'label' => esc_html__( 'Heading List', 'plugin-name' ),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		
		
	]
);

$repeater2 = new \Elementor\Repeater();

		



		
$repeater2->add_control(
	'data_label',
	 [
        'label' => esc_html__( 'Select Form', 'staraddons' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'label_block' => true,
        'options' => $this->tt()
    ]
);


		

		$repeater2->add_control(
			'table_data', [
				'label' => esc_html__( 'Table Data', 'cvit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type Table Data', 'cvit' ),
				'default' => esc_html__( 'Table Data' , 'cvit' ),
				'label_block' => true,
				

			]
		);

		

		$this->add_control(
			'list2',
			[
				'label' => esc_html__( 'Data List', 'cvit' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater2->get_controls(),
				'default' => [
					[	
						
						'table_data' => esc_html__( 'Table Head' , 'cvit' ),
						
						
					],
					
					
					
					
				],
				
			]
		);

		$this->end_controls_section();

	}

	
public function tt() {
	$settings= $this->get_settings_for_display();
	$data = [];
	foreach($settings['list'] as $new){
		echo $data = $new['heading'];
	}
	return $data;
}

	protected function render() {
		// $settings = $this->get_settings_for_display();


?>

	

<?php 

	}

}