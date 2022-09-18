<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Cvit_Table extends \Elementor\Widget_Base {

	public function get_name() {
		return 'cvit-table';
	}

	public function get_title() {
		return esc_html__( 'Cvit Table', 'cvit' );
	}

	public function get_icon() {
		return 'eicon-heading';
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
			'cvit_heading_content',
			[
				'label' => esc_html__( 'Heading Content', 'cvit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'table_head', [
				'label' => esc_html__( 'Table Head', 'cvit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type Table Head', 'cvit' ),
				'default' => esc_html__( 'Table Head' , 'cvit' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Head List', 'cvit' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[	
						
						'table_head' => esc_html__( 'Table Head' , 'cvit' ),
						
						
					],
					
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'table_data_content',
			[
				'label' => esc_html__( 'Table Data Content', 'cvit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater2 = new \Elementor\Repeater();

		$repeater2->add_control(
			'type',
			[
				'label' => esc_html__( 'Row/Column', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'col',
				'options' => [
					'row'  => esc_html__( 'Row', 'plugin-name' ),
					'col' => esc_html__( 'Col', 'plugin-name' ),

				],
			]
		);

		$repeater2->add_control(
			'table_data', [
				'label' => esc_html__( 'Table Data', 'cvit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type Table Data', 'cvit' ),
				'default' => esc_html__( 'Table Data' , 'cvit' ),
				'label_block' => true,
				'condition' => [
					'type' => 'col',
				],

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
						
						'table_head' => esc_html__( 'Table Head' , 'cvit' ),
						'type' => 'col',
						
					],
					
				],
				'title_field' => '{{{ type }}}',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();


?>
	<style>
table, th, td {
  border:1px solid black;
}
tr:nth-child(odd) {
	background: red;
}
tr:nth-child(even) {
	background: green;
}
</style>
	<table>
  <tr>
  	<?php foreach( $settings['list'] as $data ) : ?>
    	<?php echo '<th>'.$data["table_head"].'</th>'; ?>
    <?php endforeach;?>
  </tr>


  <tr>
  <?php foreach( $settings['list2'] as $data2 ) : ?>
  	
  
  	<?php if( $data2['type'] == 'col' ) : ?>
		 <?php echo '<td>'.$data2["table_data"].'</td>'; ?>
		 
	<?php endif;?>

  <?php if( $data2['type'] == 'row' ) {
  	echo '</tr>';
  } ?>
  
	
  <?php endforeach;?>
</table>

<?php 

	}

}



// another way
<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Cvit_Table extends \Elementor\Widget_Base {

	public function get_name() {
		return 'cvit-table';
	}

	public function get_title() {
		return esc_html__( 'Cvit Table', 'cvit' );
	}

	public function get_icon() {
		return 'eicon-heading';
	}

	public function get_categories() {
		return [ 'cvit' ];
	}

	public function get_keywords() {
		return [ 'cvit', 'heading' ];
	}

	protected function register_controls() {

		// Cvit Table

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
					'label' => esc_html__( 'Heading', 'cvit' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'placeholder' => esc_html__( 'Type Heading', 'cvit' ),
					'default' => esc_html__( 'Heading' , 'cvit' ),
					'label_block' => true,
				]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Heading List', 'cvit' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);

		$repeater2 = new \Elementor\Repeater();

		$repeater2->add_control(
			'type',
			[
				'label' => esc_html__( 'Row/Column', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'col',
				'options' => [
					'row'  => esc_html__( 'Row', 'plugin-name' ),
					'col' => esc_html__( 'Col', 'plugin-name' ),

				],
			]
		);

		$repeater2->add_control(
			'table_data', 
			[
				'label' => esc_html__( 'Table Data', 'cvit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type Table Data', 'cvit' ),
				'default' => esc_html__( 'Table Data' , 'cvit' ),
				'label_block' => true,
				'condition' => [
					'type' => 'col',
				],

			]
		);

		$this->add_control(
			'list2',
			[
				'label' => esc_html__( 'Data List', 'cvit' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater2->get_controls(),
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
	?>

	<style>
		table td, th {
		  border:1px solid black;
		  padding: 20px;
		  
		}
		thead th {
			background: green;
		}
		tbody tr:nth-child(odd) {
			background: red;
		}
		tbody tr:nth-child(even) {
			background: green;
		}
	</style>

	<table>
		<thead>
		  <tr>
		  <?php 
		  	$heading_data = array(); 
		  	foreach( $settings['list'] as $value ) : ?>

		 			<th><?php echo $value['heading']; $heading_data[] = $value['heading']; ?></th>

		 	<?php endforeach;?>
		 </tr>
		</thead>
		<tbody>
		 <tr>
		 	<?php 
		 				$i = 0; 
		 				foreach( $settings['list2'] as $value2 ) : 
		 	?>
		 			<td data-label="<?php if(!empty($heading_data[$i])){echo $heading_data[$i];} ?>">
		 				<?php echo $value2['table_data']; ?>
		 			</td>
		 	<?php $i++; if( $value2['type'] == 'row' ){ echo'</tr>'; $i = -1; } endforeach; ?>
		</tbody>
	</table>

	<?php 

	}

}