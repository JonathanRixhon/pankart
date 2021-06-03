<?php get_header(); ?>
<?php
$imgArr = pk_create_image_array();
$figcaption = get_field('legend'); ?>
<main class="sg-new-page">
    <h2 class="sg-new-page__title"><?php the_title() ?></h2>
    <section class="sg-new-interaction">
        <h3 class="sg-new-interaction__title sro">Interactions avec l'article</h3>
        <ul class="sg-new-interaction__list">
            <li class="sg-new-interaction__item sg-new-interaction__item_share">
                <button class="sg-new-interaction__button sg-new-interaction__button_share">
                    Partager
                </button>
                <ul class="interaction-sub-list">
                    <li class="interaction-sub-list__item interaction-sub-list__item_facebook">
                        <a href="" class="interaction-sub-list__link interaction-sub-list__link_facebook">Facebook</a>
                    </li>
                    <li class="interaction-sub-list__item interaction-sub-list__item_twitter">
                        <a href="" class="interaction-sub-list__link interaction-sub-list__link_twitter">Twitter</a>
                    </li>
                </ul>
            </li>
            <li class='sg-new-interaction__item sg-new-interaction__item_copy'>
                <button class="sg-new-interaction__button sg-new-interaction__button_copy">
                    Copier le lien
                </button>
            </li>
        </ul>
    </section>

    <section class="new-descritpion">
        <h3 class="new-content__title sro">Description de l'article</h3>
        <p class="new-description__content">
            <?= get_field('description') ?>
        </p>
    </section>

    <section class="new-content">
        <h3 class="new-content__title sro">Contenu de l'article</h3>
        <?php if (count($imgArr)) : ?>
            <figure class="new-content__img-wrapper">
                <?php foreach ($imgArr as $img) : ?>
                    <img class="new-content__img" <?= pk_news_img_attributes(['new-img'], get_field($img)) ?> sizes="754px">
                <?php endforeach; ?>

                <?php if (get_field('legend')) : ?>
                    <figcaption class="new-content__legend">
                        <?= get_field('legend') ?>
                    </figcaption>
                <?php endif ?>
            </figure>
        <?php endif; ?>
        <?php the_content(); ?>
    </section>

    <a href="<?= get_post(13)->guid; ?>" class="sg-new-page__back-link">Retour aux actualités</a>


</main>
<?php get_footer() ?>