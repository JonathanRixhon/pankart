<?php $currentpost = $currentpost; ?>
<article>
    <h4><?php the_title($currentpost) ?></h4>
    <dl>
        <dt>Nombre de titre</dt>
        <dd><?= count(get_field('rel-songs', $currentpost->ID)) ?> titres</dd>
    </dl>
    <img <?= pk_the_thumbnail_attributes(['album-cover'], $currentpost) ?>>
    <p><?= get_field('description', $currentpost->ID) ?></p>
    <a href="<?= get_the_permalink($currentpost,) ?>">Découvrir l'album</a>
</article>