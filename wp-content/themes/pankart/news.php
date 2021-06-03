<?php /* Template Name: Actualités */

$news = new WP_Query([
    'post_type' => 'news',
    'orderby' => 'date',
    'order' => 'desc'
]);

?>
<?php get_header(); ?>
<main class="news-page">
    <h2 class="news-page__title">Actualités</h2>
    <?php if ($news->have_posts()) : ?>
        <section class="last-new">
            <h3 class="last-new__title sro">Dernière actualité</h3>
            <?php $news->have_posts();
            $news->the_post(); ?>
            <?php get_template_part('template-parts/news-part', null) ?>
        </section>
        <section class="news-list">
            <?php while ($news->have_posts()) : $news->the_post(); ?>
                <?php get_template_part('template-parts/news-part', null) ?>
            <?php endwhile; ?>
        </section>
    <?php else : ?>
        <p class="news-page__empty-message">Il n'y a pas encore d'actualités.</p>
    <?php endif; ?>
</main>
<?php get_footer(); ?>