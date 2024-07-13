<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Maneko Projects">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="keywords" content="">
    <meta name="theme-color" content="#efefef">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <?php if (has_site_icon()) : ?>
        <link rel="icon" href="<?php echo esc_url(get_site_icon_url()); ?>" sizes="32x32" />
    <?php else : ?>
        <link rel="shortcut icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/favicon.ico">
    <?php endif; ?>

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <!-- contentful-paint.js -->
    <style>
        .js-1cp, .js-2cp, .js-3cp { opacity: 0; }
    </style>
    <!-- contentful-paint.js end -->
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
