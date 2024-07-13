<?php
// Registro de sidebars
function register_theme_sidebars() {
    register_sidebar(array(
        'id' => 'sidebar1',
        'name' => __('Sidebar 1', 'rodamon'),
        'description' => __('The first (primary) sidebar.', 'rodamon'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));
}
// add_action('widgets_init', 'register_theme_sidebars');
?>
