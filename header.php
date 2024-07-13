<?php get_template_part('template_parts/header-common'); ?>

<header id="header" class="header" role="banner">
    <a class="header__logo" id="logo" href="<?= get_home_url(); ?>">LOGO</a>
    <!-- Páginas (menú) -->
    <nav class="mainmenu" id="main-menu">
        <?= wp_nav_menu(['theme_location'=> 'header-menu', 'container' => false, 'menu_class' => 'main-menu']); ?>
    </nav>
    <!-- Hamburger -->
    <div class="c-hamburger" id="hamburger" aria-label="Menu">
        <div class="c-hamburger__line"></div>
        <div class="c-hamburger__line"></div>
        <div class="c-hamburger__line"></div>
    </div>
</header>
