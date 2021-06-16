<?php get_header(); ?>
<?php
$lastNew = new WP_Query([
    'post_type' => 'news',
    'posts_per_page' => 1,
    'orderby' => 'date',
    'order' => 'desc'
]);
wp_reset_query();

$nextEvent = new WP_Query([
    'post_type' => 'date',
    'posts_per_page' => 1,
    'orderby' => 'date',
    'order' => 'asc'
]);
wp_reset_query();

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
wp_reset_query();
?>

<main class="home-page">
    <section class="presentation">
        <h2 class=" sro">
            <span class="pankart sro">Pankart</span>
        </h2>
        <img class="presentation__title" src="<?= pk_asset("img/only_letters_logo.png") ?>" srcset="<?= pk_asset('img/only_letters_logo.png') ?> 475w, <?= pk_asset('img/only_letters_logo_238w.png') ?> 238w" alt="Pankart" sizes="19vw">
        <p class="presentation__text">
            <?= get_post_field('post_content', 5); ?>
        </p>
        <a class="presentation__link presentation__link_book" href="">Réserver le groupe</a>
        <a class="presentation__link presentation__link_agenda" href="">Voir l'agenda</a>
        <img class="presentation__img" <?= pk_news_img_attributes(["home-img"], get_field('img', 5)) ?> sizes=" 50vw">
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
                    <p class="last-date__date"><time datetime="<?= get_field('event-date') ?>">Le <?= get_field('event-date') ?></time></p>
                    <a class="last-date__link" href="<?= get_field('event-link') ?>">Vers le site de l'évènement</a>
                </article>
                <img class="next-date__img" <?= pk_the_thumbnail_attributes(['home-img']) ?>>
            <?php endwhile; ?>
        <?php else : ?>
            <p class="next-date__empty-message">Il n'y a pas de évènement prévu pour l'instant.</p>
        <?php endif; ?>
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