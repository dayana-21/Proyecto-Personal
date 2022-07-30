
        <?php
        class Elementor_Test_Widget extends \Elementor\Widget_Base {
        
            protected function register_controls() {
        
                $this->start_controls_section(
                    'section_content',
                    [
                        'label' => esc_html__( 'Content', 'plugin-name' ),
                        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    ]
                );
        
                $this->add_control(
                    'title',
                    [
                        'label' => esc_html__( 'Title', 'plugin-name' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'placeholder' => esc_html__( 'Enter your title', 'plugin-name' ),
                    ]
                );
        
                $this->end_controls_section();
        
            }
        
            protected function render() {
                $settings = $this->get_settings_for_display();
                echo '<h3>' . $settings['title'] . '</h3>';
            }
        
            protected function content_template() {
                ?>
                <h3>{{{ settings.title }}}</h3>
                <?php
            }
        
        }