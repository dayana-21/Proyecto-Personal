<?php

class My_Elementor_Widgets{
    protected static $instance = null;

public static function get_instance(){
    if (! isset (static::$instance )){
        static::$instance = new static;
    }
    return static::$instance;
}
protected function __contruct(){
    require_once('proyectos.php');
    add_action('elementor/widgets/widgets_registered', [ $this,'register_widgets']);
}
    public function register_widgets(){
        \Elementor\Plugin::instance()->witgets_manager->register_widget_type(new \Elementor\Proyectos_Widget());
    }
}
    add_action('init', 'my_elementor_init');
    function my_elementor_init(){
        My_Elementor_Widgets::get_instance();
}





