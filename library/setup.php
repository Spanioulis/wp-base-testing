<?php

// Configuración inicial del tema
function theme_setup() {
    // Soporte del tema
    theme_support();

    // Registro de sidebars
    add_action('widgets_init', 'register_theme_sidebars');

    // Limpieza alrededor de imágenes y extractos
    add_filter('the_content', 'filter_ptags_on_images');
    add_filter('excerpt_more', 'excerpt_more');
}
add_action('after_setup_theme', 'theme_setup');

// Soporte del tema
function theme_support() {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(125, 125, true);
    add_theme_support('custom-background', array(
        'default-image' => '',
        'default-color' => '',
        'wp-head-callback' => '_custom_background_cb',
        'admin-head-callback' => '',
        'admin-preview-callback' => ''
    ));
    add_theme_support('automatic-feed-links');
}

// Tamaño máximo del contenido
if (!isset($content_width)) {
    $content_width = 680;
}

// Tamaños de miniaturas
add_image_size('theme-thumb-600', 600, 150, true);
add_image_size('theme-thumb-300', 300, 100, true);
add_image_size('full-page', 2000, 2000, false);

// Agregar tamaños de imagen personalizados al selector de medios
add_filter('image_size_names_choose', 'custom_image_sizes');
function custom_image_sizes($sizes) {
    return array_merge($sizes, array(
        'theme-thumb-600' => __('600px by 150px'),
        'theme-thumb-300' => __('300px by 100px'),
    ));
}

// Personalizador del tema
add_action('customize_register', 'theme_customizer');
function theme_customizer($wp_customize) {
    // Opciones de personalización
}

// Habilitar soporte para la etiqueta de título
add_theme_support('title-tag');

?>
