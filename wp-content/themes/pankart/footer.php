<footer class="bottom">
    <?php wp_footer(); ?>
    <h2 class="bottom__title sro">Pied de page</h2>
    <a href="<?= get_home_url() ?>" class="bottom__link">
        <img class="bottom__logo" src="<?= pk_asset('img/logo_x1.png') ?>" srcset="<?= pk_asset('img/logo_x1.png') ?> 1x, <?= pk_asset('img/logo_x2.png') ?> 2x" alt="Logo du groupe Pankart">
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
        <h3 class="bot-about-nav__title">À propos</h3>
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
<script src="<?= pk_asset('js/app.js') ?>"></script>
</body>

</html>