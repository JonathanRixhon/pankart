<?php $currentpost = $currentpost; ?>
<article class="album">
    <h4 class="album__title"><?php the_title($currentpost) ?></h4>
    <dl class="album-nbr">
        <dt class="album-nbr__title sro">Nombre de titre</dt>
        <dd class="album-nbr__content"><?= count(get_field('rel-songs', $currentpost->ID)) ?> titres</dd>
    </dl>
    <img class="album__cover" <?= pk_the_thumbnail_attributes(['album-cover'], $currentpost) ?>>
    <p class="album__description"><?= get_field('description', $currentpost->ID) ?></p>
    <a class="album__link" href="<?= get_the_permalink($currentpost,) ?>">Découvrir l'album</a>
</article>