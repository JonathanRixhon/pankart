<?php get_header() ?>
<main class="sg-album">
    <section>
        <h2><?php the_title() ?></h2>
        <dl>
            <dt>Date</dt>
            <dd>Le <?= get_field('out-date') ?></dd>
        </dl>
        <p>
            <?= get_field('description') ?>
        </p>
        <button>Acheter l'album</button>
        <button>Écouter l'album</button>
    </section>
    <section>
        <h2>Titre</h2>
    </section>
</main>
<?php get_footer() ?>