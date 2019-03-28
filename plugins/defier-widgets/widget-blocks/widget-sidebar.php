<?php
/*************************************/
/********* Sidebar Widget  ***********/
/*************************************/
add_action( 'widgets_init', 'Defier_Sidebar_Widget' );
function Defier_Sidebar_Widget() {
	register_widget( 'Defier_Sidebar_Widget' );
}
class Defier_Sidebar_Widget extends WP_Widget {
    var $defaults = array(
        'title' => '',
        'sidebar' => '',
        'class' => ''
    );

    public function __construct($id_base = false, $name = '', $widget_options = array(), $control_options = array()) {
        parent::__construct('DefierTabbed', __('Defier widget - Sidebar', 'defier-magazine-blog'), array('description' => __('Sidebar into tabbed widget.', 'defier-magazine-blog')));
    }

    public function widget($args, $instance) {
        add_filter('dynamic_sidebar_params', array(&$this, 'widget_sidebar_params'));

        extract($args, EXTR_SKIP);
$title = apply_filters('widget_title', $instance['title'] );


        echo $before_widget;
if ( $title )
            echo $before_title . $title . $after_title;
            if ($instance['sidebar']) {
                ?>
                        <div class="main_tabs">
                            <ul class="widget-tabbed-header"></ul>
                            <div class="widget-tabbed-body">
                                <?php dynamic_sidebar($instance["sidebar"]); ?>
                            </div>
                        </div> <!--main tabs-->

            <?php
            } else {
                _e('Tabbed widget is not properly configured.', 'defier-magazine-blog');
            }
        echo $after_widget;

        remove_filter('dynamic_sidebar_params', array(&$this, 'widget_sidebar_params'));
    }

    public function form($instance) {
        global $wp_registered_sidebars;
        $instance = wp_parse_args((array)$instance, $this->defaults);

        ?>        
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'defier-magazine-blog') ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
    </p>
    
        <p><label>Sidebar:</label>
            <select style="background-color: white;" class="widefat d4p-tabber-sidebars" id="<?php echo $this->get_field_id('sidebar'); ?>" name="<?php echo $this->get_field_name('sidebar'); ?>">
                <?php

                foreach ($wp_registered_sidebars as $id => $sidebar) {
                    if ($id != 'wp_inactive_widgets') {
                        $selected = $instance['sidebar'] == $id ? ' selected="selected"' : '';
                        echo sprintf('<option value="%s"%s>%s</option>', $id, $selected, $sidebar['name']);
                    }
                }

                ?>
            </select><br/>
            <em><?php _e('Make sure not to select Sidebar holding this widget. If you do that, Tabber will not be visible.', 'defier-magazine-blog'); ?></em>
        </p>
        <p><label><?php _e('CSS Class:', 'defier-magazine-blog'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('class'); ?>" name="<?php echo $this->get_field_name('class'); ?>" type="text" value="<?php echo $instance['class']; ?>" />
        </p>

        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['sidebar'] = strip_tags(stripslashes($new_instance['sidebar']));
        $instance['class'] = strip_tags(stripslashes($new_instance['class']));

        return $instance;
    }

    public function widget_sidebar_params($params) {
        $params[0]['before_widget'] = '<aside class="widget-tab">';
        $params[0]['after_widget'] = '</aside>';
        $params[0]['before_title'] = '<span class="defier-cat-title"><h4 class="widget-title"><div class="lavecat"></div>';
        $params[0]['after_title'] = '</h4></span>';

        return $params;
    }
}

add_action( 'widgets_init', create_function('',
    'return register_widget("Defier_Sidebar_Widget");') );
?>