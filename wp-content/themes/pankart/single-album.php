<?php get_header() ?>
<main class="sg-album">
    <section class='sg-album-intro'>
        <h2 class='sg-album-intro__title'><?php the_title() ?></h2>
        <dl class="sg-album-date">
            <dt class="sro">Date</dt>
            <dd class="sg-album-date__content">Le <?= get_field('date-out') ?></dd>
        </dl>
        <p class='sg-album-intro__content'>
            <?= get_field('description') ?>
        </p>
        <img class='sg-album-intro__thumbnail' <?= pk_the_thumbnail_attributes(['album-cover']) ?> alt="test">
    </section>
    <section class="sg-album-songs">
        <h2 class="sg-album-songs__title">Titres</h2>
        <?php foreach (get_field('rel-songs') as $song) : ?>
            <article class="sg-song">
                <h3 class="sg-song__title"><?= $song->post_title ?></h3>
                <ul class="sro">
                    <li>
                        <a href="<?= $song->guid ?>">Voir les paroles</a>
                    </li>
                    <li>
                        <button>Écouter "<?= $song->post_title ?>"</button>
                        <ul>
                            <?php foreach (pk_sort_links(get_fields($song->ID), 'listen') as $link) : ?>
                                <li>
                                    <a href="<?= $link['url'] ?>"><?= $link['title'] ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
                <p class="sg-song__description"><?= get_field('description', $song->ID) ?></p>
                <a class="sg-song__read-more" href="">lire la suite</a>
            </article>
        <?php endforeach; ?>
    </section>
    <a class="sg-album__back-link" href="<?= get_permalink(25) ?>">Retour à la discographie</a>
</main>
<?php get_footer() ?>