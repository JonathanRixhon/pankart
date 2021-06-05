<?php get_header() ?>
<main class="sg-album">
    <section>
        <h2><?php the_title() ?></h2>
        <dl>
            <dt class="sro">Date</dt>
            <dd>Le <?= get_field('date-out') ?></dd>
        </dl>
        <p>
            <?= get_field('description') ?>
        </p>
        <button>Acheter l'album</button>
        <button>Écouter l'album</button>
    </section>
    <section>
        <h2>Titres</h2>
        <?php foreach (get_field('rel-songs') as $song) : ?>
            <article>
                <h3><?= $song->post_title ?></h3>
                <ul>
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
                <p><?= get_field('description', $song->ID) ?></p>
                <a href="#">lire la suite</a>
            </article>
        <?php endforeach; ?>
    </section>
    <a href="<?= get_permalink(25) ?>">Retour à la discographie</a>
</main>
<?php get_footer() ?>