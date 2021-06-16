<article class="np">
    <h4 class="np__title"><?php the_title() ?></h4>
    <?php if (has_post_thumbnail()) : ?>
        <img class="np__thumbnail" <?= pk_the_thumbnail_attributes(["news-thumbnail", "news-thumbnail-large"]) ?>>
    <?php else : ?>
        <img class="np__thumbnail" src="<?= pk_asset("/img/no_thumbnail.png") ?>" srcset=" <?= pk_asset("/img/no_thumbnail.png") ?> 754w,  <?= pk_asset("/img/no_thumbnail.png") ?> 560w" alt="Photo du logo de pankart">
    <?php endif; ?>
    <dl class="np-informations">
        <dt class='sro'>Date</dt>
        <dd class="np-informations__date">Le <?= get_the_date('d F Y', get_the_ID()) ?></dd>
        <dt class='sro'>description</dt>
        <dd class="np-informations__description"><?= get_field("description") ?></dd>
    </dl>
    <a class="np__link" href="<?php the_permalink(); ?>">
        <span class="sro">
            Lire l'article intitulé: <?php the_title() ?>
        </span>
    </a>
    <p class="np__fake-link" aria-hidden="true">Lire l'article</p>
</article>