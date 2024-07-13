<?php

// Carga de archivos necesarios
add_action('after_setup_theme', function () {
    require_once('library/acf-options.php');
    require_once('library/custom-menus.php');
    require_once('library/custom-post-type.php');
    require_once('library/custom.php');
    require_once('library/performance.php');
    require_once('library/polylang-translate.php');
    require_once('library/remove-comments.php');
    require_once('library/scripts.php');
    require_once('library/setup.php');
    require_once('library/utilities.php');
    require_once('library/widgets.php');
});

// Habilitar actualización automática de plugins
add_filter('auto_update_plugin', '__return_true');

?>
