<?php
/**
 * fuente:link(https://www.benmarshall.me/build-custom-elementor-widgets/
 */

namespace ElementorAwesomesauce;

defined( 'ABSPATH' ) || die();

class Widgets {

	private static $instance = null;
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
	private function include_widgets_files() {
		require_once 'widgets/widget-personalizado.php';
	}

	public function register_widgets() {
		$this->include_widgets_files();
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Awesomesauce() );
	}
	public function __construct() {
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'register_widgets' ) );
	}
}
Widgets::instance();
