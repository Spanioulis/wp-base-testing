<?php
    function register_my_strings() {
        // Header (buttons)
        // pll_register_string('Botón "Descarga la App"', 'btn_download_app_pll', 'menu');

        // Home
        // pll_register_string('Botón "Saber más"', 'btn_saber_mas_pll', 'home');
    }
    add_action('init', 'register_my_strings');
?>