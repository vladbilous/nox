<?php // pages/404.php — "page not found" (HTTP 404, noindex) with a way back to the home page. ?>
<main id="main">
    <section class="section simple-page">
        <div class="container simple-page-inner">
            <p class="eyebrow">404</p>
            <h1 class="section-title"><?= tre('404_title', 'Nie znaleziono strony') ?></h1>
            <p class="section-lead"><?= tre('404_text') ?></p>
            <div class="hero-actions">
                <a class="btn btn-gold" href="<?= $homeUrl ?>"><?= tre('404_button', 'Strona główna') ?></a>
                <a class="btn btn-ghost" href="<?= htmlspecialchars($booksyUrl) ?>" target="_blank" rel="noopener" data-track="booksy"><?= tre('hero_button', 'Zarezerwuj w Booksy') ?></a>
            </div>
        </div>
    </section>
</main>
