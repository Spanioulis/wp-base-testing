<?php

// Funciones de limpieza del header
function head_cleanup() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);
    remove_action('wp_head', 'start_post_rel_link', 10, 0);
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    remove_action('wp_head', 'wp_generator');
    add_filter('style_loader_src', 'remove_wp_ver_css_js', 9999);
    add_filter('script_loader_src', 'remove_wp_ver_css_js', 9999);
}

// Eliminar versión de WordPress de los recursos CSS y JS
function remove_wp_ver_css_js($src) {
    if (strpos($src, 'ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}

// Eliminar estilos de comentarios recientes del header
function remove_wp_widget_recent_comments_style() {
    if (has_filter('wp_head', 'wp_widget_recent_comments_style')) {
        remove_filter('wp_head', 'wp_widget_recent_comments_style');
    }
}

// Eliminar estilos en línea de comentarios recientes
function remove_recent_comments_style() {
    global $wp_widget_factory;
    if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
        remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
    }
}

// Eliminar estilo de galería en línea
function gallery_style($css) {
    return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}

// Mejoras de rendimiento
function remove_block_library_styles() {
    wp_dequeue_style('wp-block-library');
}

// Acciones y filtros
add_action('init', 'head_cleanup');
add_action('wp_head', 'remove_wp_widget_recent_comments_style', 1);
add_action('wp_head', 'remove_recent_comments_style', 1);
add_filter('gallery_style', 'gallery_style');
add_action('wp_enqueue_scripts', 'remove_block_library_styles');

?>
