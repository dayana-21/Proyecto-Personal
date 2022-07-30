<?php

namespace ElementorAwesomesauce\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

defined( 'ABSPATH' ) || die();

class Awesomesauce extends Widget_Base {
	
	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );

		wp_register_style( 'widget-personalizado', plugins_url( '/assets/css/awesomesauce.css', ELEMENTOR_AWESOMESAUCE ), array(), '1.0.0' );
	}

	public function get_name() {
		return 'widget-personalizado';
	}

	public function get_title() {
		return __( 'Widget-Personalizado', 'widget-personalizado' );
	}

	public function get_icon() {
		return 'eicon-globe';
	}

	public function get_categories() {
		return array( 'general' );
	}
	
	public function get_style_depends() {
		return array( 'widget-personalizado' );
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			array(
				'label' => __( 'Content', 'elementor' ),
			)
		);

		$this->add_control(
            'description',
            [
                'label' => __( 'Description', 'elementor' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Texto', 'elementor' ),
            ]
        );
        
		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'elementor' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'Ingrese un link', 'elementor' ),
				'default' => ['url',''],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$url = $settings['link']['url'];
		echo "<a href='$url'><div class='description'>$settings[description]</div></a>";
	}
	
	protected function _content_template() {
		?>
		<#
		view.addInlineEditingAttributes( 'title', 'none' );
		#>
		<h2 {{{ view.getRenderAttributeString( 'title' ) }}}>{{{ settings.title }}}</h2>
		<?php
	}
}
