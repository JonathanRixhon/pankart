<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= is_front_page() ? bloginfo('description') : bloginfo('description') . wp_title("•", false); ?></title>
    <link rel="stylesheet" href="<?= pk_asset("css/theme.css") ?>">
    <?php wp_head(); ?>
</head>

<body>
    <header class="top">
        <h1 class="top__title sro">Pankart</h1>
        <a href="<?= get_home_url() ?>" class="top__link">
            <img class="top__logo" src="<?= pk_asset('img/logo_x1.png') ?>" srcset="<?= pk_asset('img/logo_x1.png') ?> 1x, <?= pk_asset('img/logo_x2.png') ?> 2x" alt="Logo du groupe Pankart">
        </a>
        <nav class="top-nav">
            <h2 class="sro">Navigation principale</h2>
            <ul class="top-nav__list">
                <?php foreach (pk_menu('main') as $link) : ?>
                    <li class="top-nav__item">
                        <a class="top-nav__link <?= pk_bem('top-nav__link', $link->modifiers); ?>" href="<?= $link->url; ?>"><?= $link->label; ?></a>
                    </li>
                <?php endforeach; ?>

                <li class="top-nav__item top-nav__item_about">
                    <h3 class="top-nav__sub-title">À Propos</h3>
                    <ul class="sub-nav">
                        <?php foreach (pk_menu('about') as $link) : ?>
                            <li class="sub-nav__item">
                                <a class="sub-nav__link" <?= pk_bem('sub-nav__link', $link->modifiers); ?>" href="<?= $link->url; ?>"><?= $link->label; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="top-nav__item">
                    <a class="top-nav__link <?= pk_bem('top-nav__link', $link->modifiers); ?>" href="<?= get_permalink(23) ?>/#contact-form">
                        Contact
                    </a>
                </li>
            </ul>
        </nav>
        <button class="top__button">Couper le son du site</button>
    </header>