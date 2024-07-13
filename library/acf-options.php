<?php

function registrar_pagina_opciones() {
  if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
      'page_title' => 'Textos comunes',
      'menu_title' => 'Textos comunes',
      'menu_slug' => 'textos-comunes',
      'capability' => 'manage_options',
      'icon_url' => 'dashicons-media-text',
      'position' => 30
    ));
  }
}
add_action('acf/init', 'registrar_pagina_opciones');

?>
