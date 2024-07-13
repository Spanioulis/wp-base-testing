<?php
// ----------------------
// MENU LOCATIONS
// ----------------------
function register_my_menus() {
    register_nav_menus(array(
        'header-menu'      => __('Header menu'),
        'header-lang-menu' => __('Language menu'),
        'footer-menu'      => __('Footer menu'),
        'footer-legal'  => __('Footer legal'),
    ));
}
add_action('init', 'register_my_menus');

?>