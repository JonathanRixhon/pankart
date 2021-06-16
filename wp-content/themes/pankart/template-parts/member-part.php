<?php $instruments = get_field('instrument'); ?>
<article class="sg-member">
    <h5 class="sg-member__title"><?php the_title() ?></h5>
    <?php if (count($instruments)) : ?>
        <ul class="member-img">
            <?php foreach ($instruments as $instrument) : ?>
                <li class='member-img__item member-img__item_<?= $instrument['value'] ?>'></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <img class="sg-member__img" <?= pk_the_thumbnail_attributes(["news-thumbnail", "news-thumbnail-large"]) ?>>
    <?php if (count($instruments)) : ?>
        <dl class="sg-instruments">
            <dt class='sro'>Instruments joués</dt>
            <?php foreach ($instruments as $instrument) : ?>
                <dd class="sg-instruments__data sg-instruments__data_<?= $instrument['value'] ?> ">
                    <p><?= $instrument['label'] ?></p>
                </dd>
            <?php endforeach; ?>
        </dl>
    <?php endif; ?>

    <a class="sg-member__link" href="<?php the_permalink() ?>">
        <span class="sro"> Voir la page personelle de NOM</span>
    </a>
    <p aria="hidden" class="sg-member__fake-link">
        Voir la page personelle de <?php the_title() ?>
    </p>
</article>