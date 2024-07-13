<?php

// Filtros para imágenes en contenido
function filter_ptags_on_images($content) {
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// Más extracto
function excerpt_more($more) {
    global $post;
    return '... <a class="excerpt-read-more" href="' . get_permalink($post->ID) . '" title="' . __('Read ', 'rodamon') . esc_attr(get_the_title($post->ID)) . '">' . __('Read more &raquo;', 'rodamon') . '</a>';
}

// Tipos MIME personalizados
add_filter('upload_mimes', 'custom_mime_type');
function custom_mime_type($mime_types) {
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}

// Manejo de ID de elementos del menú
add_filter('nav_menu_item_id', 'custom_li_id_handler', 10, 3);
function custom_li_id_handler($id, $item, $args) {
    return $id;
}

// Cambio de nombres de tipos de post personalizados
add_action('init', 'change_post_type_name');
function change_post_type_name() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Entradas';
}

add_action('admin_menu', 'change_post_type_name_menu');
function change_post_type_name_menu() {
    global $menu;
    foreach ($menu as $key => $value) {
        if ($value[0] == 'Entradas') {
            $menu[$key][0] = 'Entradas';
            break;
        }
    }
}

// Título personalizado
add_filter('wp_title', 'rw_title', 10, 3);
function rw_title($title, $sep, $seplocation) {
    global $page, $paged;
    if (is_feed()) return $title;
    $title .= ('right' == $seplocation) ? get_bloginfo('name') : get_bloginfo('name') . $title;
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && (is_home() || is_front_page())) $title .= " {$sep} {$site_description}";
    if ($paged >= 2 || $page >= 2) $title .= " {$sep} " . sprintf(__('Page %s', 'dbt'), max($paged, $page));
    return $title;
}

// Eliminar versión de WordPress de RSS
add_filter('the_generator', 'rss_version');
function rss_version() {
    return '';
}

?>
