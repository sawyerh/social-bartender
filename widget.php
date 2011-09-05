<?php

// Props @nickhamze 

function sh_sb_widget_register_widgets() {
    register_widget( 'sh_sb_widget' );
}

class sh_sb_widget extends WP_Widget {

    function sh_sb_widget() {
        $widget_ops = array( 
			'classname' => 'sh_sb_widget_class', 
			'description' => 'Display your Social Bartender links.' 
			); 
        $this->WP_Widget( 'sh_sb_widget', 'Social Bartender', $widget_ops );
    }
 
    function form($instance) {
        $defaults = array( 'title' => '' ); 
        $instance = wp_parse_args( (array) $instance, $defaults );
        $title = $instance['title'];
        ?>
        <p><strong><?php _e( 'Set up Social Bartender', 'shaken' ); ?> <a href="/wp-admin/options-general.php?page=sh_sb_settings_page"><?php _e( 'here.', 'shaken' ); ?></a></strong></p>
        <p><?php _e( 'Title (optional):', 'shaken' ); ?> <input class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>"  type="text" value="<?php echo esc_attr( $title ); ?>" /></p>
        <?php
    }
 
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );
 
        return $instance;
    }
 
    function widget($args, $instance) {
        extract($args);
 
        echo $before_widget;

	        $title = apply_filters( 'widget_title', $instance['title'] );
	 
	        if ( !empty( $title ) ) { 
	        	echo $before_title . $title . $after_title; 
	        };
	        
	        social_bartender();
        
        echo $after_widget;
    }
}

add_action( 'widgets_init', 'sh_sb_widget_register_widgets' );
?>