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

<!-- isVisible.js -->
<nav class="isVisible" id="navbar">
    <a href="#addClass" id="link1">Class List</a>
    <a href="#dialog" id="link2">Dialog</a>
    <a href="#currentColor" id="link3">Current Color</a>
</nav>

<script>
//     function highlightCurrentSection() {
//         console.log('Cargando Current Section')
//     const sections = document.querySelectorAll('section');
//     const navbarLinks = document.querySelectorAll('#navbar a');

//     sections.forEach((section, index) => {
//         if (isVisible(section)) {
//             navbarLinks.forEach(link => link.classList.remove('active')); // Remove active class from all links
//             navbarLinks[index].classList.add('active'); // Add active class to the current link
//         }
//     });
// }

// window.addEventListener('scroll', highlightCurrentSection);
</script>
