</body>
<footer class="bottom">
    <?php wp_footer(); ?>
    <h2 class="bottom__title sro">Pied de page</h2>
    <a href="<?php get_home_url() ?>" class="top__link">
        <img class="top__logo" src="" srcset="" alt="Logo du groupe Pankart">
    </a>
    <nav class="bot-main-nav">
        <h3 class="bot-main-nav__title">Navigation principale</h3>
        <ul class="bot-main-nav__list">
            <?php foreach (pk_menu('main') as $link) : ?>
                <li class="bot-main-nav__item">
                    <a class="bot-main-nav__link <?= pk_bem('bot-main-nav__link', $link->modifiers); ?>" href="<?= $link->url; ?>"><?= $link->label; ?></a>
                </li>
            <?php endforeach; ?>
    </nav>
    <nav class="bot-about-nav">
        <h3 class="bot-about-nav__title">Á propos</h3>
        <ul class="bot-about-nav__list">
            <?php foreach (pk_menu('about') as $link) : ?>
                <li class="bot-about-nav__item">
                    <a class="bot-about-nav__link <?= pk_bem('bot-about-nav__link', $link->modifiers); ?>" href="<?= $link->url; ?>"><?= $link->label; ?></a>
                </li>
            <?php endforeach; ?>
    </nav>
    <nav class="bot-media-nav">
        <h3 class="bot-media-nav__title">Réseaux sociaux</h3>
        <ul class="bot-media-nav__list">
            <?php foreach (pk_menu('social_media') as $link) : ?>
                <li class="bot-media-nav__item">
                    <a class="bot-media-nav__link <?= pk_bem('bot-media-nav__link', $link->modifiers); ?>" href="<?= $link->url; ?>"><?= $link->label; ?></a>
                </li>
            <?php endforeach; ?>
    </nav>
</footer>

</html>