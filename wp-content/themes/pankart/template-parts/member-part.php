<article>
    <h5><?php the_title() ?></h5>
    <img <?= pk_the_thumbnail_attributes(["news-thumbnail", "news-thumbnail-large"]) ?>>
    <dl>
        <dt class='sro'>Instruments joués</dt>
        <?php foreach (get_field('instruments') as $instrument => $value) : ?>
            <dd>
                <img src="sprite" alt="test">
                <p><?= $value['value'] ?></p>
            </dd>
        <?php endforeach; ?>
    </dl>
    <a href="<?php the_permalink() ?>">
        <span class=""> Voir la page personelle de NOM</span>
    </a>
    <p aria="hidden">
        Voir la page personelle de <?php the_title() ?>
    </p>
</article>