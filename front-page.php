<?php get_header(); ?>

<main class="template-home js-1cp">
    <!-- classlist.js -->
    <!-- TODO: Mejorar comportamiento -->
    <section class="addClass" id="addClass">
        <h2>Class List (util)</h2>
        <div>
            <button class="btn" id="btn-naranja">Naranja</button>
            <button class="btn" id="btn-amarillo">Amarillo</button>
        </div>

        <div>
            <article class="color-article">Artículo 1</article>
            <article class="color-article">Artículo 2</article>
            <article class="color-article">Artículo 3</article>
            <article class="color-article">Artículo 4</article>
            <article class="color-article">Artículo 5</article>
        </div>
    </section>

    <!-- Dialog & Modal -->
    <section class="s-dialog pt-5" id="dialog">
        <h2>Diaglog (modal)</h2>

        <dialog>
            <p>Contenido del modal</p>
            <form method="dialog">
                <button>OK</button>
            </form>
        </dialog>

        <button id="button">Abrir Modal</button>
    </section>

    <!-- Icon?? -->
    <section class="icon pt-5" id="currentColor">
        <h2>currentColor SVG</h2>
        <svg width="100" height="100" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <circle cx="12" cy="12" r="10" fill="currentColor"/>
        </svg>
    </section>

    <!--  -->
    <div class="export-index"></div>
</main>

<script>
    const button = document.querySelector('#button');
    const dialog = document.querySelector('dialog');

    button.addEventListener('click', () => {
        dialog.showModal();
    })
</script>

<?php get_footer(); ?>
