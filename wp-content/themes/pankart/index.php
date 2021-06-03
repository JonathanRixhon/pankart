<?php get_header(); ?>
<?php
$lastNew = new WP_Query([
    'post_type' => 'news',
    'posts_per_page' => 1,
    'orderby' => 'date',
    'order' => 'desc'
]);

$nextEvent = new WP_Query([
    'post_type' => 'date',
    'posts_per_page' => 1,
    'orderby' => 'date',
    'order' => 'asc'
]);

$lastsong = new WP_Query([
    'meta_query' => [
        [
            'key' => 'date-out',
            'value' => CURRENT_DATE,
            'compare' => '<='
        ]
    ],
    'post_type' => 'song',
    'orderby' => 'date',
    'order' => 'desc'
]);
?>
<main class="home-page">
    <section class="presentation">
        <h2 class="presantation__title">
            <span class="pankart">Pankart</span>
        </h2>
        <p class="presantation__text">
            <?= get_the_content() ?>
        </p>
        <a class="presantation__link presantation_book" href="">Réserver le groupe</a>
        <a class="presantation__link presantation_agenda" href="">Voir l'agenda</a>
        <img src="" alt="Photo du groupe">
    </section>
    <section class="home-news">
        <h2 class="home-news__title">
            Dernière actualité
        </h2>
        <?php if ($lastNew->have_posts()) : while ($lastNew->have_posts()) : $lastNew->the_post(); ?>
                <?php get_template_part('template-parts/news-part', null) ?>
            <?php endwhile; ?>
        <?php else : ?>
            <p class="home-news__empty-message">Il n'y a pas encore d'actualités.</p>
        <?php endif; ?>
    </section>
    <section class="next-date">
        <h2 class="next-date__title">Prochaine date</h2>
        <?php if ($nextEvent->have_posts()) : while ($nextEvent->have_posts()) : $nextEvent->the_post(); ?>
                <article class="last-date">
                    <h3 class="last-date__title"><?php the_title() ?></h3>
                    <p><time datetime="<?= get_field('event-date') ?>">coucou</time></p>
                    <a href="<?= get_field('event-link') ?>">Vers le site de l'évènement</a>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p class="next-date__empty-message">Il n'y a pas de évènement prévu pour l'instant.</p>
        <?php endif; ?>
        <?php the_date() ?>
    </section>
    <section class="last-song">
        <h2 class="last-song__title">Dernier titre</h2>
        <?php if ($lastsong->have_posts()) : $lastsong->the_post() ?>
            <?php get_template_part('template-parts/last-song-part', null)
            ?>
        <?php endif; ?>
    </section>
</main>
<?php get_footer(); ?>