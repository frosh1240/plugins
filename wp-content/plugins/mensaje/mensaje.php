<?php
/*
Plugin Name: Custom Footer Message
Description: Agrega un mensaje personalizado al pie de página de todas las páginas de su sitio web.
Version: 1.0
Author: Tu nombre
*/

function custom_footer_message() {
  echo '<p style="text-align: center;">Gracias por visitar mi sitio web. ¡Espero que disfruten su estancia!</p>';
}

add_action('wp_footer', 'custom_footer_message');
?>