<?php

// Carga de scripts y estilos
function theme_scripts_and_styles() {
    if (!is_admin()) {
        wp_register_style('stylesheet', get_stylesheet_directory_uri() . '/build/frontend.min.css', array(), '', 'all');
        wp_register_script('main-js', get_stylesheet_directory_uri() . '/build/app.min.js', array('jquery'), '', true);
        wp_enqueue_style('stylesheet');
        wp_enqueue_script('main-js');
    }
}
add_action('wp_enqueue_scripts', 'theme_scripts_and_styles', 999);

?>
