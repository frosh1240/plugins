<?php
/*
Plugin Name: Boton de WhatsApp
Description: Permite tener el botón de WhatsApp flotante.
Version: 1.0
Author: Carlos Moreno
*/

class Btn_whatsapp extends WP_Widget{


    function __construct(){
        parent::__construct(
            'Whatsapp_btn',
            'Botón de WhatsApp',
            array('description' => 'Muestra el botón de WhatsApp en toda la página web')
        );
    }


    public function widget ($args, $instance){
        $msj = apply_filter('widget_title', $instance['msj']);
        $number = $instance['number'];
        $msjd = $this->get_whatsapp($msj,$number);

        echo $args['before_widget'];
        if(! empty($msj)){
            echo $args['before_msj'].$msj.$args['after_msj'];
        }

        echo "<p>$msjd</p>";
        echo $args['after_widget'];
    }

    public function form($instance){
        $msj = (! empty ($instance['msj'])) ? $instance['msj']: '';
        $number = (! empty ($instance['number'])) ? $instance['number']: '';
        
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('msj'); ?>">Mensaje:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id('msj'); ?>" name="<?php echo $this->get_field_name('mjs'); ?>" value="<?php echo esc_attr($msj); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>">Número de telefono:</lable>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo esc_attr($number); ?>" />
        </p>
        <?php
    }

    public function update($new_instance, $old_instance){
        $instance = array();
        $instance['msj'] = (! empty($new_instance['msj'])) ? strip_tags($new_instance['title']): '';
        $instance['number']  = (! empty($new_instance['number'])) ? strip_tags($new_instance['number']): '';
        return $instance;
    }

   private function get_whatsapp($msj, $number){
    return "<p>${msj}</p>";
   }
}   

function whatsapp_widget_register_widgets() {
    register_widget( 'Btn_whatsapp' );
}

  add_action( 'widgets_init', 'whatsapp_widget_register_widgets' );
?>