<article class="news-preview">
    <h4 class="np__title"><?php the_title() ?></h4>
    <?php if (has_post_thumbnail()) : ?>
        <img class="np__thumbnail" <?= pk_the_thumbnail_attributes(["news-thumbnail", "news-thumbnail-large"]) ?>>
    <?php endif; ?>
    <dl class="np-informations">
        <dt class='sro'>Date</dt>
        <dd class="np-info__date">Le <?php the_date('d F Y') ?></dd>
        <dt class='sro'>description</dt>
        <dd class="np-info__description"><?= get_field("description") ?></dd>
    </dl>
    <a class="np__link" href="<?php the_permalink(); ?>">
        <span class="">
            Lire l'article intitulé: <?php the_title() ?>
        </span>
    </a>
    <p class="np__fake-link" aria-hidden="true">Lire l'article</p>
</article>