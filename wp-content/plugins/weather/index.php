<?php
/*
Plugin Name: Weather Widget
Description: Muestra el clima actual en una ubicación específica en un widget en la barra lateral.
Version: 1.0
Author: Tu nombre
*/

class Weather_Widget extends WP_Widget {

        function __construct() {
          parent::__construct(
            'weather_widget', // ID del widget
            'Weather Widget', // Nombre del widget
            array( 'description' => 'Muestra el clima actual para una ubicación específica.' ) // Descripción
          );
        }
      
        public function widget( $args, $instance ) {
          $title = apply_filters( 'widget_title', $instance['title'] );
          $location = $instance['location'];
          $weather = $this->get_weather($location);
      
          echo $args['before_widget'];
          if ( ! empty( $title ) ) {
            echo $args['before_title'] . $title . $args['after_title'];
          }
          echo "<p>$weather</p>";
          echo $args['after_widget'];
        }
      
        public function form( $instance ) {
          $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
          $location = ( ! empty( $instance['location'] ) ) ? $instance['location'] : '';
          ?>
          <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Título:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>">
          </p>
          <p>
            <label for="<?php echo $this->get_field_id( 'location' ); ?>">Ubicación:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'location' ); ?>" name="<?php echo $this->get_field_name( 'location' ); ?>" value="<?php echo esc_attr( $location ); ?>">
          </p>
          <?php
        }
      
        public function update( $new_instance, $old_instance ) {
          $instance = array();
          $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
          $instance['location'] = ( ! empty( $new_instance['location'] ) ) ? strip_tags( $new_instance['location'] ) : '';
          return $instance;
        }

        private function get_weather($location) {
            $api_key = '12bee8b5aa9377ade007a5eb60286524';
            $query = unserialize(file_get_contents('http://ip-api.com/php/186.155.11.212'));
            $city = $query['city'];
            $lat = $query['lat'];
            $lon = $query['lon'];
            $url = 'http://api.openweathermap.org/data/2.5/weather?lat='. $lat .'&lon='. $lon .'&appid='. $api_key .'&units=metric&lang=es';
            $response = wp_remote_get($url);
            if (is_wp_error($response)) {
              return 'Error al obtener el clima.';
            }
            $data = json_decode(wp_remote_retrieve_body($response), true);
            if (empty($data)) {
              return 'Error al obtener el clima.';
            }
            return $city.'<br> '.$data['weather'][0]['description'] . ' y la temperatura actual es de ' . $data['main']['temp'] . '°C';
          }
    }
  
  function weather_widget_register_widgets() {
    register_widget( 'Weather_Widget' );
  }
  
  add_action( 'widgets_init', 'weather_widget_register_widgets' );
  ?>